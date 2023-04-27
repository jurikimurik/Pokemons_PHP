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
    function restoreHp(): void
    {
        $this->currentHp = $this->maxHp;
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

    public function getPokemonTypeName(): string
    {
        return "";
    }
    // Attack

    public function Attack(Pokemon $pokemonToAttack, AttackType $attackType): bool
    {
        if ($this->bParalysed)
        {
            $this->restoreState();
            return false;
        }
        switch ($attackType)
        {
            case AttackType::BaseAttack;
                switch ($this->pokemonType)
                {
                    case PokemonType::Fire;
                    $pokemonToAttack->changeCurrentHp(-10*(1-$pokemonToAttack->getFireResistance()/100));
                    break;

                    case PokemonType::Water;
                    $pokemonToAttack->changeCurrentHp(-10*(1-$pokemonToAttack->getWaterResistance()/100));
                    break;

                    case PokemonType::Grass;
                    $pokemonToAttack->changeCurrentHp(-10*(1-$pokemonToAttack->getGrassResistance()/100));
                    break;

                }
                return true;
            case AttackType::Confuse:
            case AttackType::Paralyse;
                return rand(0,1) == 1;

            case AttackType::AttackSelf;
                $this->Attack($this, AttackType::BaseAttack);
                $this->restoreState();
                break;
            case AttackType::Paralysed;
                $this->restoreState();
                break;
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

    private bool $confused = false;
    private bool $paralysed = false;

    function getConfused(): bool
    {
        return $this->confused;
    }
    function confuse(): void
    {
        $this->confused = true;
    }

    function getParalysed(): bool
    {
        return $this->paralysed;
    }
    function paralyse(): void
    {
        $this->paralysed = true;
    }
    function restoreState(): void
    {
        $this->confused = false;
        $this->paralysed = false;
    }
}