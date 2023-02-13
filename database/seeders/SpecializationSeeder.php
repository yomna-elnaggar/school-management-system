<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specializations;
use Illuminate\Support\Facades\DB;
class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $names =[
            [ 'en'=>'Arabic', 'ar'=>'عربي'],
            [ 'en'=>'Math', 'ar'=>'حساب'],
            [ 'en'=>'Sciences','ar'=>'علوم' ],
            [ 'en'=>'Computer','ar'=>'حاسب الي' ],
            [ 'en'=>'English','ar'=>'انجليزي' ],
        ];
        
        foreach($names as $name){
            Specializations::create(['name'=> $name]);
        }
    }
}
