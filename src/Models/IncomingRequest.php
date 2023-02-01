<?php

namespace Lentex\RequestsRecorder\Models;

use Illuminate\Database\Eloquent\Model;

class IncomingRequest extends Model
{
    protected $casts = [
        'body' => 'array',
    ];
}
