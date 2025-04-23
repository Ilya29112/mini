<?php

require_once __DIR__ . '/vendor/autoload.php';

use Characters\Character;
use Characters\Warrior;
use Characters\Mage;
use Characters\Archer;

class CharacterFactory
{
    public static function create(string $type, string $name, int $health): Character
    {
        return match (strtolower($type)) {
            'warrior' => new Warrior($name, $health),
            'mage' => new Mage($name, $health),
            'archer' => new Archer($name, $health),
            default => throw new InvalidArgumentException("Неизвестный тип персонажа: $type")
        };
    }
}

function main(): void
{
    echo "Создание персонажей (для завершения введите 'exit')\n";

    $characters = [];

    while (true) {
        echo "Введите тип персонажа (warrior, mage, archer): ";
        $type = trim(fgets(STDIN));

        if ($type === 'exit') {
            break;
        }

        echo "Введите имя персонажа: ";
        $name = trim(fgets(STDIN));

        echo "Введите здоровье персонажа: ";
        $health = (int)trim(fgets(STDIN));

        try {
            $character = CharacterFactory::create($type, $name, $health);
            $characters[] = $character;
            echo "Персонаж создан!\n\n";
        } catch (InvalidArgumentException $e) {
            echo $e->getMessage() . "\n\n";
        }
    }

    echo "\nРезультат атак:\n";
    foreach ($characters as $character) {
        $character->attack();
    }
}

main();
