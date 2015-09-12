<?php
/**
 * Created by PhpStorm.
 * User: vrigzlinuxmint13
 * Date: 9/12/15
 * Time: 8:14 AM
 */

namespace AutoImportSql;


use PDO;

abstract class AutoImportSqlDb
{
    private $_pdo;

    protected function __construct( $config )
    {
        try {
            $conf = $this->getConfigs( $config );

            if( is_array( $conf ) ) {
                $this->_pdo = new \PDO( $conf[ 'protocol' ]
                    . ':host=' . $conf[ 'host' ] . ";" . 'port=' . $conf[ 'port' ] . ';' . 'dbname=' . $conf[ 'db' ]
                    , $conf[ 'username' ]
                    , $conf[ 'password' ]
                    , array( PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )
                );
            } else exit( 'Invalid config: ' . $conf . PHP_EOL );
        } catch( \Exception $e ) {
        }
    }

    private function getConfigs( $config )
    {
        switch( $config ) {
        case AutoImportSqlConst::MYSQL:
            if( file_exists( $configFile = $this->configFile( AutoImportSqlConst::MYSQL ) ) ) {
                return require_once( $configFile );
            };
            break;
        case AutoImportSqlConst::MONGODB:
            if( file_exists( $configFile = $this->configFile( AutoImportSqlConst::MONGODB ) ) ) {
                return require_once( $configFile );
            }
            break;
        case AutoImportSqlConst::PGSQL:
            if( file_exists( $configFile = $this->configFile( AutoImportSqlConst::PGSQL ) ) ) {
                return require_once( $configFile );
            }
            break;
        case AutoImportSqlConst::SQLITE:
            if( file_exists( $configFile = $this->configFile( AutoImportSqlConst::SQLITE ) ) ) {
                return require_once( $configFile );
            }
            break;
        default:
            return false;
        }
    }

    /**
     * @return string
     */
    private function configFile( $config )
    {
        return dirname( __FILE__ ) . '/configs/database/' . $config . '.php';
    }
}