<?php

require_once("../config.php");

error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 1);

date_default_timezone_set(ntp_config::$timezone);


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
    $datum = date("Y-m-d (D) H:i:s",$tmestamp - date("Z",$tmestamp)); /* incl time zone offset */
    $doy = (date("z",$tmestamp)+1);

    //echo "Time check from time server ",ntp_config::$server," : [<font color=\"red\">",$timevalue,"</font>]";
    //echo " (seconds since 1900-01-01 00:00.00).<br>\n";
    //echo "The current date and universal time is ",$datum," UTC. ";
    //echo "It is day ",$doy," of this year.<br>\n";
    //echo "The unix epoch time stamp is $tmestamp.<br>\n";
    echo $tmestamp;
    //echo "<p class=\"ntp_hora\">".date("H:i:s", $tmestamp)."</p><p class=\"ntp_fecha\">".date("d/m/Y", $tmestamp)."</p>";

}
else{
    echo "Unfortunately, the time server $timeserver could not be reached at this time. ";
}

?>