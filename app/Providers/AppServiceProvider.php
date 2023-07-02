<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use stdClass;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $active = new stdClass();
            $active->id=1;
            $active->name='Active';
            $uactive = new stdClass();
            $uactive->id=2;
            $uactive->name='Disabled';
            $view->with('STATUS',[
                $active,$uactive
            ]);

            $view->with('languages', \App\Model\Language::where('status', 1)->orderBy('pos', 'asc')->get());
            if (Auth::guard('backend')->check()) {
                //$fb =strpos(request()->route()->getAction()['namespace'],'App\Http\Controllers\Backend')!==false?'backend':'frontend';
                ///dd(strpos(request()->route()->getAction()['namespace'],'App\Http\Controllers\Backend')!==false);
                $view->with('menus', createMenuHtml());
            } else {
                $view->with('menus', '');
            }
        });
    }
}
