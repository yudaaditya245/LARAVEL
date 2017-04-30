<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'tbl_artikel';
    public $timestamps = false;
    protected $guarded = ['id'];
}
