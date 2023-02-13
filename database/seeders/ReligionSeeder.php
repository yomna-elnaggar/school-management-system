<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Religion;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('religions')->delete();
        $names =[
            [
                'en'=>'Muslim',
                'ar'=>'مسلم'
            ],

            [
                'en'=>'christion',
                'ar'=>'مسيحي'
            ],
            [
                'en'=>'Other',
                'ar'=>'غير ذلك'
            ],

        ];
        
        foreach($names as $name){
            Religion::create(['name'=> $name]);
        }
    }
}
