<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable =['name'];

    protected $guarded =['id','created_at','updated_at'];

    public function classroom(){

        return $this->belongsTo(Classroom::class);
    }

    public function grade(){

        return $this->belongsTo(Grade::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teachers::class,'teacher_section');
    }
}
