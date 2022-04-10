<?php 
    $file = '/etc/goldwatch/gw-dbconfig.json';
    $data = file_get_contents($file);
    $obj = json_decode($data);
    $hostname =  $obj[0]->hostname;
    $dbname = $obj[0]->dbname;
    $username = $obj[0]->username;
    $password = $obj[0]->password;


