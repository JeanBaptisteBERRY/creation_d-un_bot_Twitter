<?php


session_start();
require_once("C:/Users/BigData/Downloads/twitteroauth-master/twitteroauth-master/twitteroauth/twitteroauth.php"); //Path to twitteroauth library

$search = "car";
$notweets = 50;
$consumer_key = "wm2a0vlv7ZrHhYIBgClbFLZ2R";
$consumer_secret = "MTCkdtc6aazNOD3iGM6Oha0p76cl39Dtpf1bMNCfMqLmXytEdi";
$access_key = "910800754910343169-KpvUnxDOwKF98xkWaZmxcxrIcwR95Jn";
$access_secret = "9bOcBxo91pBzueNiIuQLm2qD6SZkTowfkL9oYaOuIGvlV";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}

$connection = getConnectionWithAccessToken($consumer_key, $consumer_secret, $access_key, $access_secret);

$theSearch = [
 'q' => '#Kamikaze',
 'count' => 780
];
 
// 'location' => 'Paris',
$results = $connection->get('search/tweets', $theSearch);
 
foreach($results->statuses as $status) {
$connection->post('favorites/create', [
 'id' => $status->id_str
]);
}


//$connection->post('favorites/create', [
// 'id' => $status->id_str
//]);

//$connection->post('statuses/retweet', [
// 'id' => $status->id_str
//]);






?>
