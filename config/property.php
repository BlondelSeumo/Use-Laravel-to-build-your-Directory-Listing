<?php
return [
    'property_route_prefix' => env("PROPERTY_ROUTER_PREFIX","property"),
    'property_buy_type' => env("PROPERTY_BUY_TYPE", 1),
    'property_rent_type' => env("PROPERTY_RENT_TYPE",2),
    'property_cat_route_prefix' => env('PROPERTY_CAT_ROUTE_PREFIX', 'category')
];
