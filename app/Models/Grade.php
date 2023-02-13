<?php

namespace App\Models;


use App\Models\Classroom;
use Spatie\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable =['name'];
    
    protected $fillable = [
        'name',
        'notes',
        
    ];

    public function classrooms(){
        return $this->hasMany(Classroom::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }
}
