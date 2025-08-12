<html>
    <head>
        <link rel="Stylesheet" href="../Styles/Dashboard.css">
        <title>Admin dashboard</title>
    </head>
    <body>
        <div id="menu" align="left">
            <img src="../Images/admin.png" id="Profile">
            <hr>
            <ul>
                <li><a href="./Dashboard.php">Dashboard</a></li><hr>
               <li><a href="../Admin_AddNewProduct/addNewProduct.php">Add products</a></li><hr>
               <li><a href="../Admin_ViewProductList/viewProductList.php">View products</a></li><hr>
            </ul>
        </div>
        <div>
            <h1 id="center">Dashboard</h1><hr><br>
            <h2 id="left">Product overview</h2><br>
            <div class="container" align="center">
                <br>
                <table>
                    <tr>
                        <?php 
                            require '../config.php';
                            //get details from database
                            $sql = "SELECT Category_id, COUNT(Category_id) as 'TotalCount' FROM product GROUP BY Category_id";
                            $Pcount = "SELECT COUNT(Product_id) AS 'ProductCount' FROM product;";
                            $result = $con->query($sql);
                            //fetch details from database until last row
                            if($result->num_rows > 0){
                                while($rows = $result->fetch_assoc()){
                        ?>
                        <td>
                            <div class="innerh3" id="center">
                                <h3><b>Category :<?php echo $rows["Category_id"]?></b></h3>
                                <h1><?php echo $rows["TotalCount"]?></h1>
                                <h4>Items available</h4>
                            </div>
                        </td>                  
                        <?php
                            }
                        }
                        else{
                            echo "Data not found";
                        } 
                        ?>
                    </tr>
                </table>
        </div><br>
        <?php 
            require '../config.php';
            $Pcount = "SELECT COUNT(Product_id) AS 'ProductCount' FROM product;";
            $result = $con->query($Pcount);
            
            //fetch details from database until last record
            if($result->num_rows > 0){
                while($rows = $result->fetch_assoc()){
        ?>
        <h3 id="font1">Available product count :  <?php echo $rows["ProductCount"] ?></h3>
        <?php
            }
        }
        else{
            echo "Data not found";
        } 
        ?>
    </body>
</html>