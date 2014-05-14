<?php
	function fConnect () {
		$vHost="tuxa.sme.utc";
		$vPort="5432";
		$vDbname="dbnf17p096";
		$vUser="nf17p096";
		$vPassword="tAaK4Pbp";
		$vConn = pg_connect("host=$vHost port=$vPort dbname=$vDbname user=$vUser password=$vPassword");
		return $vConn;
	}
?>
