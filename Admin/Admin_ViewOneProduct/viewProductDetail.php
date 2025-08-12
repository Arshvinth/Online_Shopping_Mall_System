<!DOCTYPE html>
<html>

<head>
    <title>Product details</title>
    <link rel="Stylesheet" href="../Styles/product_details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./viewProductDetail.js"></script>
</head>

<body>
        <?php
            require '../config.php';
            //get id after clicking particular product
            $id = $_POST["Product_id"];
            echo $id;
            //select column and row according to the id
            $sql = "SELECT * FROM Product WHERE Product_id = '$id'";
            $result = $con->query($sql);
            //fetch result from database
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){

        ?>
    <fieldset class="field">
        <table id="tableColMain">
            <tr>
                <td id="tableCol1">
                    <image id="BigImg" src=<?php echo $row['ImageURL'] ?>></image>
                    <image src="../Images/Img.png" id="smallImg"></image>
                    <image src="../Images/Img.png" id="smallImg"></image>
                    <image src="../Images/Img.png" id="smallImg"></image>
                    <image src="../Images/Img.png" id="smallImg"></image><br><br>
                
                    <center>
                        <label><b>Product price</b></label><br>
                        <label><?php echo $row["price"]; ?></label><br><br>
                    </center>
                </td>
                <td id="tableCol1">
                    <div id="colMargin">
                        <label><b>Product name</b></label><br>
                        <label><?php echo $row["Product_name"]; ?></label><br><br>
                        <label><b>Brand</b></label><br>
                        <label><?php echo $row["Brand"]; ?></label><br><br>
                        <label><b>Product description</b></label><br>
                        <label><?php echo $row["Product_description"]; ?></label><br><br>
                        <label><b>Colors available</b></label><br>
                        <table class="innerTable">
                            <tr>
                                <td>
                                    <div class="redCol"></div>
                                </td>
                                <td>
                                    <div class="greenCol"></div>
                                </td>
                                <td>
                                    <div class="blueCol"></div>
                                </td>
                                <td>
                                    <div class="OrangeCol"></div>
                                </td>
                            </tr>
                        </table><br><br>
                        <label><b>Sizes available</b></label><br>
                        <label>S</label><br>
                        <label>L</label><br>
                        <label>M</label><br><br>
                        <label><b>Product rating</b></label><br>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span><br><br><br>
                        <label><b>Product Quantity</b></label><br>
                        <label><?php echo $row["Qty"]; ?></label><br><br>
                        <label><b>Product category</b></label><br>
                        <label><?php echo  $row["Category_id"]; ?></label><br>
                    </div>

                </td>
            </tr>
        </table>
    </fieldset>
    <?php
            }
        }
        else{
            echo "Data not found";
        }

    ?>
</body>

</html>