<?php

namespace Sp\Models;

use Illuminate\Database\Eloquent\Model;


class PaymentRequests extends Model
{
    protected $table = 'payment_requests';


    public function status()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id');
    }       
}
