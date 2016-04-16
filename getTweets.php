<?php
session_start();
require_once("libraries/twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "mgcmrrr";
$notweets = 2;
$consumerkey = "jH8EymLQn96Lg1nvItehGqTZQ";
$consumersecret = "aqfFZANRag0zLlobHRK1C8e9E4JsSeUmDa5gsP2Uq7L1b4pRPo";
$accesstoken = "711920260299919360-tkRlyhJWGkCiVqH83wJTFQ4n7Xw3ben";
$accesstokensecret = "H9NpUHBBZmBRg4OA8GCTqP0KXKqCWq4HzT52HHi371wzL";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>
