<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gender;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->delete();
        $names =[
            ['en'=>'male','ar'=>'ذكر'],
            ['en'=>'female','ar'=>'انثى']
            

        ];
        
        foreach($names as $name){
            Gender::create(['name'=> $name]);
        }
    }
}
