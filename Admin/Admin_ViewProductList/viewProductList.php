<!-- PHP CODE TO FETCH DATA FROM ROWS -->
<?php 
    require '../config.php';
    //select all data from product table
    $sql = "SELECT * FROM Product ";
    $result = $con->query($sql);

    $con->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>View products</title>
    <link rel="Stylesheet" href="../Styles/View_product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div id="menu" align="left">
        <img src="../Images/admin.png" id="Profile">
        <hr>
        <ul>
            <li><a href="../Admin_Dashboard/Dashboard.php">Dashboard</a></li>
            <hr>
            <li><a href="../Admin_AddNewProduct/addNewProduct.php">Add products</a></li>
            <hr>
            <li><a href="./viewProductList.php">View products</a></li>
            <hr>
        </ul>
    </div>
    <div>
        <h1 align="center">View products</h1>
        <hr>
        <div align="center">
            <table>
                <tr>
                    <th>View</th>
                    <th>Product code</th>
                    <th>Product name</th>
                    <th>Product category</th>
                    <th>Product brand</th>
                    <th>action</th>
                </tr>
                <?php
                        while($row = $result->fetch_assoc())
                        {
                ?>
                <tr>
                    <td>
                        <!-- Navigate admin to product details page after clicking view button -->
                        <form action="../Admin_ViewOneProduct/viewProductDetail.php" method="post"> 
                            <input type="hidden" name="Product_id" value = "<?php echo $row['Product_id'];?>">                   
                            <button name="View"><i class="fa fa-eye"></i></button>
                        </form>
                    </td>
                    <td><?php echo $row["Product_id"] . "<br/>" ; ?></td>
                    <td><?php echo $row["Product_name"] . "<br/>" ; ?></td>
                    <td><?php echo $row["Category_id"] . "<br/>" ; ?></td>
                    <td><?php echo $row["Brand"] . "<br/>" ; ?></td>
                    <td>
                        <!-- Navigate admin to update product page after clicking update button -->
                        <form action="./updateProduct.php" method="post"> 
                            <input type="hidden" name="Product_id" value = "<?php echo $row['Product_id'];?>">                   
                            <button class="btn" name="Update"><i class="fa fa-edit"></i></button>
                        </form><br>
                        <!-- refresh same page after clicking delete button -->
                        <form action="./deleteProductController.php" method="POST">
                            <input type="hidden" name="Product_id" value="<?php echo $row['Product_id']; ?>">
                            <button class="btn" name="btn_delete" class="delBtn"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php
                        }
                ?>
                </tr>
                <tr></tr>
            </table>
        </div>

    </div>
</body>

</html>