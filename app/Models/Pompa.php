<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pompa extends Model
{
    use HasFactory;

    protected $fillable = [
        'pompafilter',
        'pompabuang',
        'pompaisi',
        'data_from_esp32',
    ];
}
