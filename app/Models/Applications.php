<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    protected $table = 'applications';
    protected $fillable = ['user_id', 'job_id', 'letter'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function job(){
        return $this->belongsTo(Jobs::class, 'job_id', 'id');
    }
}
