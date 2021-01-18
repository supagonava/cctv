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
// @yii - framework directory.
// @app - base path of currently running application.
// @common - common directory.
// @frontend - frontend web application directory.
// @backend - backend web application directory.
// @console - console directory.
// @runtime - runtime directory of currently running web application.
// @vendor - Composer vendor directory.
// @bower - vendor directory that contains the bower packages.
// @npm - vendor directory that contains npm packages.
// @web - base URL of currently running web application.
// @webroot - web root directory of currently running web application.