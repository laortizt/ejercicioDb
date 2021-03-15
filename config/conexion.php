<?php

    $con=mysql_connect("localhost:3307", "root","");
    mysql_select_db("torneo",$con);
    mysql_query("SET NAME  'utf8'");

    // const SERVER="localhost:3307";
    // const DB="torneo";
    // const USER="root";
    // const PASS='';
    // const SGBD="mysql:host=".SERVER.";dbname=".DB;
