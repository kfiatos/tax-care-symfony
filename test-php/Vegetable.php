<?php

/**
 * Class Vegetable
 */
abstract class Vegetable extends Plant
{
    /**
     * @return string
     */
    public function getType()
    {
        return parent::getType();
    }
}