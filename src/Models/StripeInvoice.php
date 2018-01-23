<?php

namespace Mueva\Payments\Models\System;

use Illuminate\Database\Eloquent\Model;
use Mueva\Payments\Models\Traits\DynamicTableName;


class StripeInvoice extends Model
{
    use DynamicTableName;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
