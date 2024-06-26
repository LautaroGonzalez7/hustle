<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Enums\Scopes;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        if (Schema::hasTable('categories')) {
            $categories = Category::all();

            $ocasiones = [];
            $tipos = [];
            $regalos = [];
            $postres = [];

            foreach ($categories as $category) {
                if ($category->scope === Scopes::OCASIONES) {
                    $ocasiones[] = $category;
                }
                if ($category->scope === Scopes::TIPOS) {
                    $tipos[] = $category;
                }
                if ($category->scope === Scopes::REGALOS) {
                    $regalos[] = $category;
                }
                if ($category->scope === Scopes::POSTRES) {
                    $postres[] = $category;
                }
            }
            View::share('allCategories', ["ocasiones" => $ocasiones, "tipos" => $tipos, "regalos" => $regalos, "postres" => $postres]);
        }
    }
}
