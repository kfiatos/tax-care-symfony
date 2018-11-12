<?php

/**
 * Class Plant
 */
abstract class Plant implements PlantInterface
{
    /**
     * @var string
     */
    protected $type = 'Other';

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

}