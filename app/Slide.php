<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slides';
    protected $primaryKey = 'id';
    protected $fillable =[
        'slide_image',
        'slide_title',
        'slide_description',
        'status',
    ];
}
