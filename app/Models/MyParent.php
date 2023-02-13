<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MyParent extends Model
{
    use HasFactory;

    use HasTranslations;

    protected $table= "myparents";
    public $translatable =['Name_Father','Name_Mother','Job_Father','Job_Mother'];

    protected $guarded =['id','created_at','updated_at'];


    public function religion(){

        return $this->belongsTo(Religion::class);
    }

    public function nationalitie(){

        return $this->belongsTo(Nationalitie::class);
    }

    public function typeBlood(){

        return $this->belongsTo(TypeBlood::class);
    }

}
