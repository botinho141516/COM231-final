<?php


class Controller{

    public static function router(){
        if (isset($_GET['action']) && $_GET['action']==="product.index"){
            ProductController::index();
        }

        else if (isset($_GET['action']) && $_GET['action']==="product.create"){
            ProductController::create();
        }

        else if (isset($_GET['action']) && $_GET['action']==="product.store"){
            ProductController::store();
        }

        else if (isset($_GET['action']) && $_GET['action']==="product.delete"){
            ProductController::delete();
        }

        else if (isset($_GET['action']) && $_GET['action']==="catalog.index"){
            CatalogController::index();
        }

        else if (isset($_GET['action']) && $_GET['action']==="catalog.product"){
            CatalogController::showProduct();
        }

        else if (isset($_GET['action']) && $_GET['action']==="cart.index"){
            CartController::index();
        }

        else if (isset($_GET['action']) && $_GET['action']==="cart.add_product"){
            CartController::addProduct();
        }

        else if (isset($_GET['action']) && $_GET['action']==="cart.remove_product"){
            CartController::removeProduct();
        }

        else if (isset($_GET['action']) && $_GET['action']==="cart.clear"){
            CartController::clear();
        }

        else if (isset($_GET['action']) && $_GET['action']==="cart.order_products"){
            CartController::orderProducts();
        }

        else if (isset($_GET['action']) && $_GET['action']==="auth.loginForm"){
            AuthController::loginForm();
        }

        else if (isset($_GET['action']) && $_GET['action']==="auth.login"){
            AuthController::login();
        }

        else if (isset($_GET['action']) && $_GET['action']==="auth.logout"){
            AuthController::logout();
        }

        else{

            include './view/index.php';
        }
    }

}
?>