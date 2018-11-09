<?php

$paramIdPokemon = "";
$idPokemon = "";
$idPokemonMin = "";
$idPokemonMax = "";
if(isset($_GET['idPokemon'])){
  $idPokemon = $_GET['idPokemon'];
  $idPokemonArr = explode('-', $idPokemon);
  if(sizeof($idPokemonArr)>1)
  {
    $idPokemonMin = $idPokemonArr[0];
    $idPokemonMax = $idPokemonArr[1];
  }
  else{
    $paramIdPokemon = "nationalPokedexNumber=".$idPokemon;
  }
}

$paramSeries = "";
if(isset($_GET['series'])){
  $series = $_GET['series'];
  $paramSeries = "series=".$series;
}

if($paramIdPokemon!=""){
  $url = "https://api.pokemontcg.io/v1/cards?$paramSeries&$paramIdPokemon";
  $json = file_get_contents($url);
  // echo $url;
  $parse = json_decode($json, true);
  // echo "\n";
  $imageUrl = $parse["cards"][0]["imageUrl"];
  echo "<img src=\"$imageUrl\">";
  echo "<img src=\"https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$idPokemon.png\">";

  header('Content-type: application/json');
  // echo "\n";
  echo json_encode($parse, JSON_PRETTY_PRINT);
}else {
  for($i = $idPokemonMin; $i <= $idPokemonMax; $i++){
    $paramIdPokemon = "nationalPokedexNumber=".$i;
    $url = "https://api.pokemontcg.io/v1/cards?$paramSeries&$paramIdPokemon";
    $json = file_get_contents($url);
    // echo $url;
    $parse = json_decode($json, true);
    // echo "\n";
    $imageUrl = $parse["cards"][0]["imageUrl"];
    echo "<img src=\"$imageUrl\">";
    echo "<img src=\"https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$i.png\">";
  }
}



// header('Content-type: application/json');
// echo "\n";
// echo json_encode($parse, JSON_PRETTY_PRINT);

?>
