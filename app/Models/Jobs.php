<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $fillable = ['title', 'city_id', 'wage', 'position', 'user_id', 'description'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function applications(){
        return $this->hasMany(Applications::class, 'job_id', 'id');
    }

    public function city(){
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }
}
