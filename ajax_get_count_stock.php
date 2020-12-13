<?php

//Uncomment to see the errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
require_once('model/TweetStockModel.php');

use ProjectModel\TweetStockModel;

$stockKeyword  = "";
if (isset($_POST['stock_keyword'])) {
  $stockKeyword = $_POST['stock_keyword'];
}


