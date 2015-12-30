<?php

require_once("../config.php");

error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 1);

date_default_timezone_set(ntp_config::$timezone);



function ntp_time($host, $port) {
  
  // Create a socket and connect to NTP server
  $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
  socket_connect($sock, $host, $port);
  
  // Send request
  $msg = "\010" . str_repeat("\0", 47);
  socket_send($sock, $msg, strlen($msg), 0);
  
  // Receive response and close socket
  socket_recv($sock, $recv, 48, MSG_WAITALL);
  socket_close($sock);

  // Interpret response
  $data = unpack('N12', $recv);
  $timestamp = sprintf('%u', $data[9]);
  
  // NTP is number of seconds since 0000 UT on 1 January 1900
  // Unix time is seconds since 0000 UT on 1 January 1970
  $timestamp -= 2208988800;
  
  return $timestamp;
}


echo ntp_time(ntp_config::$server, ntp_config::$port);



/*
function query_time_server ($timeserver, $socket, $timeout){
    $fp = fsockopen($timeserver,$socket,$err,$errstr,$timeout);
        # parameters: server, socket, error code, error text, timeout
    if($fp){
        fputs($fp, "\n");
        $timevalue = fread($fp, 49);        
    }
    else{
        $timevalue = " ";
    }

    fclose($fp); # close the connection

    $ret = array();
    $ret[] = $timevalue;
    $ret[] = $err;     # error code
    $ret[] = $errstr;  # error text
    return($ret);
}


$timercvd = query_time_server(ntp_config::$server, ntp_config::$socket, ntp_config::$timeout);

//if no error from query_time_server
if(!$timercvd[1]){
    $timevalue = bin2hex($timercvd[0]);
    $timevalue = abs(HexDec('7fffffff') - HexDec($timevalue) - HexDec('7fffffff'));
    $tmestamp = $timevalue - 2208988800; # convert to UNIX epoch time stamp
    $datum = date("Y-m-d (D) H:i:s",$tmestamp - date("Z",$tmestamp));
    $doy = (date("z",$tmestamp)+1);

    echo $tmestamp;
    

}
else{
    echo "Unfortunately, the time server $timeserver could not be reached at this time. ";
}
*/
?>