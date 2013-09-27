<?php
//error_reporting(0);

$db=0;

if($db==0){
// local
	$host = "localhost";
	$userwd = "root"; //user
	$passwd = "12345"; //pass
	$dbname = "homex";
}else{
// Server
	$host = "localhost";
	$userwd = "admin_abcd"; //user
	$passwd = "*sql-abcd*"; //pass
	$dbname = "db_abcd";

}
mysql_connect($host,$userwd,$passwd) or die ("Not Connect MYSQL");

mysql_select_db($dbname) or die ("NOT Connect Database");
mysql_query("SET NAMES utf8");




?>
