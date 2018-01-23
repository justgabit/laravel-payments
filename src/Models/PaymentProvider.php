<?php

namespace Mueva\Payments\Models\System;

use Illuminate\Database\Eloquent\Model;
use Mueva\Payments\Models\Traits\DynamicTableName;

class PaymentProvider extends Model
{
    use DynamicTableName;
}
