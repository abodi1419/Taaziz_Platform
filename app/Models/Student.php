<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['sid', 'user_id','dob','graduation_date','is_employed'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function profile(){
        return $this->hasOne(Profile::class,'student_id','id');
    }
}
