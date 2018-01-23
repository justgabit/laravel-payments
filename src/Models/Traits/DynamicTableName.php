<?php


namespace Mueva\Payments\Models\Traits;

trait DynamicTableName
{
    /**
     * Override default constructor to inject the correct connection name
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->connection = config('payments.model_connection');
    }
}