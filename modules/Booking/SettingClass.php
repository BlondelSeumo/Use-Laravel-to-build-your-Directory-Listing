<?php
namespace  Modules\Booking;

use Modules\Core\Abstracts\BaseSettingsClass;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        $keys = [
            'currency_main',
            'currency_format',
            'currency_decimal',
            'currency_thousand',
            'currency_no_decimal',
            'extra_currency'
        ];
        $all = get_payment_gateways();
        $languages = \Modules\Language\Models\Language::getActive();
        if (!empty($all)) {
            foreach ($all as $k => $gateway) {
                if (!class_exists($gateway))
                    continue;
                $obj = new $gateway($k);
                $options = $obj->getOptionsConfigs();
                if (!empty($options)) {
                    foreach ($options as $option) {
                        $keys[] = 'g_' . $k . '_' . $option['id'];
                        if( !empty($option['multi_lang']) && !empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')){
                            foreach($languages as $language){
                                if( setting_item('site_locale') == $language->locale) continue;
                                $keys[] = 'g_' . $k . '_' . $option['id'].'_'.$language->locale;
                            }
                        }
                        if ($option['type'] == 'textarea' && $option['type'] == 'editor') {
                            $htmlKeys[] = 'g_' . $k . '_' . $option['id'];
                        }
                    }
                }
            }
        }

        return [
            [
                'id'   => 'payment',
                'title' => __("Payment Settings"),
                'position'=>60,
                'view'=>"Booking::admin.settings.payment",
                "keys"=>$keys,
                'html_keys'=>[

                ]
            ],
        ];
    }
}
