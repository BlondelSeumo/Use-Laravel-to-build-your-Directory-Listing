<?php

use \Illuminate\Support\Facades\Route;


Route::get('/','PropertyController@index')->name('property.admin.index');
Route::get('/create','PropertyController@create')->name('property.admin.create');
Route::get('/edit/{id}','PropertyController@edit')->name('property.admin.edit');
Route::post('/store/{id}','PropertyController@store')->name('property.admin.store');
Route::post('/bulkEdit','PropertyController@bulkEdit')->name('property.admin.bulkEdit');
Route::post('/bulkEdit','PropertyController@bulkEdit')->name('property.admin.bulkEdit');

Route::get('/contact','PropertyController@showContact')->name('property.admin.contact');

Route::group(['prefix'=>'attribute'],function (){
    Route::get('/','AttributeController@index')->name('property.admin.attribute.index');
    Route::get('edit/{id}','AttributeController@edit')->name('property.admin.attribute.edit');
    Route::post('store/{id}','AttributeController@store')->name('property.admin.attribute.store');

    Route::get('terms/{id}','AttributeController@terms')->name('property.admin.attribute.term.index');
    Route::get('term_edit/{id}','AttributeController@term_edit')->name('property.admin.attribute.term.edit');
    Route::get('term_store','AttributeController@term_store')->name('property.admin.attribute.term.store');

    Route::get('getForSelect2','AttributeController@getForSelect2')->name('property.admin.attribute.term.getForSelect2');
});

Route::group(['prefix'=>'availability'],function(){
    Route::get('/','AvailabilityController@index')->name('property.admin.availability.index');
    Route::get('/loadDates','AvailabilityController@loadDates')->name('property.admin.availability.loadDates');
    Route::match(['post'],'/store','AvailabilityController@store')->name('property.admin.availability.store');
});

Route::match(['get'],'/category','CategoryController@index')->name('property.admin.category.index');
Route::match(['get'],'/category/edit/{id}','CategoryController@edit')->name('property.admin.category.edit');
Route::post('/category/store/{id}','CategoryController@store')->name('property.admin.category.store');
