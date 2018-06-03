<?php

$ROOT = realpath(dirname(__FILE__));

defined("TEMPLATES_PATH") or
define("TEMPLATES_PATH", $ROOT . "/templates");

defined("SQL_PATH") or
define("SQL_PATH", $ROOT . "/sql");

$config = array(

    "db" => array(
        "dbname"    => "stupiddb",
        "username"  => "stupidadmin",
        "password"  => "stupidpwd",
        "host"      => "localhost"
    )

);

?>
