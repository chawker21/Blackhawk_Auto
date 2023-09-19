<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class invoice extends Model
{
    public function customer_info()
	{
		return $this->belongsTo('App\customer_info');
		
	}//
    public function customer_vehicle()
    {
        return $this->belongsTo('App\customer_vehicle');
    }
    public static function invoiceTotals() {
        $invoiceTotals = [
        'thirty' => invoice::where('created_at', '>=', Carbon::now()->subDays(30))->sum('invoice_total'),
        'month' => invoice::where('created_at', '>=', Carbon::now()->startOfMonth())->sum('invoice_total'),
        'week' => invoice::where('created_at', '>=', Carbon::now()->startOfWeek())->sum('invoice_total'),
        'daily' => invoice::where('created_at', '>=', Carbon::today())->sum('invoice_total'),
        'year' => invoice::all()->sum('invoice_total')
        ];
        return $invoiceTotals;
    }

}
