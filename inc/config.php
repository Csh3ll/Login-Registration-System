<?php 
    //ce ni konstante __CONFIG__, ne nalozi datoteke
    if(!defined('__CONFIG__')) {
        exit('You do not have a config file');
    }

    // Include the DB.php file;
	include_once "classes/DB.php";

	$con = DB::getConnection();


?>