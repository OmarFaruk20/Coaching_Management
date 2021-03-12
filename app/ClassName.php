<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    protected $table = 'class_names';
    protected $primaryKey ='id';
    protected $fillable = [
        'class_name',
        'status',
    ];
}
