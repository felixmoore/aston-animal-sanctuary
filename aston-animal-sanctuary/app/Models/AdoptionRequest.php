<?php

namespace App\Models;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [ 'animal_id', 'user_id'];

	public $sortable = ['id', 'animal_id', 'user_id','animal_name', 'user_name', 'status', 'created_at', 'updated_at'];

}
