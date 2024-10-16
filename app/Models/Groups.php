<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Groups extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'phone', 'group_image', 'description', 'location'

    ];




}
