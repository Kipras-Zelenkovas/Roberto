<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $fillable = ['name'];

    public function jobs(){
        return $this->hasMany(Jobs::class, 'city_id', 'id');
    }
}
