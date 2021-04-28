<?php
        session_start();
        $main_link=str_replace('index.php','',$_SERVER['PHP_SELF']);
        $page= $_GET['page']!='' ? str_replace('/','',$_GET['page']) : 'products';
        require_once './config/db_config.php';  
        require_once './install/check_install.php';   
?>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo  $main_link; ?>assets/img/favicon.png" type="image/png">
        <link rel="stylesheet" href="<?php echo  $main_link; ?>css/main.css">
        <link rel="stylesheet" href="<?php echo  $main_link; ?>css/summary.css">
        <script type="module" src="<?php echo  $main_link; ?>index.js"></script>
        <title>Shopping cart</title>
        <script>
            mainLink='<?php echo $main_link; ?>';
        </script>
</head>
<body>
    <main id=main_container>
        <?php include './view/'.$page.'.php'; ?>
    </main>
    <div id="main_loader">
        <?php include './assets/svg/loader.svg'; ?>
    </div>
</body>
</html>
