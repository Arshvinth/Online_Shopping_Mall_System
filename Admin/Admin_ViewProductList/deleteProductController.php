<?php

require '../config.php';
//checking whether admin clicked delete button
if(isset($_POST['btn_delete'])){
    
    $id = $_POST["Product_id"];
    $query = "DELETE FROM Product WHERE Product_id='$id'";
    $query_run = $con->query($query);

    //if the product deleted successfully refresh the page
    if($query_run){
        echo "<script>alert('Deleted successfully..')</script>";
        // echo "<center><b>Deleted</b></center>";
        header("location:./viewProductList.php");
    }
    else{
        echo "<script>alert('Product cannot be deleted')</script>";
    }
}

?>