<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Patient extends Model
{
    use Notifiable;

    protected $table = 'patients';

    protected $fillable = [
        'name', 'email', 'phone', 'assisted_by', 'notes', 'qr_link', 'active', 'counter'
    ];
}
