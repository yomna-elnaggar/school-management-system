<?php

namespace App\Models;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable =['name'];

    protected $guarded =['id','created_at','updated_at'];

    public function grade(){

        return $this->belongsTo(Grade::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }
}
