<?php

$config = array();

// Crendeciales de la BD
$config['db']['host'] = ""; // Servidor
$config['db']['user'] = ""; // Usuario
$config['db']['pass'] = ""; // Contraseña
$config['db']['name'] = "db_dropsms"; // Base de Datos

// Configuración de mensajes de error
$config['error_msg']['email'] = "chesstrian@gmail.com";

$config['error_msg'][-1]['subject'] = "Error de autenticación";
$config['error_msg'][-1]['message'] = "Nombre de usuario o contraseña incorrectos para el ingreso a Infobip.";

$config['error_msg'][-2]['subject'] = "Error de XML";
$config['error_msg'][-2]['message'] = "Formato incorrecto de XML.";

$config['error_msg'][-3]['subject'] = "Error de crédito";
$config['error_msg'][-3]['message'] = "No hay crédito suficiente en la cuenta.";

$config['error_msg'][-4]['subject'] = "Error de destinatario";
$config['error_msg'][-4]['message'] = "Destinatario invalido.";

$config['error_msg'][-5]['subject'] = "Error del servidor remoto";
$config['error_msg'][-5]['message'] = "Error al procesar la petición por parte del servidor remoto.";

// Configuración InfoBip (SMS)
$config['sms']['user'] = "nethexa";
$config['sms']['pass'] = "nethexa";
$config['sms']['indicative'] = "57"; // Indicativo de Colombia
?>
