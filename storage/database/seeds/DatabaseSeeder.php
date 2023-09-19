<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
    	factory(App\invoice::class, 900)->create();
			
			
			
			
		
			
    }
}
