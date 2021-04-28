<link rel="stylesheet" href="<?php echo  $main_link; ?>css/product_cart.css">
<header id="header">
<h1> Shopping cart</h1>
<a class="back_btn" href="<?php echo  $main_link; ?>products/"><?php include './assets/svg/up-arrow.svg'; ?></a>
<span class="cart_reset cart_btn" data='{"action":"cart_reset"}'>Reset cart</span>
</header>
<section id="cart_container">
        <div class="products">
            <?php
                foreach ($_SESSION['cart']['products'] as $product_id => $cart_data) 
                {                                        
                        $sql=$db->query("SELECT * FROM products where product_id='$product_id'");
                        while($product_data=$sql->fetch_assoc())
                        {
                            extract($product_data);
                            include './components/product_cart.php'; 
                        }                        
                }
            ?>
        </div>
</section>

<span class="clear"></span>
<?php include './components/summary.php'; ?>
<div id="btn_cart_mobile">       
    <span class="counter_cart_btn"><?php echo $_SESSION['cart']['total_quant']; ?></span>
    <div class="cart_icon">
        <?php include './assets/svg/cart.svg'; ?>
    </div>
    <p>Total : </p>
    <p class="total_cart_price">$ <?php echo $_SESSION['cart']['total']; ?>.-</p>
    <a class="button" href="">Checkout</a>
</div>