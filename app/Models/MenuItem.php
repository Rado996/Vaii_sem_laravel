<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuItem extends Model
{
    use HasFactory;
    protected $fillable = ['itemName', 'itemDesc', 'itemIng', 'itemPrice'];
}
