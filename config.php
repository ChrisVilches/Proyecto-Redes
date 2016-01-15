<?php

	class ftp_config{

		public static $server = "127.0.0.1";
		public static $port = 21;
		public static $username = "daemon";
		public static $password = "xampp";

	}

	class ntp_config{

		public static $server = "1.south-america.pool.ntp.org";
		public static $port = 123;
		public static $timezone = "Chile/Continental";	// Esto es valido en PHP

	}

	class smtp_config{

		public static $server = "127.0.0.1";
		public static $port = 25;	// Para no ocupar puerto, dejarlo como string vacia ""
		public static $word_wrap = 50;

	}

?>