<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    public $table ='product';
    public $primaryKey ='id';
    public $incrementing =true;
    public $keyType ='int';
    public $timestamps =false;

    protected $guarded = ['id'];
}
