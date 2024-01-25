<?php

Class Database {
    private $con;

    public function __construct() {
        $this->con = $this->connect();
    }

    private function connect(){
        $string = "mysql:host=localhost:3308;dbname=mychat_db";
        try{
            $connection = new PDO($string, DBUSER, DBPASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }catch(PDOException $e){
            echo $e->getMessage();
            die;
        }
        return false;
    }

    public function write ($query, $data_array = []){
        try{
        $con = $this->connect();

        $statement = $con->prepare($query);
        
         
        $check = $statement->execute($data_array);
        }
        catch(PDO $err){
            echo $err->getMessage();
        }
        if($check){
            return true;
        }
        return false;
    }

    public function generate_id($max){
        $rand = "";
        $rand_count = rand(4, $max);

        for($i=0; $i< $rand_count; $i++){
            $r = rand(0,9);

            $rand .= $r;
        }

        return $rand;
    }
}