<?php

//Drupal silent install - Creates the admin account


if ($db=mysql_connect('localhost:3306','bn_drupal','808a9aebf2')) {

	mysql_select_db('bitnami_drupal7',$db);
	mysql_query("update users set name='@@BITROCK_USER@@', pass='@@BITROCK_MD5PASSWD@@', mail='@@BITROCK_MAIL@@', init='@@BITROCK_MAIL@@', status=1 where uid=1");
	mysql_query("UPDATE system SET status = '1', schema_version = '0' WHERE CONVERT( system.filename USING utf8 ) = 'modules/update/update.module' LIMIT 1");
	mysql_query("CREATE TABLE IF NOT EXISTS cache_update (cid varchar(255) NOT NULL default '', data longblob, expire int(11) NOT NULL default '0', created int(11) NOT NULL default '0', headers text, serialized smallint(6) NOT NULL default '0', PRIMARY KEY  (cid), KEY expire (expire)) ENGINE=InnoDB DEFAULT CHARSET=utf8");
	mysql_close($db);
}
else {
	die('Connection failed. Make sure that the database server is running.');	
}
?>
