<?php
session_start();
ob_start();

if(isset($_POST['pokemon1type']) && isset($_POST['pokemon2type']) && isset($_POST['pokemon1name']) && isset($_POST['pokemon2name']))
{
    $pokemon1type = $_POST['pokemon1type'];
    $pokemon1name = $_POST['pokemon1name'];

    $pokemon2type = $_POST['pokemon2type'];
    $pokemon2name = $_POST['pokemon2name'];

    //if something is empty
    //  - redirect to main page
    if(empty($pokemon1name)  | empty($pokemon1type) | empty($pokemon2name) | empty($pokemon2type))
    {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}

//If program is here, that means that user input correct data.
//Create pokemons

require_once "Pokemons/FirePokemon.php";
require_once "Pokemons/GrassPokemon.php";
require_once "Pokemons/WaterPokemon.php";

$pokemon1 = new \Pokemons\FirePokemon("Example", 100);
$pokemon2 = new \Pokemons\FirePokemon("EXAMPLEFROMFIGHT", 100);
switch ($_POST['pokemon1type']) {
    case "fire": $pokemon1 = new \Pokemons\FirePokemon($_POST['pokemon1name'], 100); break;
    case "water": $pokemon1 = new \Pokemons\WaterPokemon($_POST['pokemon1name'], 100); break;
    case "grass": $pokemon1 = new \Pokemons\GrassPokemon($_POST['pokemon1name'], 100); break;
}
switch ($_POST['pokemon2type']) {
    case "fire": $pokemon2 = new \Pokemons\FirePokemon($_POST['pokemon2name'], 100); break;
    case "water": $pokemon2 = new \Pokemons\WaterPokemon($_POST['pokemon2name'], 100); break;
    case "grass": $pokemon2 = new \Pokemons\GrassPokemon($_POST['pokemon2name'], 100); break;
}

//Save to SESSION
$_SESSION['FIRST'] = serialize($pokemon1);
$_SESSION['ANOTHER'] = serialize($pokemon2);

//Redirecting
header("Location: fight.php");