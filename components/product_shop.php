<?php $_SESSION['cart']['products'][$product_id] ? $added="product_added" : $added=''; ?>
<div id="product_shop_module_<?php echo $product_id; ?>" class="product_shop_module <?php echo $added; ?>">
    <div class="added">
        <?php include './assets/svg/added.svg'; ?>
    </div>
    <picture class="img_container">
        <img src="<?php echo $main_link; ?>assets/img/products/<?php echo $product_image; ?>" alt="<?php echo ucfirst($product_image); ?>">
    </picture>
    <div class="product_details">
        <h2><?php echo ucfirst($product_name); ?></h2>
        <p>€ <?php echo $product_price; ?>.-</p>
    </div>
    <div class="form_add_product">        
        <form onsubmit="return false;">
            <input id="product_add_input_<?php echo $product_id; ?>" class='cart_input' data='{"product_id":"<?php echo $product_id; ?>","action":"add"}' type="text" value="1">
        </form>
        <button class="cart_btn" data='{"product_id":"<?php echo $product_id; ?>","action":"add"}'>Add to cart</button>
    </div>
</div>