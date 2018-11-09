<h3>Convertisseur Degrés Décimaux => Lambert II étendu :</h3>
<form action="converter.php">
  Lattitude:<br>
  <input type="text" name="lat" value="<?php echo $_GET["lat"]; ?>" ><br>
  Longitude:<br>
  <input type="text" name="lon" value="<?php echo $_GET["lon"]; ?>" ><br><br>
  <input type="submit" value="Submit">
</form>

<?php


if(isset($_GET["lat"])&&isset($_GET["lon"])) {
  $lat = $_GET["lat"];
  $lon = $_GET["lon"];

  $lat = floatval(str_replace(',', '.', $lat));
  $lon = floatval(str_replace(',', '.', $lon));
  echo $lat;
  echo "<br>";

  $lat = $lat*3600;
  $lon = $lon*3600;

  echo $lat;
  echo "<br>";


  $n = 0.7289686274;
  $C = 11745793.39;
  $e = 0.08248325676;
  $Xs = 600000;
  $Ys = 8199695.768;
  $pi = pi();

  $GAMMAO = (3600*2)+(60*20)+14.025;
  $GAMMAO = $GAMMAO/(180*3600)*$pi;

  $lat = $lat/(180*3600)*$pi;
  $lon = $lon/(180*3600)*$pi;


  $L = 0.5*log((1+sin($lat))/(1-sin($lat)))-$e/2*log((1+$e*sin($lat))/(1-$e*sin($lat)));
  $R = $C*exp(-$n*$L);

  $GAMMA = $n*($lon-$GAMMAO);

  $Lx = $Xs+($R*sin($GAMMA));
  $Ly = $Ys-($R*cos($GAMMA));

  echo "Lx = ".$Lx;
  echo "<br>";
  echo "Ly = ".$Ly;

}

?>
