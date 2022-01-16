<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function getDesignation()
    {
    return $this->hasOne('App\Models\Designation', 'id','designation_id');
    }
}
