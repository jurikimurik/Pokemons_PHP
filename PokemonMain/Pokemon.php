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

    // Pokemon type
    private PokemonType $pokemonType = PokemonType::Normal;
    private function setPokemonType($newPokemonType): void
    {
        $this->pokemonType = $newPokemonType;
    }
    function getPokemonType(): PokemonType
    {
        return $this->pokemonType;
    }
    // Attack

    public function Attack(Pokemon $pokemonToAttack, AttackType $attackType): bool
    {
        switch ($attackType)
        {
            case AttackType::BaseAttack;
                switch ($this->pokemonType)
                {
                    case PokemonType::Fire;
                    $pokemonToAttack->changeCurrentHp(-10*(1-$this->getFireResistance()/100));
                    break;

                    case PokemonType::Water;
                    $pokemonToAttack->changeCurrentHp(-10*(1-$this->getWaterResistance()/100));
                    break;

                    case PokemonType::Grass;
                    $pokemonToAttack->changeCurrentHp(-10*(1-$this->getGrassResistance()/100));
                    break;
                }
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
    function getFireResistance(): float
    {
        return $this->fireResistance;
    }

    //water
    private float $waterResistance = 0.0;
    function changeWaterResistance($value): void
    {
        $this->waterResistance += $value;
    }
    function getWaterResistance(): float
    {
        return $this->waterResistance;
    }

    //grass
    private float $grassResistance = 0.0;
    function changeGrassResistance($value): void
    {
        $this->grassResistance += $value;
    }
    function getGrassResistance(): float
    {
        return $this->grassResistance;
    }

    // State

    private bool $bConfused = false;
    private bool $bParalysed = false;

    function confuse(): void
    {
        $this->bConfused = true;
    }

    function paralyse(): void
    {
        $this->bParalysed = true;
    }
    function restoreState(): void
    {
        $this->bConfused = false;
        $this->bParalysed = false;
    }
}