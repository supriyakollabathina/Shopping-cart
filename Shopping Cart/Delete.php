<!-- delete logic-->


<!-- php code-->
<?php
include'connect.php';
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn,"Delete from products where id=$delete_id") or die("Query failed");
    if($delete_query){
        echo "Product deleted";
        
    }
    else{
        echo 'Product not deleted';
        header('location:view_product.php');
    }


}
?>