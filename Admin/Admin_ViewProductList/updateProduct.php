
<!DOCTYPE html>
<html>
    <head>
        <title>Update products</title>
        <link rel="Stylesheet" href="../Styles/UpdateProduct.css">
        <script src="./updateProduct.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.7.4/firebase.js "></script>
        <script src="../firebaseImgUpload.js"></script>
    </head>
    <body>
        <?php
            require '../config.php';
            //get the id of the product clicked
            $id = $_POST["Product_id"];
            echo $id;
            $sql = "SELECT * FROM Product WHERE Product_id = '$id'";
            $result = $con->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){

        ?>

            <div id="menu" align="left">
                <img src="../Images/admin.png" id="Profile">
                <hr>
                <ul>
                    <li><a href="../Admin_Dashboard/Dashboard.php">Dashboard</a></li><hr>
                    <li><a href="../Admin_AddNewProduct/addNewProduct.php">Add products</a></li><hr>
                    <li><a href="../Admin_ViewProductList/viewProductList.php">View products</a></li><hr>
                </ul>
            </div>
            <div>
                <h1 id="heading">Update products</h1><hr>
                <form method="post" action="./updateProductController.php">
                    <input type="hidden" name="id" value="<?php echo $row["Product_id"]; ?>">
                    <fieldset>
                        <label for="Name">Product Name</label><br>
                        <input name="Name" value="<?php echo $row["Product_name"]; ?>" type="text" placeholder="Enter product name"><br><br>
                        <label for="brand">Product brand</label><br>
                        <input name="brand" value="<?php echo $row["Brand"]; ?>" type="text" placeholder="Enter product brand"><br><br>
                        <label for="category">Product category</label><br>
                        <select name="category">
                            <option value="<?php echo $row["Category_id"] ?>"><?php echo $row["Category_id"] ?></option>
                            <?php 
                                require '../config.php';
                                $sql = "SELECT Category_id, Category_name FROM category";
                                $result = $con->query($sql);
                                if($result->num_rows > 0){
                                    while($rows = $result->fetch_assoc()){
                            ?>
                            <!-- show category name containing id -->
                            <option value="<?php echo $rows["Category_id"] ?>"><?php echo $rows["Category_name"] ?></option>               
                            <?php
                                }
                            }
                            else{
                                echo "Data not found";
                            } 
                            ?>
                        </select><br><br>
                        <label for="code">Product code</label><span class="space"></span>
                        <label for="quantity">Product quantity</label><br>
                        <input name="code" onchange="Code()" value="<?php echo $row["Code"]; ?>" type="text" placeholder="Code" class="smallInput"><span class="space2"></span>
                        <input name="quantity" value="<?php echo $row["Qty"]; ?>" type="text" placeholder="quantity" class="smallInput"><br><br>
                        <label for="colors">Colors available</label><br>
                        <select name="colors" class="select_2" multiple>
                            <option value="red">red</option>
                            <option value="green">green</option>
                            <option value="blue">blue</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Orange">Orange</option>
                        </select><br><br>
                        
                        <img style="width: 100px; height:100px;" src="<?php echo $row["ImageURL"]; ?>" /><br />
                        <textarea hidden name="imageURL" id="downloadableURL"><?php echo $row["ImageURL"]; ?></textarea>
                        <label for="images">Pictures</label><br>
                        <input type="file" id="content_image" onchange="uploadImage()" ><br><br>
                        
                        <label for="descript">Product description</label><br>
                        <textarea  name="descript"><?php echo $row["Product_description"]; ?></textarea><br><br>
                    
                        <label for="price">Product price</label><span class="space"></span>
                        <label for="discount">Discount</label><br>
                        <input name="price" value="<?php echo $row["price"]; ?>" type="text" placeholder="Rs." class="smallInput"><span class="space2"></span>
                        <input name="discount" type="text" placeholder="discount" class="smallInput"><br><br>
                        
                        <label for="ship">Shipping option</label><br>
                        <select name="ship">
                            <option value="foriegn">Overseas</option>
                            <option value="domestic">Domestic</option>
                        </select><br><br>
                        
                        <span id="btnSpace">
                        
                        <form action="./updateProductController.php" method="post"> 
                            <input type="hidden" name="Product_id" value = "<?php echo $row['Product_id'];?>">
                            <input type="button" value="Cancel" id="submitBtn" class="subBtn">                   
                            <input type="submit" name="Update" value="Update" class="subBtn" onchange="sub()">
                        </form>
                <?php

                        }
                    }
                    else{
                        echo "Data not found";
                    }

                ?>
    
                </span>
                </fieldset>
            </form>
        </div>
    </body>
</html>