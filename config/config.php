<?php 
      
      if (!isset($_SERVER['HTTP_REFERER']) || empty($_SERVER['HTTP_REFERER'])) {
        
        header('Location: http://localhost/FINAL-COMPUTER-SHOP-PROJECT/CODE/index.php');
        exit;
    }
    

      
    try {
        
        
        if (!defined('HOST')) define("HOST", "localhost");

       
        if (!defined('DBNAME')) define("DBNAME", "bytebridge");

        
        if (!defined('USER')) define("USER", "root");

      
        if (!defined('PASS')) define("PASS", "");


        $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";", USER, PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       

    } catch (PDOException $e) {
        echo $e->getMessage();
    }