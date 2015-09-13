<?php
/**
 * Created by PhpStorm.
 * User: vrigzlinuxmint13
 * Date: 9/12/15
 * Time: 9:29 AM
 *
 */
return spl_autoload_register( function ( $class ) {

    if( PHP_MAJOR_VERSION === 7 ) {
        define( 'COMMON_CONFIG', require( dirname( __FILE__ ) . '/src/configs/common.php' ) );

        /* Uncomment the line below if you're using PHP 7 */
        // ( empty( $common[ 'app' ] ) ) ? $appName = 'AutoImportSQL' : $appName = COMMON_CONFIG[ 'app' ];

    } else {
        $common = require( dirname( __FILE__ ) . '/src/configs/common.php' );
        ( empty( $common[ 'app' ] ) ) ? $appName = 'AutoImportSQL' : $appName = $common[ 'app' ];
    }

    /**
     * Set the directories including its namespace according to the class, interface, traits path of the app
     * Autoloads abstract classes, classes, interfaces as of now, needs further tests for other code templates
     *
     *      $appName . '\\Namespace\\' => dirname( __FILE__ ) . '/directoryname'
     *
     *      Important: Namespaces should be in upper case first!
     */
    $directories = array(
        $appName . '\\'             => dirname( __FILE__ ) . '/src/',
        $appName . '\\Interfaces\\' => dirname( __FILE__ ) . '/src/',
        $appName . '\\Traits\\'     => dirname( __FILE__ ) . '/src/',
        $appName . '\\Tests\\'      => dirname( __FILE__ ) . '/',
    );


    /* Find all kinds of php files in this app */
    foreach( $directories as $namespace => $dir ) {
        $classFile          = substr( strchr( $class, '\\' ), 1 );
        $changeForwardSlash = preg_replace( '/\\\/', '/', $classFile );

        if( file_exists( $dir . $changeForwardSlash . ".php" ) ) {
            require_once( $dir . $changeForwardSlash . ".php" );
        } else if( file_exists( $dir . lcfirst( $changeForwardSlash ) . ".php" ) ) {
            require_once( $dir . lcfirst( $changeForwardSlash ) . ".php" );
        }
    }

    ( PHP_MAJOR_VERSION === 7 ) ? \AutoImportSql\AutoImportSqlCommon::setCommonConfig( COMMON_CONFIG ) : \AutoImportSql\AutoImportSqlCommon::setCommonConfig( $common );

} );

