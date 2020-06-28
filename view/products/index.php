<main>
    <h1>Product List</h1>
    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <nav>
        <ul>
        <?php foreach ($categories as $category) : ?>
            <li>
            <a href="?action=product.index&category_id=<?php echo $category->id; ?>">
                <?php echo $category->name; ?>
            </a>
            </li>
        <?php endforeach; ?>
        </ul>
        </nav>
    </aside>
    <section>
        <!-- display a table of products -->
        <h2><?php echo $current_category->name; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th class="right">Price</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product->code; ?></td>
                <td><?php echo $product->name; ?></td>
                <td class="right"><?php echo $product->getFormattedPrice(); ?>
                </td>
                <td><form action="." method="get"
                          id="delete_product_form">
                    <input type="hidden" name="action"
                           value="product.delete">
                    <input type="hidden" name="id"
                           value="<?php echo $product->id; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>
