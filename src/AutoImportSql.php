<?php
/**
 * Created by PhpStorm.
 * User: vrigzlinuxmint13
 * Date: 9/12/15
 * Time: 7:59 AM
 */

namespace AutoImportSql;


use AutoImportSql\Interfaces\AutoImportSqlInterface;
use AutoImportSql\Traits\AutoImportSqlTrait;

class AutoImportSql extends AutoImportSqlDb implements AutoImportSqlInterface
{
    use AutoImportSqlTrait;

    public function __construct()
    {
        // TODO: Implement __construct() method.
    }


}