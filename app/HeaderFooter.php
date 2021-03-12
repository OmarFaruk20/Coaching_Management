<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderFooter extends Model
{
    protected $table = 'header_footers';
    protected $primaryKey = 'id';
    protected $fillalbe = [
        'title',
        'sub_title',
        'address',
        'mobile',
        'copyright',
        'status',
    ];
}
