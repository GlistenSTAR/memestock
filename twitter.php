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

$done = false;
$countTweets = 0;

$until = date('Y-m-d');
$since = date('Y-m-d', time() - 60 * 60 * 24);

$params = "?q=$$stockKeyword&count=100&since=$since&until=$until&include_entities=false&result_type=mixed";
$twitter = new TwitterAPIExchange($settings);

$data = $twitter->request($url, $method, $params);
$stringResults = json_decode($data,$assoc = TRUE);

$countTweets = isset($stringResults['statuses']) ? count($stringResults['statuses']) : 0;

if(array_key_exists("errors", $stringResults)) {
  echo "Sorry, there was a problem. Twitter returned the following error message:<p><em>".$stringResults[errors][0]["message"]."</em></p>";exit();
}

// If all the tweets have been fetched, then we are done
if (!isset($stringResults['search_metadata']['next_results'])) {
  $done = true;
}

while ($done == false) {
  // Parse maxId
  $explode1 = explode('&',$stringResults['search_metadata']['next_results']) ;
  $explode2 = explode('?max_id=', $explode1[0]);
  $maxId = $explode2[1];

  $params = "?q=$$stockKeyword&count=100&max_id=$maxId&since=$since&until=$until&include_entities=false&result_type=mixed";
  $data = $twitter->request($url, $method, $params);
  $stringResults = json_decode($data,$assoc = TRUE);

  // Updating count tweets
  $countTweets = $countTweets + (isset($stringResults['statuses']) ? count($stringResults['statuses']) : 0);

  // If all the tweets have been fetched, then we are done
  if (!isset($stringResults['search_metadata']['next_results'])) {
    $done = true;
  }
  
}

echo json_encode($countTweets);exit();
?>
