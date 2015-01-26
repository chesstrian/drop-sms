#!/usr/bin/php -q

<?php
include "config.inc.php";

$link = mysql_connect($config['db']['host'], $config['db']['user'], $config['db']['pass']);
mysql_select_db($config['db']['name']);

$cellphone = $argv[1];

if(!ereg("^3[0-2][0-9][2-9][0-9][0-9][0-9][0-9][0-9][0-9]$", $cellphone)) {
  echo "SET VARIABLE sent \"1\"";
  exit;
}

$sql = "SELECT * FROM sms_log WHERE celphone_number = '" . $cellphone . "' AND date LIKE '" . date('Y-m-d') . "%'";
echo $sql . "\n";
$res = mysql_query($sql);

if ($row = mysql_fetch_object($res))
  echo "SET VARIABLE sent \"1\"";
else
  echo "SET VARIABLE sent \"0\"";

mysql_close($link);
?>
