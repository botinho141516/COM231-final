<?php

    class ProductController 
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
            
            include './view/products/index.php';
        }

        public static function create(){
            $categories = Category::all();
            include './view/products/create.php';
        }

        public static function store(){
            Product::create($_POST['category_id'],$_POST['code'],$_POST['name'],$_POST['price']);
            header("Location: ./?action=product.index");
        }

        public static function delete(){
            $product = Product::find($_GET['id']);
            $product->delete();
            header("Location: ./?action=product.index");
        }

    }

?>