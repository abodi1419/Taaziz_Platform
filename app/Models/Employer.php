<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','speciality','website'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
