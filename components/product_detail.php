<div class="detail_module product_<?php echo $product_id; ?> cart_product_module">
    <p><?php echo $product_name; ?></p>
    <p class="quant_<?php echo $product_id; ?>"><?php echo $_SESSION['cart']['products'][$product_id]['quant']; ?></p>
    <p class="total_<?php echo $product_id; ?>">€ <?php echo number_format(($product_price*$_SESSION['cart']['products'][$product_id]['quant']),2); ?>.-</p>
</div>