<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Carbon\Carbon;
use Auth;
use App\SMS;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		$age = Carbon::createFromDate(1977, 3, 1)->age;
		
		View::share('age', $age);
		
        View()->share('user', Auth::user());  //
        View()->share('SMSbody', SMS::where('created_at', '>=', Carbon::now()->subDays(10))->orderBy('created_at', 'DESC')->take(10)->get());

	
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
