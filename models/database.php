<?php 

class Conexion {

    static public function db()
    {

		$link = new PDO("mysql:host=localhost;dbname=db_konecta_developers","root","123456789");

		$link->exec("set names utf8");

		return $link;
    }

}