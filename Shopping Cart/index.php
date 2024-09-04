<?php include 'connect.php';
if(isset($_POST['add_product'])){
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_FILES['product_image']['name'];
    $product_image_temp_name=$_FILES['product_image']['tmp_name'];
    $product_image_folder='images/' .$product_image;

    $insert_query=mysqli_query($conn,"insert into products (name,price,image) values('$product_name','$product_price','$product_image')") or die("Insert query failed");
    if($insert_query)
    {
        move_uploaded_file(($product_image_temp_name), $product_image_folder);
       $display_message= "Product inserted successfully";

    }
    else{
        $display_message= "There is some error in inserting product";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart project</title>

    <!-- Link to Font Awesome CSS     integrity="sha512-SzlrxWUlpfuzQUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQlzvisanQ== " crossorigin="anonymous" referrerpolicy="no-referrer"/>
-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" >
    <!-- Link to your custom CSS file -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Link to Google Fonts (if required) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <style>
      /* Additional styles can be placed here if needed */
      /* It's recommended to keep most of the styles in an external CSS file */
    </style>
</head>
<body>
  <!-- Header Section -->
 <!-- <header class="header">
    <div class="header_body">
        <a href="index.php" class="logo">FineFlowers</a>
        <nav class="navbar">
          <a href="">Add Products</a>
          <a href="view">View Products</a>
          <a href="">Shopit</a>
       </nav>
       <a href="" class="cart"><i class="fas fa-cart-shopping"></i> <span><sup>2</sup></span></a>
    </div>
  </header>
-->

  <!-- Include header file if needed -->
  <?php include('header.php')?>
  <?php include('connect.php')?>

  <!-- Form Section -->
  <div class="container">
    <!-- message display-->
    <?php
    if(isset($display_message)){
        echo "<div class='display_message'>
        <span>$display_message</span>
        <i class='fas fa-times' onclick=\"this.parentElement.style.display='none';\"></i>
    </div>";
    }
?>
   
      <section>
          <h3 class="heading">Add Products</h3>
          <form action="" class="add_product" method="post" enctype="multipart/form-data">
              <input type="text" name="product_name" placeholder="Enter product name" class="input_fields" required>
              <input type="number"  name="product_price" min="0" placeholder="Enter product price" class="input_fields" required>
              <input type="file"  name="product_image" class="input_fields" required accept="image/png, image/jpg,image/jpeg">
              <input type="submit"  name="add_product" value="Add Product" class="submit_btn" required>
          </form>
      </section>
  </div>/

  <!-- JavaScript file -->
  <script src="js/script.js"></script>
</body>
</html>
