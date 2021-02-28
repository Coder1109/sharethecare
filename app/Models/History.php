<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class History extends Model
{
    use Notifiable;

    protected $table = 'sms_history';

    protected $fillable = [
        'sender', 'patient_name', 'Email', 'phone', 'referral_date'
    ];
}
