<?php

/**
 * Create a PDO connection
 * @return PDO
 */
 
 
function connection() {
    //Loads config from file config.php
    require('config/config.php');
    
    //Db connection
    $connex = new PDO('mysql:host=' . HOST . ';dbname=' . DB,USER , PASSWORD);
    return $connex;
}


