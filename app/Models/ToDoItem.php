<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoItem extends Model
{
    use HasFactory;
    protected $table = "Items";
    protected $fillable = [
        "message",
        "isLined"
    ];
    
}
