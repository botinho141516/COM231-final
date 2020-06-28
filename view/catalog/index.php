<main>
    <aside>
        <h1>Categories</h1>
        <nav>
        <ul>
        <!-- display links for all categories -->            
        <?php foreach ($categories as $category) : ?>
            <li>
                <a href="?action=catalog.index&category_id=<?php echo $category->id; ?>">
                    <?php echo $category->name; ?>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
        </nav>
    </aside>
    <section>
        <h1><?php echo $current_category->name; ?></h1>
        <nav>
        <ul>
            <?php foreach ($products as $product) : ?>
            <li>
                <a href="?action=catalog.product&id=<?php
                          echo $product->id; ?>">
                    <?php echo $product->name; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>
    </section>
</main>