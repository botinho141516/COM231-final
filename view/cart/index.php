<main>
    
    <section style="width:100%;">
        <h1>Shopping Cart</h1>
        <table>
            <tr>
                <th colspan="2">Product</th>
                <th width="100px;">Unit Price</th>
                <th>Quantity</th>
                <th width="100px;">Price</th>
            </tr>
            <?php foreach ($cart_items as $item) : ?>
                <tr>
                    <td><img height="60px;" src="<?php echo $item['product']->getImagePath()?>" alt="<?php echo $product->getImageAltText()?>"></td>
                    <td><?php echo $item['product']->name ?></td>
                    <td>$<?php echo $item['product']->price ?></td>
                    <td><?php echo $item['quantity'] ?></td>
                    <td>$<?php echo $item['price'] ?></td>
                    <td><a href="?action=cart.remove_product&id=<?php echo $item['product']->id ?>">Remove Product</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th>Total Price:</th>
                <td>$ <?php echo $total_price ?></td>
            </tr>
        </table>
        <div style="margin-bottom:50px;">
            <a style="float:left;" href="?action=cart.clear"><button>Clear Shopping Cart</button></astayle>
            <a style="float:right;" href="?action=cart.order_products"><button>Order Products</button></a>
        </div>
        <div style="clear:both"></div>
        
    </section>
</main>