<?php
/**
 * Created by PhpStorm.
 * User: vrigzlinuxmint13
 * Date: 9/12/15
 * Time: 9:29 AM
 *
 */
return spl_autoload_register( function ( $class ) {

    $directories = [ dirname( __FILE__ ) . '/src/', dirname( __FILE__ ) . '/', ];

    /* Find all kinds of php files in this app */
    foreach( $directories as $dir ) {
        $classFile          = substr( strchr( $class, '\\' ), 1 );
        $changeForwardSlash = preg_replace( '/\\\/', '/', $classFile );

        if( file_exists( $dir . $changeForwardSlash . ".php" ) ) {
            require_once( $dir . $changeForwardSlash . ".php" );
        } else if( file_exists( $dir . lcfirst( $changeForwardSlash ) . ".php" ) ) {
            require_once( $dir . lcfirst( $changeForwardSlash ) . ".php" );
        }
    }

    if( PHP_MAJOR_VERSION === 7 ) {
        define( 'COMMON_CONFIG', require( dirname( __FILE__ ) . '/src/configs/common.php' ) );
        $common = COMMON_CONFIG;
    } else {
        $common = require( dirname( __FILE__ ) . '/src/configs/common.php' );
    }

    AutoImportSql\AutoImportSqlCommon::setCommonConfig( $common );

} );

