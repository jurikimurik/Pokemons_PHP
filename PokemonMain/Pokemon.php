<?php

require "PokemonTypesEnum.php";
require "AttackTypesEnum.php";
class Pokemon
{

    // Constructor
    function __construct($newName, $newMaxHp, $resistances)
    {
        $this->setName($newName);
        $this->changeMaxHp($newMaxHp);
        $this->changeCurrentHp($newMaxHp);
        $this->setBaseResistance($resistances[0], $resistances[1], $resistances[2]);
    }

    // Name
    private string $name = "BaseName";
    private function setName($newName): void
    {
        $this->name = $newName;
    }

    function getName(): string
    {
        return $this->name;
    }

    // Max hp
    private float $maxHp = 0.0;
    function changeMaxHp($value): void
    {
        $this->maxHp += $value;
    }
    function getMaxHp(): float
    {
        return $this->maxHp;
    }

    // Current hp
    private float $currentHp = 0.0;
    function changeCurrentHp($value): void
    {
        $this->currentHp += $value;
    }
    function getCurrentHp(): float
    {
        return $this->currentHp;
    }

    // Attack

    public function Attack(Pokemon $pokemonToAttack, AttackType $attackType): bool
    {
        $pokemonToAttack->changeCurrentHp();
        switch ($attackType)
        {
            case AttackType::BaseAttack;
                $pokemonToAttack->changeCurrentHp(-10);
                return true;
            case AttackType::Confuse:
            case AttackType::Paralyse;
                return rand(0,1) == 1;
        }
        return false;
    }

    // Resistance
    function setBaseResistance($baseFireResistance, $baseWaterResistance, $baseGrassResistance): void
    {
        $this->changeFireResistance($baseFireResistance);
        $this->changeWaterResistance($baseWaterResistance);
        $this->changeGrassResistance($baseGrassResistance);
    }

    // fire
    private float $fireResistance = 0.0;
    function changeFireResistance($value): void
    {
        $this->fireResistance += $value;
    }
    function getFireResistance($value): float
    {
        return $this->fireResistance;
    }

    //water
    private float $waterResistance = 0.0;
    function changeWaterResistance($value): void
    {
        $this->waterResistance += $value;
    }
    function getWaterResistance($value): float
    {
        return $this->waterResistance;
    }

    //grass
    private float $grassResistance = 0.0;
    function changeGrassResistance($value): void
    {
        $this->grassResistance += $value;
    }
    function getGrassResistance($value): float
    {
        return $this->grassResistance;
    }

}