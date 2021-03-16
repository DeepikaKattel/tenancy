<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $connection = 'system';
    protected $table = 'employee';
    protected $guarded = [];

}
