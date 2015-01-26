# DropSMS versión 1.0

## Por:
* Chess - chesstrian@gmail.com
* DaPa  - dapanas@gmail.com


========== INSTALACIÓN ==========

* Colocar los archivos de la carpeta php en el directorio /var/lib/asterisk/agi-bin
* Dar permisos de ejecución (+x) a los archivos copiados
* Colocar asterisk como owner de los archivos copiados (chown)

* Copiar dropsms.conf en /etc/asterisk
* Agregar la linea "#include dropsms.conf" al principio del archivo extensions.conf ubicado en /etc/asterisk
* Recargar Dialplan (CLI> dialplan reload)

* Cargar la base de datos usando el archivo db_dropsms.sql

* Configurar las variables necesarias en el archivo config.inc.php
