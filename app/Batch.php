<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'batches';
    protected $primaryKey = 'id';
    protected $fillable = [
        'class_id',
        'batch_name',
        'student_capacity',
        'status'
    ];
}
