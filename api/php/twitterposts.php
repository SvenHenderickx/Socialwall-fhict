<?php

session_start();
require_once("../twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
require 'secrets.php';

$twitteruser = $twitterusername;
$notweets = 10;
$consumerkey = $twitterconsumerkey;
$consumersecret = $twitterconsumersecret;
$accesstoken = $twitteraccesstoken;
$accesstokensecret = $twitteraccesstokensecret;

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

echo (json_encode($tweets));

 ?>
