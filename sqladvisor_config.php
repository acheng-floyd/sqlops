<?php
	
  $remote_user="root";   
  $remote_password="123456";   
  $connection = ssh2_connect('127.0.0.1',22);  
  $script='/usr/bin/sqladvisor -h '.$ip.' -u '.$user.' -p '.$pwd.' -P '.$port.' -d '.$db.' -q "'.$multi_sql[$x].'"'; 
  ssh2_auth_password($connection,$remote_user,$remote_password);
  $stream = ssh2_exec($connection,$script);
  $errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);
  stream_set_blocking($errorStream, true);
  $message=stream_get_contents($errorStream);

?>
