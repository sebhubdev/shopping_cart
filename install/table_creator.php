<?php

$sql="CREATE TABLE IF NOT EXISTS products (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id VARCHAR(20) NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    product_image VARCHAR(100) NOT NULL,
    product_price DECIMAL(10,2) NOT NULL
    )" ;        
$sql=$db->query($sql);

require_once 'install/products.php';

foreach ($products as $key => $product) 
{
    $fields='';
    $values='';
    foreach ($product as $field => $value) 
    {
        $fields.=$field.',';
        $values.='\''.$value.'\',';
    }
    $fields=trim($fields,',');
    $values=trim($values,',');
    $db->query("INSERT INTO products ($fields) values ($values)");
}



?>