<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'price'];
    public function rules()
    {
        return  ['name' => 'required|', 'price' => 'required'];
    }
}
