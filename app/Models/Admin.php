<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Import Authenticatable
use Illuminate\Notifications\Notifiable; // Import Notifiable
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable // Extend Authenticatable
{
    use HasFactory, Notifiable; // Use the Notifiable trait

    protected $fillable = ['name', 'email', 'password']; // Mass assignable attributes

    // Additional methods or properties can be defined here as needed
}