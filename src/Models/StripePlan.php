<?php

namespace Mueva\Payments\Models\System;

use Illuminate\Database\Eloquent\Model;
use Mueva\Payments\Models\Traits\DynamicTableName;

class StripePlan extends Model
{
    use DynamicTableName;

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
