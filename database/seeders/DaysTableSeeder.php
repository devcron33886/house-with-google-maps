<?php


namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;
use Spatie\OpeningHours\Day as SpatieDay;

class DaysTableSeeder extends Seeder
{
    public  function  run(){
        $days = SpatieDay::days();

        foreach($days as $day)
        {
            Day::create(['name' => $day]);
        }
    }
}
