<?php

namespace Mueva\Payments\Models\System;

use Illuminate\Database\Eloquent\Model;
use Mueva\Payments\Models\Traits\DynamicTableName;

class Order extends Model
{
    use DynamicTableName;

    public function stripeInvoice()
    {
        return $this->hasOne(StripeInvoice::class);
    }
}
