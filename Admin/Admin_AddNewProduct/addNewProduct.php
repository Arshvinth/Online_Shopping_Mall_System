<!DOCTYPE html>
<html>

<head>
    <title>Add products</title>
    <script src="./addNewProduct.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.7.4/firebase.js "></script>
    <script src="../firebaseImgUpload.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Ekreha shopping mall</span>
                    </a>
                    <img src="../Images/admin.png" id="Profile" style="width: 175px; height: 175px;">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="../Admin_Dashboard/Dashboard.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-white">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Admin_AddNewProduct/addNewProduct.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-white">Add products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../Admin_ViewProductList/viewProductList.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-white">View products</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>

            <div class="col py-3" style="padding-left: 50px; padding-right: 25px; padding-top: 20px; padding-bottom: 20px;">
                <h1 id="heading">Add products</h1>
                <hr>
                <form method="post" action="./addNewProductController.php">
                    <fieldset>
                        <div class="form-group">
                            <label for="Name">Product Name</label>
                            <input name="Name" type="text" class="form-control" type="text" placeholder="Enter product name"
                                id="Name" onchange="Name()" required>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="brand">Product brand</label>
                            <input name="brand" type="text" placeholder="Enter product brand" class="form-control"
                                required>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="category">Product category</label>
                            <select class="form-select" name="category">
                                <option selected>Select Product Category</option>
                                <?php 
                                    require '../config.php';
                                    $sql = "SELECT Category_id, Category_name FROM category";
                                    $result = $con->query($sql);
                                    if($result->num_rows > 0){
                                        while($rows = $result->fetch_assoc()){
                                ?>
                                <option value="<?php echo $rows["Category_id"] ?>"><?php echo $rows["Category_name"] ?></option>                
                                <?php
                                    }
                                }
                                else{
                                    echo "Data not found";
                                } 
                                ?>
                            </select>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="code">Product code</label>
                            <input onchange="Code()" id="Codejs" name="code" type="text" placeholder="Code"
                                class="form-control" required>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="quantity">Product quantity</label>
                            <input name="quantity" type="text" placeholder="quantity" class="form-control" required>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="colors">Colors available</label>
                            <select class="form-select" name="colors">
                                <option selected>Open this select menu</option>
                                <option value="Red">Red</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Blue">Blue</option>
                            </select>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="images" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="content_image" onchange="uploadImage()">
                            <textarea hidden name="imageURL" id="downloadableURL" required></textarea>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="descript" class="form-label">Product description</label>
                            <textarea class="form-control" name="descript" required rows="3"></textarea>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="price" class="form-label">Product price</label>
                            <input name="price" type="text" placeholder="Rs." class="form-control" required>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="ship">Shipping option</label>
                            <select class="form-select" name="ship">
                                <option selected>Open this select menu</option>
                                <option value="foriegn">Overseas</option>
                                <option value="domestic">Domestic</option>
                            </select>
                        </div>
                        <br />
                        <br />
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="../Admin_Dashboard/Dashboard.php"><button class="btn btn-primary me-md-2" type="button">Cancel</button></a>
                            <button class="btn btn-primary" type="submit">Publish</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>

</html>