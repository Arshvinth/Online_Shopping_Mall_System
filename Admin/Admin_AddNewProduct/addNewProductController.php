<?php

    //include config file
    require '../config.php';
    //get input values from form
    $name = "'" . $_POST["Name"] . "'";
    $code = "'" . $_POST["code"] . "'";
    $category = "'" . $_POST["category"] . "'";
    $descrip = "'" . $_POST["descript"] . "'";
    $price = "'" . $_POST["price"]. "'";
    $Brand = "'" .$_POST["brand"]. "'";
    $qty = "'" .$_POST["quantity"]. "'";
    $imageURL = "'" . $_POST["imageURL"] . "'";

    echo "ImageURL" . $imageURL;
    //Get the product Id as single record
    $getsql = "SELECT id FROM Product ORDER BY id DESC LIMIT 1;";
    $result = $con->query($getsql);

    $row = $result -> fetch_assoc();
    $productID = $row["id"];
    
    //auto increment product id by 1
    $productNum = $productID + 1;
    $new_primaryKey = "'" . 'P' . $productNum . "'";

    //Insert new product to database
    echo $new_primaryKey . " = " . $name . " = " . $category . " = " . $descrip . " = " . $price . "=" . $code . "=" . $Brand. "=" . $qty . "=" . $imageURL;
    $sql = "INSERT INTO product(Product_id , Product_name , Category_id, Product_description, price, Code, Brand, Qty, ImageURL)
            VALUES($new_primaryKey, $name, $category, $descrip, $price, $code, $Brand, $qty, $imageURL);";
    //check connection
    if($con->query($sql)){
        echo "<script>alert('Record inserted')</script>";
        header("location:../Admin_ViewProductList/viewProductList.php");
    }
    else{
        echo "<script>alert('Error')</script>";
    }
    //close connection
    $con->close();
?>