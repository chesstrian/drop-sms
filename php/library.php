<?php

// Librería con funciones.

function sendsms($cellphone, $indicative, $text, $sender, $sms_user, $sms_pass) {
  $postUrl = "http://api2.infobip.com/api/sendsms/xml";
  $altUrl = "http://api.infobip.com/api/sendsms/xml";

  $xmlString =
  "<SMS>
    <authentification>
      <username>" . $sms_user . "</username>
      <password>" . $sms_pass . "</password>
    </authentification>
    <message>
      <sender>" . $sender . "</sender>
      <text>" . $text . "</text>
    </message>
    <recipients>
      <gsm>" . $indicative . $cellphone . "</gsm>
    </recipients>
  </SMS>";

  $fields = "XML=" . urlencode($xmlString);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $postUrl);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  $response = curl_exec($ch);
  
  $rspXML = new SimpleXMLElement($response);

  if ($rspXML->status == -5) { // Let's try another server
    curl_setopt($ch, CURLOPT_URL, $altUrl);
    $response = curl_exec($ch);
    $rspXML = SimpleXMLElement($response);
  }
  
  curl_close($ch);
  return $rspXML->status;
}
?>