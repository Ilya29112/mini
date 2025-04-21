<?php

namespace Characters;

class Character
{
    protected $name;
    protected $health;

    public function __construct(string $name, int $health)
    {
        $this->name = $name;
        $this->health = $health;
    }

    public function attack()
    {
        echo "Персонаж {$this->name} атакует!\n";
    }
}

class Warrior extends Character
{
    public function attack()
    {
        echo "Воин {$this->name} наносит удар мечом!\n";
    }
}

class Mage extends Character
{
    public function attack()
    {
        echo "Маг {$this->name} применяет заклинание!\n";
    }
}

class Archer extends Character
{
    public function attack()
    {
        echo "Лучник {$this->name} стреляет из лука!\n";
    }
}

function createCharacter($type, $name, $health)
{
    switch (strtolower($type)) {
        case 'warrior':
            return new Warrior($name, $health);
        case 'mage':
            return new Mage($name, $health);
        case 'archer':
            return new Archer($name, $health);
        default:
            return new Character($name, $health);
    }
}

echo "Создание персонажей (для завершения введите 'exit')\n";

$characters = [];

while (true) {
    echo "Введите тип персонажа (warrior, mage, archer или любой другой): ";
    $type = trim(fgets(STDIN));

    if ($type === 'exit') {
        break;
    }

    echo "Введите имя персонажа: ";
    $name = trim(fgets(STDIN));

    echo "Введите здоровье персонажа: ";
    $health = (int)trim(fgets(STDIN));

    $character = createCharacter($type, $name, $health);
    $characters[] = $character;

    echo "Персонаж создан!\n\n";
}

echo "\nРезультат атак:\n";
foreach ($characters as $character) {
    $character->attack();
}