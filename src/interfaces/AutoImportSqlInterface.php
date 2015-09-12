<?php
/**
 * Created by PhpStorm.
 * User: vrigzlinuxmint13
 * Date: 9/12/15
 * Time: 8:04 AM
 */

namespace AutoImportSql\Interfaces;


interface AutoImportSqlInterface
{
    public function __construct();

    public function import($db = array());

    public function export($db = array());

    public function drop($db = array());
}