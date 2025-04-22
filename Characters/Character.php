<?php

namespace Characters;

abstract class Character
{
    protected string $name;
    protected int $health;

    public function __construct(string $name, int $health)
    {
        $this->name = $name;
        $this->health = $health;
    }

    abstract public function attack(): void;
}
