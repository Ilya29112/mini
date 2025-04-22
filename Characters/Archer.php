<?php

namespace Characters;

class Archer extends Character
{
    public function attack(): void
    {
        echo "Лучник {$this->name} стреляет из лука!\n";
    }
}
