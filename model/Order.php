<?php

class Order{

    public  $id,
            $customer_id,
            $orderDate,
            $totalAmount;


    public function __construct($id, $customer_id, $orderDate, $totalAmount){
        $this->id = $id;
        $this->name =  $name;
        $this->orderDate =  $orderDate;
        $this->totalAmount =  $totalAmount;
        return $this;
    }

    public static function find($id){


    }

    public static function create($user_id, $date, $total_price){

        $db = Database::getDB();
        $query = 'INSERT INTO orders
                     ("customerID", "orderDate", "totalAmount")
                  VALUES
                     (:customerID, :orderDate, :totalAmount)';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerID', $user_id);
        $statement->bindValue(':orderDate', $date);
        $statement->bindValue(':totalAmount', floatval($total_price));
        $statement->execute();
        $statement->closeCursor();

    }

    public function order_items(){

    }
}