<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
class ComposerUserProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       View::creator('pages.profile', 'App\Http\ViewComposers\ProfileComposer'); //<-- shares Variables in ProfileComposer only with the Profile.blade.php View.  Can create an array of Views if you want to share variables with more than one page.
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
