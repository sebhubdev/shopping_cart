<?php
        if ($db->connect_error) 
        {
                require_once 'install/index.php';
                die('Something was wrong');
        }
        if(!$db->query("SELECT id FROM products limit 1"))
        {
                require_once 'install/table_creator.php';
        }

        if(!isset($_SESSION['cart']))
        {
                $_SESSION['cart']['total_quant']=0;
                $_SESSION['cart']['total']=number_format(0,2);
        }
?>