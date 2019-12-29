<?php

function db_connect() {
// This function contains statements that connects to the mysql database
   $servername = '127.0.0.1';
   $username = 'root';
   $password = 'password';
   $dbname = 'computer_parts';

   $result = new mysqli($servername, $username , $password, $dbname);
   if (!$result) {
      return false;
   }
   $result->autocommit(TRUE);
   return $result;
}

function db_result_to_array($result) {
// This function turns a database query into a PHP array
   $res_array = array();

   for ($count=0; $row = $result->fetch_assoc(); $count++) {
     $res_array[$count] = $row;
   }

   return $res_array;
}

?>
