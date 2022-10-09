<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_phone',
        'company_website',
        'company_info',
        'job_title',
        'job_types',
        'job_location',
        'job_description',
        'apply_by',
        'apply_by_link_Email'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
