# Proyecto Redes

## Archivos

1. config.php: configuracion de servidores (nombre servidor, login, puerto, etc). Puede cambiarse la configuracion a cualquier servidor.
2. ftp_ajax.php: archivo que recibe una peticion AJAX, con el archivo, para subirlo al servidor FTP.
3. ntp_ajax.php: recibe peticion AJAX y lo envia al servidor NTP para obtener la hora.
4. smtp_ajax.php: recibe el formulario a traves de AJAX, y lo manda por correo, utilizando la libreria PHPMailer.
5. index.php: contiene la interfaz de usuario, y formulario.

## Caracteristicas

1. Logra implementar el protocolo FTP, subiendo archivos al servidor.
2. Puede configurarse con cualquier servidor. La aplicacion no depende de un servidor en especifico, puede usar servidores externos, etc (no solo localhost).
3. Usa AJAX
4. El tiempo se obtiene una vez cada cierto tiempo, y mientras tanto, se continua incrementando el tiempo con Javascript.

## Configurar servidores

### FTP

Hay que dejar abierto un servidor FTP, y saber cual es el usuario, password, y servidor (ademas del puerto). Estos datos se colocan en el config de PHP. El nombre del servidor puede ser 127.0.0.1 (=localhost) o una IP externa, tambien puede ser con un nombre de dominio externo.

### NTP

Similar a FTP.

### SMTP (en construccion)

Similar a los anteriores, pero se debe crear usuarios para poder recibir y enviar correos.

Ademas, es posible que haya que seguir este tutorial http://tecadmin.net/setup-catch-all-email-account-in-postfix/, el cual explica sobre como configurar Postfix para que acepte cualquier correo, incluso si las direcciones estan mal escritas, o no existen.

Para mandar correos desde la misma consola, a postfix, se puede ejecutar el comando

```
echo "body of your email" | mail -s "This is a Subject" -a "From: usuario1@felo-All-Series" usuario2@felo-All-Series
```

Para leer los mails que llegaron al servidor, ejecutar el comando ```mailq``` y luego copiar una de las IDs, y ejecutar el comando ```sudo postcat -q 4BC3835EA00``` (en donde el numero grande es la ID copiada).