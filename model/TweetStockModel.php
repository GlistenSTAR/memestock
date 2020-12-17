<?php

namespace ProjectModel;

use \SimpleORM\Model;


class TweetStockModel extends Model
{
  protected static function getTableName()
  {
    return 'tweets_stocks';
  }

}
