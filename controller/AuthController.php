<?php

class AuthController{

    
    public static function loginForm(){
        include './view/auth/login.php';
    }

    public static function login()
    {
        try {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $db = Database::getDB();
            $query = 'SELECT * FROM customers
                    WHERE emailAddress = :email AND password = :password';
            $statement = $db->prepare($query);
            $statement->bindValue(":email", $email);
            $statement->bindValue(":password", $password);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            foreach($row as $r) {
                echo $r[0];
            }
            if(isset($row[0][0])){
                $_SESSION['user_id'] = $row[0][0];
                $_SESSION['user_name'] = $row[0][3];
                echo"<script>alert('Conectado com sucesso!')</script>";
                // header("Location: ./");
            }
            else{
                echo"<script>alert('Email ou senha errados!')</script>";
                // header("Location: ./?action=auth.loginForm");
            }
        } catch (PDOException $e) {
            echo "<script>console.log(".$e.")</script>";
        }


    }

    public static function logout()
    {

    }

}