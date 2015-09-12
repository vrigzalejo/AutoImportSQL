<?php
/**
 * Created by PhpStorm.
 * User: vrigzlinuxmint13
 * Date: 9/12/15
 * Time: 10:05 PM
 */

namespace AutoImportSql;


class AutoImportSqlCommon
{
    public static $app;

    public static function setCommonConfig( $commonConfig )
    {
        self::$app = $commonConfig;
    }

}