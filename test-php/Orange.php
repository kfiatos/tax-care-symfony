<?php

/**
 * Class Orange
 */
class Orange extends Fruit
{
    /**
     * @var string
     */
    protected $type = 'Orange';

    /**
     * @return string
     */
    public static function make()
    {
        return 'orange juice';
    }
}