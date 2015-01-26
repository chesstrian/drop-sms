#!/usr/bin/php -q
<?php

include "library.php";
include "config.inc.php";

$link = mysql_connect($config['db']['host'], $config['db']['user'], $config['db']['pass']);
mysql_select_db($config['db']['name']);

$phone = $argv[1];

$act = "SELECT * FROM phone WHERE number = '" . $phone . "' AND active = 't'";
$res = mysql_query($act);

if ($row = mysql_fetch_object($res)) {
  $cellphone = $argv[2];

  $sql = "SELECT * FROM message WHERE id = '" . $row->message_id . "'";
  $text = mysql_fetch_object(mysql_query($sql));

  $response = sendsms($cellphone, $config['sms']['indicative'], $text->text, $row->sender, $config['sms']['user'], $config['sms']['pass']);

  if ($response <= -1 && $response >= -5) {
    mail($config['error_msg']['email'], $config['error_msg'][$response]['subject'], $config['error_msg'][$response]['message']);
  } else {
    $smslog = "INSERT INTO sms_log (date, phone_id, message_id, celphone_number ) VALUES (NOW(),'$row->id','$row->message_id','$cellphone')";
    mysql_query($smslog);
  }
}

mysql_close($link);
?>
