<?php

session_start();
require_once("C:/Users/BigData/Downloads/twitteroauth-master/twitteroauth-master/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
$consumer_key = "";//YOUR CONSUMER KEY
$consumer_secret = "";//YOUR CONSUMER KEY SECRET
$access_key = "";//YOUR TOKEN ACCESS
$access_secret = "";//YOUR TOKEN ACCESS SECRET
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
$connection = getConnectionWithAccessToken($consumer_key, $consumer_secret, $access_key, $access_secret);
$theSearch = [
 'q' => '#Kamikaze',//CHOOSE HERE YOUR HASHTAGS
 'count' => 780//NUMBER OF TWEETS
  // 'location' => 'Paris', YOU CAN ADD THE LOCATION HERE
];
 
// 'location' => 'Paris',
$results = $connection->get('search/tweets', $theSearch);
 
foreach($results->statuses as $status) {
$connection->post('statuses/retweet', [
 'id' => $status->id_str
]);
}
?>
