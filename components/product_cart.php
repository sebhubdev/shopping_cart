<div class="product_cart_module product_<?php echo $product_id; ?> cart_product_module">
    <picture class="img_container">
        <img src="<?php echo  $main_link; ?>assets/img/products/<?php echo $product_image; ?>" alt="<?php echo $product_image; ?>" draggable="false">
    </picture>
    <h2><?php echo $product_name; ?></h2>
    <input class="quant_<?php echo $product_id; ?> cart_input" data='{"product_id":"<?php echo $product_id; ?>","action":"change_quantity"}' type="number" value="<?php echo $cart_data['quant']; ?>">
    <div class="up_down_btns">
        <span class="up_btn btn cart_btn" data='{"product_id":"<?php echo $product_id; ?>","action":"increase"}'><?php include './assets/svg/up-arrow.svg'; ?></span>
        <span class="down_btn btn cart_btn" data='{"product_id":"<?php echo $product_id; ?>","action":"decrease"}'><?php include './assets/svg/up-arrow.svg'; ?></span>
    </div>
    <span class="delete btn cart_btn" data='{"product_id":"<?php echo $product_id; ?>","action":"remove_product"}'><?php include './assets/svg/trash.svg'; ?></span>
</div>