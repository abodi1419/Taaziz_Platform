<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;
    protected $fillable = ['name','issuer','date','description','url'];

    public function profile(){
        return $this->belongsTo(Profile::class,'profile_id','id');
    }
}
