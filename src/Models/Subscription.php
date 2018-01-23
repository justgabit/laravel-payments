<?php

namespace Mueva\Payments\Models\System;

use Illuminate\Database\Eloquent\Model;
use Mueva\Payments\Models\Traits\DynamicTableName;

class Subscription extends Model
{
    use DynamicTableName;

    public function stripePlan()
    {
        return $this->hasOne(StripePlan::class);
    }
}
