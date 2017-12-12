<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
      Schema::defaultStringLength(191);

//      view()->share('posts_archive', $posts_archive);
      view()->composer('layouts.aside', function($view) {
        $posts_archive = DB::table('posts')
            ->select(DB::raw('YEAR(created_at) year,
                           MONTH(created_at) month,
                           MONTHNAME(created_at) month_name,
                           COUNT(*) post_count'))
            ->groupBy('month', 'year')
            ->orderBy('created_at', 'desc')
            ->get();

        return $view->with(compact('posts_archive'));
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
