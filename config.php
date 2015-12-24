<?php

	class ftp_config{

		public static $server = "127.0.0.1";
		public static $port = 21;
		public static $username = "daemon";
		public static $password = "xampp";

	}

	class ntp_config{

		public static $server = "ntp.pads.ufrj.br";
		public static $socket = 37;
		public static $timeout = 5;
		public static $timezone = "Chile/Continental";	// Esto es valido en PHP

	}

?>