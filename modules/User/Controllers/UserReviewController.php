<?php
namespace Modules\User\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Modules\FrontendController;
use Modules\User\Models\UserWishList;
use Illuminate\Http\Request;

class UserReviewController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request){
        $data['user'] = $user  = Auth::user();
        $data['reviews'] = \Modules\Review\Models\Review::query()->where([
            'vendor_id'=>$user->id,
            'status'=>'approved'
        ])
            ->orderBy('id','desc')
            ->with('author')
            ->paginate(10);

        $data['my_reviews'] = \Modules\Review\Models\Review::query()->where([
            'create_user'=>$user->id,
            'status'=>'approved'
        ])
            ->orderBy('id','desc')
            ->with('author')
            ->paginate(10);

        $data['page_title'] = __(':name - reviews from guests',['name'=>$user->getDisplayName()]);
        $data['breadcrumbs'] = [
            ['name'=>$user->getDisplayName(),'url'=>route('user.profile',['id'=>$user->user_name ?? $user->id])],
            ['name'=>__('Reviews from guests'),'url'=>''],
        ];
        return view('User::frontend.review.index',$data);
    }
}
