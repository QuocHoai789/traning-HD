<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingEmail extends Model
{
    use HasFactory;

    protected $table = 'outgoing_emails';
    protected $fillable = ['email', 'status'];
}
