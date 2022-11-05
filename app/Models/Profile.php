<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['bio','state','major','gpa','image'];

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function skills(){
        return $this->hasMany(Skill::class,'profile_id','id');
    }
    public function experiences(){
        return $this->hasMany(Experience::class,'profile_id','id');
    }
    public function projects(){
        return $this->hasMany(Project::class,'profile_id','id');
    }
    public function certifications(){
        return $this->hasMany(Certification::class,'profile_id','id');
    }
    public function languages(){
        return $this->hasMany(Language::class,'profile_id','id');
    }
    public function contacts(){
        return $this->hasMany(Contact::class,'profile_id','id');
    }
}
