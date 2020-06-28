<main>
    <h1>Add Product</h1>
    <form action="?action=product.store" method="post" id="add_product_form">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category->id; ?>">
                <?php echo $category->name; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Code:</label>
        <input type="text" name="code">
        <br>

        <label>Name:</label>
        <input type="text" name="name">
        <br>

        <label>List Price:</label>
        <input type="text" name="price">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Product">
        <br>
    </form>
    <p><a href="?action=product.index">View Product List</a></p>
</main>