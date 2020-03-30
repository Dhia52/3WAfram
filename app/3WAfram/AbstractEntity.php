<?php

namespace Fram;

abstract class AbstractEntity
{
    public function __construct(array $attributes)
    {
        $this->hydrate($attributes);
    }

    public function hydrate(array $attributes)
    {
        foreach ($attributes as $attribute => $value) {
            $method = 'set' . ucfirst($attribute);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}