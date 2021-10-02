<?php
namespace Modules\News\Controllers;

use Illuminate\Http\Request;
use Modules\FrontendController;
use Modules\Language\Models\Language;
use Modules\News\Models\News;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\NewsTranslation;
use Modules\News\Models\Tag;
use Modules\Review\Models\Review;

class NewsController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $model_News = News::query()->select("bc_news.*");
        $model_News->where("bc_news.status", "publish")->orderBy('bc_news.id', 'desc');
        if (!empty($search = $request->input("s"))) {
            $model_News->where(function($query) use ($search) {
                $query->where('bc_news.title', 'LIKE', '%' . $search . '%');
                $query->orWhere('bc_news.content', 'LIKE', '%' . $search . '%');
            });

            if( setting_item('site_enable_multi_lang') && setting_item('site_locale') != app_get_locale() ){
                $model_News->leftJoin('bc_news_translations', function ($join) use ($search) {
                    $join->on('bc_news.id', '=', 'bc_news_translations.origin_id');
                });
                $model_News->orWhere(function($query) use ($search) {
                    $query->where('bc_news_translations.title', 'LIKE', '%' . $search . '%');
                    $query->orWhere('bc_news_translations.content', 'LIKE', '%' . $search . '%');
                });
            }

            $title_page = __('Search results : ":s"', ["s" => $search]);
        }

        $data = [
            'rows'              => $model_News->with("getAuthor")->with('translations')->with("getCategory")->paginate(5),
            'style_page'       =>$request->input('layout') ? $request->input('layout') : setting_item_with_lang("blog_style", 'gird'),
            'model_category'    => NewsCategory::query()->where("status", "publish"),
            'model_tag'         => Tag::query(),
            'model_news'        => News::query()->where("status", "publish"),
            'custom_title_page' => $title_page ?? "",
            'breadcrumbs'       => [
                [
                    'name'  => __('News'),
                    'url'  => route('news.index'),
                    'class' => 'active'
                ],
            ],
            "seo_meta" => News::getSeoMetaForPageList(),
            "languages"=>Language::getActive(false),
            "locale"=> app()->getLocale()
        ];
        return view('News::frontend.index', $data);
    }

    public function detail(Request $request, $slug)
    {
        $row = News::where('slug', $slug)->where('status','publish')->first();
        if (empty($row)) {
            return redirect('/');
        }
        $translation = $row->translateOrOrigin(app()->getLocale());

        $previous = News::where('id', '<', $row->id)->where('status','publish')->orderBy('id','desc')->first();
        $translation_pre = !empty($previous) ? $previous->translateOrOrigin(app()->getLocale()) : '';
        $next = News::where('id', '>', $row->id)->where('status','publish')->orderBy('id')->first();
        $translation_next = !empty($next) ? $next->translateOrOrigin(app()->getLocale()) : '';

        $review_list = Review::where('object_id', $row->id)->where('object_model', 'news')->where("status", "approved")->orderBy("id", "desc")->with('author')->paginate(setting_item('new_review_number_per_page', 5));
        $data = [
            'row'               => $row,
            'translation'       => $translation,
            'model_category'    => NewsCategory::where("status", "publish"),
            'model_tag'         => Tag::query(),
            'model_news'        => News::where("status", "publish"),
            'review_list' => $review_list,
            'breadcrumbs'       => [
                [
                    'name' => __('News'),
                    'url'  => route('news.index')
                ],
                [
                    'name'  => $translation->title,
                    'class' => 'active'
                ],
            ],
            'seo_meta'  => $row->getSeoMetaWithTranslation(app()->getLocale(),$translation),
            'previous' => $previous,
            'translation_pre' => $translation_pre,
            'next' => $next,
            'translation_next' => $translation_next,
        ];
        $this->setActiveMenu($row);
        return view('News::frontend.detail', $data);
    }
}
