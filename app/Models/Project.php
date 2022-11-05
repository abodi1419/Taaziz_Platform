<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','start','end','url'];

    public function profile(){
        $this->belongsTo(Profile::class,'profile_id','id');
    }
}
