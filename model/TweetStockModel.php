<?php

namespace ProjectModel;

use \SimpleORM\Model;


class TweetStockModel extends Model
{
  protected static function getTableName()
  {
    return 'tweets_stocks';
  }

  //Custom methods for this model

  public static function getStock($stockName)
  {
    return self::query()->select('id', 'stock', 'tweet_count')->where('stock', '=', $stockName)->execute();
  }
}
