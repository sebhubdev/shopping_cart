<link rel="stylesheet" href="<?php echo  $main_link; ?>css/product_shop.css">
<header id="header">
<h1>Products</h1>
<a href="<?php echo  $main_link; ?>cart/">
    <div class="cart_button">
        <?php include './assets/svg/cart.svg'; ?>
        <span class="counter_cart_btn"><?php echo $_SESSION['cart']['total_quant']; ?></span>
    </div>    
</a>
</header>
<section id="products_container">
    <?php
        $sql=$db->query("SELECT * FROM products order by id desc");
        while($product_data=$sql->fetch_assoc())
        {
            extract($product_data);
            include './components/product_shop.php'; 
        }
    ?>
</section>
<div id="btn_cart_mobile">
    <span class="counter_cart_btn"><?php echo $_SESSION['cart']['total_quant']; ?></span>
    <div class="cart_icon">
        <?php include './assets/svg/cart.svg'; ?>
    </div>
    <p>Total : </p>
    <p class="total_cart_price">$ <?php echo $_SESSION['cart']['total']; ?>.-</p>
    <a class="button" href="<?php echo  $main_link; ?>cart/">Show Cart</a>
</div>
