<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Animal extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [ 'name', 'species','age', 'sex', 'breed', 'colour', 'image' ];

	public $sortable = ['id', 'name', 'species','age', 'breed', 'colour', 'available', 'created_at', 'updated_at'];

    
}
