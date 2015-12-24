# Proyecto Redes

## Archivos

1. config.php: configuracion de servidores (nombre servidor, login, puerto, etc). Puede cambiarse la configuracion a cualquier servidor.
2. ftp_ajax.php: archivo que recibe una peticion AJAX, con el archivo, para subirlo al servidor FTP.
3. ntp_ajax.php: recibe peticion AJAX y lo envia al servidor NTP para obtener la hora.
4. index.php: contiene la interfaz de usuario, y formulario.

## Caracteristicas

1. Logra implementar el protocolo FTP, subiendo archivos al servidor.
2. Puede configurarse con cualquier servidor. La aplicacion no depende de un servidor en especifico, puede usar servidores externos, etc (no solo localhost).
3. Usa AJAX
4. El tiempo se obtiene una vez cada cierto tiempo, y mientras tanto, se continua incrementando el tiempo con Javascript.