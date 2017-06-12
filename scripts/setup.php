<?php

//Drupal silent install - Creates the admin account


if ($db=mysql_connect('localhost:3306','bn_drupal','808a9aebf2')) {

	mysql_select_db('bitnami_drupal7',$db);
	mysql_query("insert into users (uid, name, pass, mail, status, created) values (1, '@@BITROCK_USER@@', md5('@@BITROCK_PASSWD@@'), '@@BITROCK_MAIL@@', 1, unix_timestamp())");
	mysql_query("insert into sequences (name, id) values ('users_uid', 1)");
	mysql_close($db);
}
else {
	die('Connection failed. Make sure that the database server is running.');	
}
?>
