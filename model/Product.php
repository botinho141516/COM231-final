<?php

class Product
{
    public  $id,
            $category_id,
            $code,
            $name,
            $price;

    private function __construct($id, $category_id, $code, $name, $price){
        $this->id = $id;
        $this->category_id = $category_id;
        $this->code =  $code;
        $this->name = $name;
        $this->price = floatval($price);

        return $this;
    }
    
    public static function find($id)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products
                  WHERE productID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
    
        $product = new Product($row[0], $row[1], $row[2], $row[3], $row[4]);
        return $product;
    }

    public static function all()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products
        ORDER BY productID';
        $statement = $db->prepare($query);
        $statement->execute();
        $products = array();
        foreach ($statement as $row) {
            
            $product = new Product($row[0], $row[1], $row[2], $row[3], $row[4]);
            $products[] = $product;
        }
        return $products;
    }

    public static function allByCategory($category_id)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM products
        WHERE categoryID = :id ORDER BY productID ';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $category_id);
        $statement->execute();
        $products = array();
        foreach ($statement as $row) {
            
            $product = new Product($row[0], $row[1], $row[2], $row[3], $row[4]);
            $products[] = $product;
        }
        return $products;
    }



    public static function create($category_id, $code, $name, $price){
        $db = Database::getDB();
        $query = 'INSERT INTO products
                     (categoryID, productCode, productName, listPrice)
                  VALUES
                     (:category_id, :code, :name, :price)';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', intVal($category_id));
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', floatval($price));
        $statement->execute();
        $statement->closeCursor();
    }

    public function delete(){
        $db = Database::getDB();
        $query = 'DELETE FROM products WHERE productID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $this->id);
        $statement->execute();
        $statement->closeCursor();
    }

    public function getFormattedPrice(){
        return number_format($this->price,2,","," ");
    }


    public function getDiscountPercent() {
        $discount_percent = 30;
        return $discount_percent;
    }

    public function getDiscountAmount() {
        $discount_percent = $this->getDiscountPercent() / 100;
        $discount_amount = $this->price * $discount_percent;
        $discount_amount_r = round($discount_amount, 2);
        $discount_amount_f = number_format($discount_amount_r, 2);
        return $discount_amount_f;
    }

    public function getDiscountPrice() {
        $discount_price = $this->price - $this->getDiscountAmount();
        return number_format($discount_price,2,","," ");
    }

    public function getImageFilename() {
        $image_filename = $this->code . '.png';
        return $image_filename;
    }

    public function getImagePath() {
        $image_path = './assets/img/' . $this->getImageFilename();
        return $image_path;
    }

    public function getImageAltText() {
        $image_alt = 'Image: ' . $this->getImageFilename();
        return $image_alt;
    }

}
