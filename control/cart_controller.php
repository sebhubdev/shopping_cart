<?php
        session_start();
        $cart_edit=new CartEditor();
        eval('echo json_encode($cart_edit->'.$_POST['action'].'($_POST));');   
        class CartEditor
        {
                public function add($data) : array
                {            
                    extract($data);
                    $quant=$_SESSION['cart']['products'][$product_id]['quant']+$value;
                    $quant=$quant>=100 ? 100 : $quant;
                    $quant=$quant<=1 ? 1 : $quant;                 
                    $_SESSION['cart']['products'][$product_id]['quant']=$quant;
                    $this->cart_update();
                    return $_SESSION['cart'];                
                } 
                public function increase($data) : array
                {
                    extract($data);
                    $quant=$_SESSION['cart']['products'][$product_id]['quant']; 
                    $quant>=100 ? $quant=100 : $quant++;
                    $_SESSION['cart']['products'][$product_id]['quant']=$quant;
                    $this->cart_update();
                    return $_SESSION['cart'];
                }
                public function decrease($data) : array
                {            
                    extract($data);
                    $quant=$_SESSION['cart']['products'][$product_id]['quant']; 
                    $quant<=1 ? $quant=1 : $quant--;
                    $_SESSION['cart']['products'][$product_id]['quant']=$quant;
                    $this->cart_update();
                    return $_SESSION['cart'];                
                }
                public function change_quantity($data) : array
                {
                    extract($data);
                    $quant=$value>=100 ? 100 : $value;
                    $quant=$quant<=1 ? 1 : $quant;                
                    $_SESSION['cart']['products'][$product_id]['quant']=$quant;
                    $this->cart_update();
                    return $_SESSION['cart'];
                }
                public function remove_product($data) : array
                {                    
                    extract($data);
                    unset($_SESSION['cart']['products'][$product_id]); 
                    $this->cart_update();
                    return $_SESSION['cart'];            
                }
                public function cart_reset($data) : array
                {
                    unset($_SESSION['cart']);            
                    $_SESSION['cart']['total']=number_format(0,2);
                    $_SESSION['cart']['total_quant']=0;
                    return $_SESSION['cart'];
                }
                private function cart_update() : void
                {            
                        require_once '../config/db_config.php';
                        $total=0;
                        $total_quant=0;
                        foreach ($_SESSION['cart']['products'] as $key => $value) 
                        {                                        
                                $sql=$db->query("SELECT product_price FROM products where product_id='$key'");
                                $data=$sql->fetch_assoc();
                                $price=$data['product_price'];
                                $_SESSION['cart']['products'][$key]['price']=$price;
                                $_SESSION['cart']['products'][$key]['total']=number_format($_SESSION['cart']['products'][$key]['quant']*$price,2);  
                                $total+=$_SESSION['cart']['products'][$key]['quant']*$price; 
                                $total_quant+=$_SESSION['cart']['products'][$key]['quant']; 
                        }                
                        $_SESSION['cart']['total']=number_format($total,2);
                        $_SESSION['cart']['total_quant']=$total_quant;
                }
        }    
?>