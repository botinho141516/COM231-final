<?php 

class OrderItem{


    public static function create($orderID, $productID, $itemPrice, $discountAmount, $quantity){
        $db = Database::getDB();
        $query = 'INSERT INTO orderItems
                     (orderID, productID,  itemPrice, discountAmount, quantity)
                  VALUES
                     (:orderID, :productID,  :itemPrice, :discountAmount, :quantity)';
        $statement = $db->prepare($query);
        $statement->bindValue(':orderID', $orderID);
        $statement->bindValue(':productID', $productID);
        $statement->bindValue(':itemPrice', $itemPrice);
        $statement->bindValue(':discountAmount', $discountAmount);
        $statement->bindValue(':quantity', $quantity);
        $statement->execute();
        $statement->closeCursor();
    }



}