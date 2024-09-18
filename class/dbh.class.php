<?php

class Dbh{

    protected function connect(){
        try{
            // $server = "localhost";
            $username = "root";
            $password = "";
            // $database = "users";
            $dbh = new PDO('mysql:host=localhost;dbname=users',$username, $password);
            return $dbh

        }
        catch(PDOException $e){
            print "error! :" $e->getmessage(); . "</br>";
            die();
        }

            // $conn = mysqli_connect($server,$username,$password,$database);
            // if(!$conn){
            //     // echo "Connected";
            //     die("Error " + mysqli_connect_error());
            // }
    }


}


?>