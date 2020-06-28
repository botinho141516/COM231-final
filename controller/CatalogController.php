<?php

    class CatalogController 
    {
        public static function index(){
            $categories = Category::all();
            $current_category = null;
            if(isset($_GET['category_id'])){
                $current_category = Category::find($_GET['category_id']);
            }
            if($current_category==null){
                $current_category = $categories[0];
            }
            $products = Product::allByCategory($current_category->id);
            include './view/catalog/index.php';
        }

        public static function showProduct(){
            $categories = Category::all();
            $product = Product::find($_GET['id']);
            include './view/catalog/product.php';
        }

    }

?>