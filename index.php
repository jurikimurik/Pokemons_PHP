<?php
require "visualScript.php";


include "Pokemons/FirePokemon.php";
include "Pokemons/GrassPokemon.php";

$Charizard = new \Pokemons\FirePokemon("Charizard",100);
$Trawnik = new \Pokemons\GrassPokemon("Trawnik", 100);

#require "PokemonMain/Pokemon.php";

#$pokemon = new Pokemon("Charizard", 100, [0,0,0]);
?>

<html>
<style>
    table, th, td {
        border:1px solid black;
    }
</style>
<body>

<?php
echo narysujPokemona($Charizard);
echo narysujPokemona($Trawnik);
?>






