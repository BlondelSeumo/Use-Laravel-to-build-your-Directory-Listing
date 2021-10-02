<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>config('property.property_route_prefix')],function(){
    Route::get('/','PropertyController@index')->name('property.search'); // Search
    Route::get('/{slug}','PropertyController@detail')->name('property.detail');// Detail
    Route::get('/search/searchForSelect2','PropertyController@searchForSelect2')->name("property.searchForSelect");;// Search for select 2

});


Route::group(['prefix'=>'user/'.config('property.property_route_prefix'),'middleware' => ['auth','verified']],function(){
    Route::match(['get'],'/','ManagePropertyController@manageProperty')->name('property.vendor.index');
    Route::match(['get'],'/create','ManagePropertyController@createProperty')->name('property.vendor.create');
    Route::match(['get'],'/edit/{id}','ManagePropertyController@editProperty')->name('property.vendor.edit');
    Route::match(['get','post'],'/del/{id}','ManagePropertyController@deleteProperty')->name('property.vendor.delete');

    Route::match(['post'],'/store/{id}','ManagePropertyController@store')->name('property.vendor.store');
    Route::get('bulkEdit/{id}','ManagePropertyController@bulkEditProperty')->name("property.vendor.bulk_edit");
    Route::get('/booking-report','ManagePropertyController@bookingReport')->name("property.vendor.booking_report");
    Route::get('/booking-report/bulkEdit/{id}','ManagePropertyController@bookingReportBulkEdit')->name("property.vendor.booking_report.bulk_edit");
	Route::get('clone/{id}','ManagePropertyController@cloneProperty')->name("property.vendor.clone");
    Route::get('/contact','ManagePropertyController@showContact')->name('property.vendor.contact');
});

Route::group(['prefix'=>'user/'.config('property.property_route_prefix')],function(){
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('property.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('property.vendor.availability.loadDates');
        Route::match(['post'],'/store','AvailabilityController@store')->name('property.vendor.availability.store');
    });
});

Route::group(['prefix'=>config('property.property_cat_route_prefix')], function (){
     Route::get('/{slug}', 'CategoryController@detail')->name('property.category.detail');
});
