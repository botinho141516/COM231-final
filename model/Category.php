<?php

class Category
{
    public  $id,
            $name;

    private function __construct($id, $name){
        $this->id = $id;
        $this->name =  $name;

        return $this;
    }
    
    public static function find($id)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM category WHERE "categoryID" = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
    
        $category = new Category($row[0], $row[1]);
        return $category;
    }

    public static function all()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM category
        ORDER BY "categoryID"';
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = array();
        foreach ($statement as $row) {
            $category = new Category($row[0], $row[1]);
            $categories[] = $category;
        }
        return $categories;
    }

}
