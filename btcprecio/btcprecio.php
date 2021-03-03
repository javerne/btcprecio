<!DOCTYPE html>
<html>
<body>

<?php
if( isset( $_COOKIE['BTCVAL']) ){
  $btcval = $_COOKIE['BTCVAL'];
}else{
  setcookie("BTCVAL", "0");
  $btcval = 0;
}

$apikey = "&apikey=a7204bc59e77a01c8c88c223994bf187218014515c9978d77ff5f0f7135a35e6";
$url = 'https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD,JPY,EUR'.$apikey;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$resp = json_decode(curl_exec($curl));
echo "Referencia anterior: ". $_COOKIE['BTCVAL']."<br>";
$act = $resp->USD;
$ant = $_COOKIE['BTCVAL'];
if ($ant>$act){
  // bajó
  echo "Valor BTC: <span style='color:red'>".$act."</span>"; 
}else{
  //subió
  echo "Valor BTC: <span style='color:green'>".$act."</span>";
}
setcookie("BTCVAL", $act);
curl_close($curl);
?>

<script>
  //setTimeout(function(){ location.reload(); }, 3000);
</script>
</body>
</html>
