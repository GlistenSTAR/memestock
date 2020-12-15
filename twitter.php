<?php
require_once('library/twitter-api-php/TwitterAPIExchange.php');

// Put Twitter API Creds here
$settings = array(
  'oauth_access_token' => "1366848732596109312-zKueFxrFSWxdQy99yW19Qz9l19b9W5",
  'oauth_access_token_secret' => "XVHulijq6NwzPHZgn76ecke6lcaYcPkPgW1jhuUBkNa93",
  'consumer_key' => "gNNVmQ9wuEe4WcLK8xg8lIU6R",
  'consumer_secret' => "CNHojkMe0mDaemIG5Pagf8LQl4ujpqktD2AKCgj93Nbvmor8T1"
);

$url = 'https://api.twitter.com/1.1/search/tweets.json';
        
$method = "GET";
$stockKeyword  = "";
if (isset($_POST['stock_keyword']))  {
  $stockKeyword = $_POST['stock_keyword'];
}

?>
