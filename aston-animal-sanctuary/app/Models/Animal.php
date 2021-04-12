<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Animal extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [ 'name', 'species','age', 'breed', 'colour' ];

	public $sortable = ['id', 'name', 'species','age', 'breed', 'colour', 'created_at', 'updated_at'];
}
