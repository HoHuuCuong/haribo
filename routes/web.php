<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace' => 'Backend', 'middleware' => 'locale','prefix'=>'admin'], function () {
    Route::get('login', 'Auth\AccountController@login')
        ->name('b.account.showlogin');
    Route::post('login', 'Auth\AccountController@loginPost')
        ->name('b.account.login');
    Route::get('/pass/{pass}', 'Auth\AccountController@pass')
        ->name('b.account.genpass');
    Route::get('access-deny', 'DashboardController@accessDeny')
        ->name('b.accessdeny');
    Route::put('lock-screen', 'DashboardController@lockScreen')
        ->middleware('auth.backend')
        ->name('b.lockscreen');
    Route::put('unlock-screen', 'DashboardController@unLockScreen')
        ->middleware('auth.backend')
        ->name('b.unlockscreen');
    Route::group(['middleware' => ['auth.backend', 'access.backend']], function () {
        Route::get('/', 'DashboardController@index')
            ->name('b.home');
        Route::get('/logout', 'Auth\AccountController@logout')
            ->name('b.account.logout');
        Route::get('/change-pass', 'Auth\AccountController@changePass')
            ->name('b.account.changepass');
        Route::put('/change-pass', 'Auth\AccountController@changePassPost')
            ->name('b.account.changepasspost');
        Route::get('/profile', 'Auth\AccountController@profile')
            ->name('b.account.profile');
        Route::put('/profile', 'Auth\AccountController@profilePost')
            ->name('b.account.profilepost');
        Route::group(['prefix' => 'account'], function () {
            Route::get('/', 'Auth\AccountController@index')
                ->name('b.account.list');
            Route::get('/create', 'Auth\AccountController@create')
                ->name('b.account.add');
            Route::post('/create', 'Auth\AccountController@store')
                ->name('b.account.store');
            Route::get('/edit-{id}', 'Auth\AccountController@edit')
                ->name('b.account.edit');
            Route::put('/edit-{id}', 'Auth\AccountController@update')
                ->name('b.account.update');
            Route::get('/delete-{id}', 'Auth\AccountController@destroy')
                ->name('b.account.del');
        });
        Route::group(['prefix' => 'account-group'], function () {
            Route::get('/', 'Auth\AccountGroupController@index')
                ->name('b.account.group');
            Route::get('/create', 'Auth\AccountGroupController@create')
                ->name('b.account.group.add');
            Route::post('/create', 'Auth\AccountGroupController@store')
                ->name('b.account.group.store');
            Route::get('/edit-{id}', 'Auth\AccountGroupController@edit')
                ->name('b.account.group.edit');
            Route::put('/edit-{id}', 'Auth\AccountGroupController@update')
                ->name('b.account.group.update');
            Route::get('/delete-{id}', 'Auth\AccountGroupController@destroy')
                ->name('b.account.group.del');
        });
        Route::group(['prefix' => 'roles'], function () {
            //ft
            Route::get('/users', 'Roles\RoleController@users')
                ->name('b.role.users');
            Route::get('/groups', 'Roles\RoleController@groups')
                ->name('b.role.groups');
            Route::get('/user-{id}', 'Roles\RoleController@user')
                ->name('b.role.user');
            Route::get('/group-{id}', 'Roles\RoleController@group')
                ->name('b.role.group');
            Route::put('/user-{id}', 'Roles\RoleController@userUpdate')
                ->name('b.role.setuser');
            Route::put('/group-{id}', 'Roles\RoleController@groupUpdate')
                ->name('b.role.setgroup');
        });
        Route::group(['prefix' => 'system', 'namespace' => 'Systems'], function () {
            Route::get('/bonus/delete-{id}', 'BonusCodeController@destroy')
            ->name('b.bonus.destroy');
            Route::resource('/bonus','BonusCodeController');
            Route::get('/customer/delete-{id}', 'CustomerController@destroy')
            ->name('b.customer.destroy');
            Route::resource('/customer','CustomerController');
            Route::get('/store/delete-{id}', 'StoreController@destroy')
                ->name('b.store.destroy');
            Route::resource('/store','StoreController');
            Route::get('/term/edit', 'TermController@edit')
                ->name('term.edit');
            Route::put('/term/edit', 'TermController@update')
                ->name('term.update');
            Route::get('/product/delete-{id}', 'ProductkmController@destroy')
            ->name('b.product.destroy');
            Route::resource('/product','ProductkmController');
            Route::get('/getcity', 'StoreController@getcities')->name('b.ajaxcity');

            Route::get('/config/general', 'ConfigController@general')
                ->name('b.config.general');
            Route::put('/config/general', 'ConfigController@generalput')
                ->name('b.config.generalput');
            Route::get('/config/home', 'ConfigController@home')
                ->name('b.config.home');
            Route::put('/config/home', 'ConfigController@homeput')
                ->name('b.config.homeput');
            Route::get('/config/product', 'ConfigController@product')
                ->name('b.config.product');
            Route::put('/config/product', 'ConfigController@productput')
                ->name('b.config.productput');
            Route::get('/config/about', 'ConfigController@about')
                ->name('b.config.about');
            Route::put('/config/about', 'ConfigController@aboutput')
                ->name('b.config.aboutput');
            Route::get('/config/program', 'ConfigController@program')
                ->name('b.config.program');
            Route::put('/config/program', 'ConfigController@programput')
                ->name('b.config.programput');
        });

        Route::get('/get-funcs', 'DashboardController@getlistfuncs')
            ->name('b.system.getfuncs');
        Route::post('/get-func', 'DashboardController@getfunc')
            ->name('b.system.getfunc');
        Route::post('/create-func', 'DashboardController@createfunc')
            ->name('b.system.createfunc');
        Route::post('/update-func', 'DashboardController@updatefunc')
            ->name('b.system.updatefunc');
        Route::get('/get-routes', 'DashboardController@getallRoutes')
            ->name('b.system.getroutes');
        Route::post('/get-districts', 'Systems\StoreController@getDistricts')
            ->name('b.ajax.getdistricts');
        Route::post('/get-categories', 'Systems\CategoryController@getCategories')
            ->name('b.ajax.getcategories');
    });
});
Route::group([ 'middleware' => 'locale'], function () {
    Route::get('/', 'HomeController@index')
        ->name('f.home');
    Route::get('/registration', 'HomeController@registration')
        ->name('f.registration');
    Route::post('/registration', 'HomeController@register')
        ->name('f.register');
    Route::get('/program-rules', 'HomeController@program')
    ->name('f.program');
    Route::get('/results', 'HomeController@ketqua')->name('f.ketqua');
    Route::get('/luckydraw', 'HomeController@luckydraw')->name('f.luckydraw');
    Route::get('/products', 'HomeController@products')
    ->name('f.products');
    Route::get('/about', 'HomeController@about')
    ->name('f.about');
    Route::get('/contact', 'HomeController@contact')
        ->name('f.contact');
    Route::post('/contact', 'HomeController@contactpost')
        ->name('f.contactpost');
    Route::get('lang/{language}', 'HomeController@changeLang')
        ->name('lang');
    Route::post('/get-districts', 'HomeController@getDistricts')
        ->name('f.ajax.getdistricts');
    Route::get('/alert', 'HomeController@alert')
        ->name('f.alert');
   // Route::fallback('HomeController@index');
   Route::get('/test', 'HomeController@test')
   ->name('f.test');
    Route::post('import', 'HomeController@import')->name('import');
});
