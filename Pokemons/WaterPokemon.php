<?php

namespace Pokemons;
require_once "./PokemonMain/Pokemon.php";

use Pokemon;
class WaterPokemon extends Pokemon
{
    public function __construct($newName, $newMaxHp)
    {
        parent::__construct($newName, $newMaxHp, array(50, -50, -50));
        $this->pokemonType = \PokemonType::Water;
    }

    public function getPokemonTypeName(): string
    {
        return "Water";
    }
}