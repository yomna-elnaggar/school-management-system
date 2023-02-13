<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teachers extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable =['name'];
    protected $guarded =['id','created_at','updated_at'];

    public function gender(){

        return $this->belongsTo(Gender::class);
    }

    public function specialization(){

        return $this->belongsTo(Specializations::class,);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class,'teacher_section');
    }
}
