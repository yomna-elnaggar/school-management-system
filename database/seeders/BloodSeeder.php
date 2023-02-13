<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeBlood;
use Illuminate\Support\Facades\DB;
class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_bloods')->delete();
        $names=['O+','O-','A+','A-','B+','B-','AB+','AB-'];
        foreach($names as $name){
        TypeBlood::create(['name' => $name]);
        }
    }
}
