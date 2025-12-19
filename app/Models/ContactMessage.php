<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;
    
    // Define the table name if it doesn't follow Laravel's convention (it does here, but good practice)
    protected $table = 'contact_messages';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'is_read',
    ];
}