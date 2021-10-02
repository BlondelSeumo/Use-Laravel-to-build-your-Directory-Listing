<?php
namespace Modules\Template;

use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getTemplateBlocks(){
        return [
            'text'=>"\\Modules\\Template\\Blocks\\Text",
            'call_to_action'=>"\\Modules\\Template\\Blocks\\CallToAction",
            'video_player'=>"\\Modules\\Template\\Blocks\\VideoPlayer",
            'faqs'=>"\\Modules\\Template\\Blocks\\FaqList",
            'list_featured_item'=>"\\Modules\\Template\\Blocks\\ListFeaturedItem",
            'testimonial'=>"\\Modules\\Template\\Blocks\\Testimonial",
            'form_search_all_service'=>"\\Modules\\Template\\Blocks\\FormSearchAllService",
            'offer_block'=>"\\Modules\\Template\\Blocks\\OfferBlock",
            'how_it_works'=>"\\Modules\\Template\\Blocks\\HowItWork",
            'client_feedback'=>"\\Modules\\Template\\Blocks\\ClientFeedBack",
            'out_team'=>"\\Modules\\Template\\Blocks\\OurTeam",
            'partners'=>"\\Modules\\Template\\Blocks\\Partners",
            'counter_to_number'=>"\\Modules\\Template\\Blocks\\CounterToNumber",
            'breadcrumb_section'=>"\\Modules\\Template\\Blocks\\BreadcrumbSection",
            'faq'=>"\\Modules\\Template\\Blocks\\FAQ",
            'gallery'=>"\\Modules\\Template\\Blocks\\Gallery",
            'coming_soon'=>"\\Modules\\Template\\Blocks\\ComingSoon",
        ];
    }
}
