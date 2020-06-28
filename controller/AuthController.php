<?php

class AuthController{

    
    public static function loginForm(){
        include './view/auth/login.php';
    }

    public static function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $db = Database::getDB();
        $query = 'SELECT * FROM customers
                WHERE "emailAddress" = :email AND password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        if(isset($row[0])){
            $_SESSION['user_id'] = $row[0];
            $_SESSION['user_name'] = $row[3];
            echo"<script>alert('Conectado com sucesso!')</script>";
            // header("Location: ./");
        }
        else{
            echo"<script>alert('Email ou senha errados!')</script>";
            // header("Location: ./?action=auth.loginForm");
        }


    }

    public static function logout()
    {

    }

}