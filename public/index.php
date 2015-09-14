<?php
/**
 * Created by PhpStorm.
 * User: vrigzlinuxmint13
 * Date: 9/12/15
 * Time: 7:57 AM
 */
require( dirname( __FILE__ ) . '/../bootstrap.php' );

if( class_exists( 'AutoImportSql\AutoImportSql' ) ) {
    echo "Hooray! You can start working now with " . AutoImportSql\AutoImportSqlCommon::$app->app . "!" . PHP_EOL;
}