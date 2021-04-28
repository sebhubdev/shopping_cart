<aside id="summary_container">
    <div class="summary">
            <div id="show_summary_btn">
                <div class="show_summary"></div>
                <span class="arrow_show_summary">
                    <?php include './assets/svg/simple-arrow.svg'; ?>
                </span>
            </div>
            <h2>Order summary</h2>
            <div id="products_detail">
                <h3>Products detail</h3>
                <div class="container">
                    <?php
                            foreach ($_SESSION['cart']['products'] as $product_id => $cart_data) 
                            {                                        
                                    $sql=$db->query("SELECT * FROM products where product_id='$product_id'");
                                    while($product_data=$sql->fetch_assoc())
                                    {
                                        extract($product_data);
                                        include './components/product_detail.php'; 
                                    }                        
                            }
                    ?>
                </div>                
            </div>
            <div class="totals_btn">
                <div class="sub_total value">
                    <p>Sub total</p>
                    <p class="total_cart_price">€ <?php echo $_SESSION['cart']['total']; ?>.-</p>
                </div>
                <div class="total value">
                    <p>Total</p>
                    <p class="total_cart_price">€ <?php echo $_SESSION['cart']['total']; ?>.-</p>
                </div>
                <button>Checkout</button>
            </div>            
    </div>
</aside>