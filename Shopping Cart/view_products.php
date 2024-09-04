<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product-Project</title>
    <!-- CSS files -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="header_body">
            <a href="index.php" class="logo">FineFlowers</a>
            <nav class="navbar">
                <a href="index.php">Add Products</a>
                <a href="view_product1.php">View Products</a>
                <a href="">Shopit</a>
            </nav>
            <a href="" class="cart"><i class="fas fa-cart-shopping"></i> <span><sup>2</sup></span></a>
        </div>
    </header>

    <!-- Container -->
    <div class="container">
        <section class="display_product">
            <!-- Display products table -->
            <?php 
            $display_product = mysqli_query($conn, "SELECT * FROM products");
            if(mysqli_num_rows($display_product) > 0) {
                echo "<table>
                        <thead>
                            <th>Sl No</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>";
                $num = 1;
                while($row = mysqli_fetch_assoc($display_product)) {
                    echo "<tr>
                            <td>$num</td>
                            <td><img src='images/{$row['image']}' alt='{$row['name']}'></td>
                            <td>{$row['name']}</td>
                            <td>{$row['price']}</td>
                            <td>
                                <form action='update.php' method='GET'>
                                    <input type='hidden' name='edit' value='{$row['id']}'>
                                    <button type='submit' class='update_product_btn'><i class='fas fa-edit'></i></button>
                                </form>
                                <a href='delete.php?delete={$row['id']}' class='delete_product_btn' onclick=\"return confirm('Are you sure you want to delete this product?');\">
                                    <i class='fas fa-trash'></i>
                                </a>
                            </td>
                        </tr>";
                    $num++;
                }
                echo "</tbody>
                    </table>";
            } else {
                echo "<div class='empty_text'>No Products Available</div>";
            }
            ?>
        </section>
    </div>
</body>
</html>
