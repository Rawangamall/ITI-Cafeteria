
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("Core/dbConnection.php");


class Product{


    function selectALLProducts(){

        $conn = connectDb();
        
      
        $stmt = $conn->prepare("SELECT p.*, c.name as Cname FROM product p JOIN category c ON p.CategoryID = c.id ");
          
          $stmt->execute();
          $order= $stmt->fetchAll();
          
          return $order;
          $conn = null;

        }
     


     function orderProducts($id){
      $conn= connectDb();

      $stmt = $conn->prepare("SELECT product.name, product.image , order_product.quantity
      FROM product 
      INNER JOIN order_product ON order_product.product_id = product.id 
      WHERE order_product.order_id = $id;");

      $stmt->execute();
      $products = $stmt->fetchAll();  
      
      return $products;
        $conn = null;
  }
}
?>





















