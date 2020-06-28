<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css"
        href="./assets/css/main.css">
</head>

<!-- the body section -->
<body>
<header>
    <a href="./" >
        <h1>My Guitar Shop</h1>
    </a>
    <?php if(!isset($_SESSION['user_id'])){ ?>
        <a style="float:right;" href="?action=auth.loginForm">Login</a>
    <?php }?>
    <a style="float:right; margin-right:10px;" href="?action=cart.index">Shopping cart</a>
    <div style="clear:both;"></div>
</header>
