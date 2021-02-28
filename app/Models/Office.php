<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Office extends Model
{
    use Notifiable;

    protected $table = 'offices';

    protected $fillable = [
        'office_id', 'member_since', 'office_name', 'office_address', 'office_phone', 'office_email', 'office_logo'
    ];
    /**
     * @var mixed
     */

}
