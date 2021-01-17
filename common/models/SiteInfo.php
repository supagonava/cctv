<?php

namespace common\models;

use Yii;

class SiteInfo
{
    public static function web()
    {
        return Yii::getAlias("@web") . "/";
    }
    public static function webroot()
    {
        return Yii::getAlias("@webroot") . "/";
    }
}
