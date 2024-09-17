<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    // con questa proprietà comunica al model quali sono i campi da riempire
    protected $fillable = [

        'title',
        'thumb',
        'type',
        'price',
        'series',
        'sale_date',
        'description',
        'slug'




    ];


}
