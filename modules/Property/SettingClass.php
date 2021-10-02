<?php

namespace  Modules\Property;

use Modules\Core\Abstracts\BaseSettingsClass;
use Modules\Core\Models\Settings;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'property',
                'title' => __("Property Settings"),
                'position'=>20,
                'view'=>"Property::admin.settings.property",
                "keys"=>[
                    'property_disable',
                    'property_page_search_title',
                    'property_page_search_layout',
                    'property_page_single_layout',
                    'property_page_search_banner',
                    'property_category_attribute',
                    'property_location_search_style',

                    'property_enable_review',
                    'property_review_approved',
                    'property_enable_review_after_booking',
                    'property_review_number_per_page',
                    'property_review_stats',

                    'property_page_list_seo_title',
                    'property_page_list_seo_desc',
                    'property_page_list_seo_image',
                    'property_page_list_seo_share',

                    'property_booking_buyer_fees',
                    'property_vendor_create_service_must_approved_by_admin',
                    'property_allow_vendor_can_change_their_booking_status',
                    'property_search_fields',
                    'property_sidebar_search_fields',
                    'property_map_search_fields',

                    'property_allow_review_after_making_completed_booking',
                    'property_deposit_enable',
                    'property_deposit_type',
                    'property_deposit_amount',
                    'property_deposit_fomular',
                ],
                'html_keys'=>[

                ]
            ]
        ];
    }
}
