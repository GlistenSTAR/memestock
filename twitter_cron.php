<?php
//Uncomment to see the errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
require_once('model/TweetStockModel.php');


use ProjectModel\TweetStockModel;
use GuzzleHttp\Client;

$client = new Client();


$urlStock = "https://wsb-pop-index.s3.amazonaws.com/wsbPopIndex.json";
$dataStock = json_decode(file_get_contents($urlStock), true);
$dataSliceBatch1 = array_slice($dataStock['data'], 0, 5);
$dataSliceBatch2 = array_slice($dataStock['data'], 5, 5);
$dataSliceBatch3 = array_slice($dataStock['data'], 10, 10);

foreach ($dataSliceBatch1 as $key => $value) {

  $stockKeyword  = $value[0];

  $findStock = TweetStockModel::getStock($stockKeyword);

  $empty = empty($findStock->tweet_count);

  try {
    $bodyData = [
      'stock_keyword' => $stockKeyword
    ];
    $promise = $client->post('http://stock.local/twitter.php', ['form_params' => $bodyData]);
    $body = $promise->getBody();
    $dataRes = $body->getContents();

    
    echo "Count saved: " . intval($dataRes);
  } catch (\Exception $e) {
    if ($e->getMessage()) {
      continue;
    }
  }
}
}