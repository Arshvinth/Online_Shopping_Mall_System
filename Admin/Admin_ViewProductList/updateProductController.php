<?php
    require '../config.php';
    //get inputs from the form 
    $name = $_POST["Name"];
    $code = $_POST["code"];
    $category = $_POST["category"] ;
    $descrip = $_POST["descript"];
    $price = $_POST["price"];
    $Brand = $_POST["brand"];
    $Qty = $_POST["quantity"];
    $imageURL = $_POST["imageURL"];

    //get id of the clicked product
    $id = $_POST["Product_id"];
    echo $id;
    //update table in database according to updated input fields
    $sql = "UPDATE Product SET Product_name = '$name', Category_id = '$category', Product_description = '$descrip',  
            price = '$price', Code = '$code', Brand = '$Brand', Qty = '$Qty', ImageURL = '$imageURL' WHERE Product_id = '$id'";
    $result_run = $con->query($sql);

    //if updated successfully navigate to view products page
    if($result_run){
        header("location:./viewProductList.php");
        echo '<center><b>Updated</b></center>';
        echo "Updated";
        
    }
    else{
        echo "not updated";
    }
?>
