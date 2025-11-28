<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Permite que podamos usar Task::create(['name' => 'algo'])
    protected $fillable = ['name'];
}
