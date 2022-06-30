<?php
/*
$host= "us-cdbr-east-05.cleardb.net";
$user = "b05a4271466144";
$pwd = "76bbb149";
$database = "heroku_41029b0e9a222e3";
*/

$host= "localhost";
$user = "root";
$pwd = "Qwer@1234";
$database = "connect_pet";


/**
 * heroku access:
 * mysql://b05a4271466144:76bbb149@us-cdbr-east-05.cleardb.net/heroku_41029b0e9a222e3?reconnect=true
 * 
* user: b05a4271466144
* pwd: 76bbb149
* host: us-cdbr-east-05.cleardb.net
* database: heroku_41029b0e9a222e3
 */
	$connection = new mysqli($host,$user,$pwd,$database) or die ("YOU SHALL NOT PASS!!");
