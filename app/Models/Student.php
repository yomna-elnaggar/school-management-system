<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Grade;
use App\Models\Gender;
use App\Models\Section;
use App\Models\MyParent;
use App\Models\Classroom;
use App\Models\TypeBlood;
use App\Models\Nationalitie;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use HasTranslations;

    use SoftDeletes;
    protected $table='students';
    public $translatable =['name'];
    protected $guarded =['id','created_at','updated_at'];

    public function gender(){

        return $this->belongsTo(Gender::class,"gender_id");
    }
    public function grade(){

        return $this->belongsTo(Grade::class,"Grade_id");
    }
    public function classroom(){

        return $this->belongsTo(Classroom::class,"Classroom_id");
    }
    public function section(){

        return $this->belongsTo(Section::class,"section_id");
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function Nationality(){

        return $this->belongsTo(Nationalitie::class,"nationalitie_id");
    }
    public function myparent(){

        return $this->belongsTo(MyParent::class,"parent_id");
    }
   
}
