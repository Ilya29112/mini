<?php

namespace Characters;

class Mage extends Character
{
    public function attack(): void
    {
        echo "Маг {$this->name} применяет заклинание!\n";
    }
}