<?php

    class CartController 
    {
        public static function index(){
            $cart_items = [];
            $total_price = 0;
            if(isset($_SESSION['cart'])){
                
                foreach ($_SESSION['cart'] as $id => $quantity) {
                    $product = Product::find($id);
                    $total_price += ($quantity * $product->price);
                    $cart_items[] = [
                        "product" => $product,
                        "quantity" => $quantity,
                        "price" => number_format($quantity * $product->price, 2, ",", " ")
                    ];
                }
            }

            $total_price = number_format($total_price, 2, ",", " ");

            include './view/cart/index.php';
        }

        public static function addProduct(){
            if(isset($_SESSION['cart'])){
                if(isset($_SESSION['cart'][$_GET['id']]))
                    $_SESSION['cart'][$_GET['id']] += $_GET['quantity'];
                else
                    $_SESSION['cart'][$_GET['id']] =  $_GET['quantity'];
                
            } else{
                $_SESSION['cart'] = [];
                $_SESSION['cart'][$_GET['id']] =  $_GET['quantity'];
            }

            header("Location: ./?action=catalog.product&id=".$_GET['id']);
        }

        public static function removeProduct(){
            unset($_SESSION["cart"][$_GET['id']]);
            header("Location: ./?action=cart.index");
        }

        public static function clear(){
            unset($_SESSION["cart"]);
            $_SESSION["cart"] = [];
            header("Location: ./?action=cart.index");
        }

        public static function orderProducts(){
            if(!isset($_SESSION['user_id'])){
                header("Location: ./?action=auth.loginForm");
            }
            else{

            $cart_items = [];
            $total_price = 0;
            if(isset($_SESSION['cart'])){
                
                foreach ($_SESSION['cart'] as $id => $quantity) {
                    $product = Product::find($id);
                    $total_price += ($quantity * $product->price);
                    $cart_items[] = [
                        "product" => $product,
                        "quantity" => $quantity,
                        "price" => $quantity * $product->price
                    ];
                }

                Order::create(1, date('Y-m-d H:i:s'),$total_price);

                $db = Database::getDB();
                $query = 'SELECT orderID FROM orders WHERE "customerID" = :customerID ORDER BY "orderDate" DESC';
                $statement = $db->prepare($query);
                $statement->bindValue(':customerID', intVal($_SESSION['user_id']));
                $statement->execute();
                $row = $statement->fetch();

                $orderID = $row[0][0];

                foreach ($cart_items as $item) {
                    OrderItem::create($orderID, $item["product"]->id, $item["product"]->price, $item["product"]->getDiscountAmount(), $item['quantity']);
                }
            }
            header("Location: ./?action=cart.clear");
        }
        }
    }

?>