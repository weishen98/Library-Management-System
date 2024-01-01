<?php
include("setting.php");
session_start();
if (!isset($_SESSION['aid'])) {
    header("location:index.php");
}
$aid = $_SESSION['aid'];
$a = mysqli_query($set, "SELECT * FROM admin WHERE aid='$aid'");
$b = mysqli_fetch_array($a);
$name = $b['name'];
$bn = $_POST['name'];
$au = $_POST['auth'];
$pdate = $_POST["pdate"];
$category = $_POST["category"];
$quantity = $_POST["quantity"];
if ($_FILES["image"]["error"] == 4) {
    echo
    "<script> alert('Image Does Not Exist'); </script>";
} else {
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));

    $newImageName = uniqid();
    $newImageName .= '.' . $imageExtension;
    if ($fileSize > 1000000) {
        echo
        "
        <script>
          alert('Image Size Is Too Large');
        </script>
        ";
    } else {
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        // print("<pre>");
        // print_r($newImageName);
        // echo "\n Testing 2nd Data \n";
        // print_r($tmpName);

        // $tempName = "/";
        // print_r($newImageName);
        // print_r($newImageName);
        // print_r($newImageName);
        //die();
        move_uploaded_file($tmpName, 'img/' . $newImageName);
        if ($bn != NULL && $au != NULL && $pdate != NULL && $category != NULL && $quantity != NULL && $newImageName != NULL) {
            $sql = mysqli_query($set, "INSERT INTO books(name,author,pdate,category,quantity,image) VALUES('$bn','$au','$pdate','$category','$quantity','$newImageName')");
            if ($sql) {
                $msg = "Successfully Added";
            } else {
                $msg = "Book Already Exists";
            }
        }
    }
}

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="form.css" rel="stylesheet" type="text/css" />
    <style>
        

    </style>

    <title>Library Management System</title>
</head>

<body>
    <!-- Header section -->
    <!--<header class="header py-5 bg-warning">
    <div class="container">
        <h1 class="text-center">Header Area</h1>
    </div>
</header>-->

    <!-- Implement the Navbar -->
    <nav class="navbar navbar-expand-sm sticky-top navbar-bgcolor">
        <div class="container">
            <!-- Replace this with your own logo -->

            <a class="navbar-brand" href="adminhome.php"><img class="logo" src="images/logo.png" alt="logo"></a>

            <!-- Toggler/collapsibe Button for small screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myList" aria-controls="myList" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- List of links -->
            <div class="collapse navbar-collapse" id="myList">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active nav1">
                        <a class="nav-link" href="addBooks.php">Add Books</a>
                    </li>
                    <li class="nav-item nav1">
                        <a class="nav-link" href="bookRequests.php">Books Request</a>
                    </li>
                    <li class="nav-item nav1">
                        <a class="nav-link" href="issue.php">Book Issued</a>
                    </li>
                    <li class="nav-item nav1">
                        <a class="nav-link" href="inventory.php">Book Inventory</a>
                    </li>
                    <li class="nav-item nav1">
                        <a class="nav-link" href="changePasswordAdmin.php">Change Password</a>
                    </li>
                    <li class="nav-item nav1">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>

                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome <font color="#FC0C0C">Admin</font>
                            ,<br><?php echo $name; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="text-center">
            <h1 class="allform2">Add Books</h1>
        </div>
    </div>

    <div class="allform">
        <div class="small-container">
            <div class="row">
                <!-- <div class="row">-->
                <div class="col-12">

                    <table class="center">
                        <form method="post" action="" enctype="multipart/form-data">
                            <tr>
                                <td class="msg" colspan="2"><?php echo $msg; ?></td>
                            </tr>
                            <tr>
                                <td class="">Book : </td>
                                <td class=""><input type="text" name="name" placeholder="Enter Book Name" required="required" /></td>
                            </tr>
                            <tr>
                                <td class="">Author : </td>
                                <td><input type="text" name="auth" placeholder="Enter Author Name" required="required" /></td>
                            </tr>
                            <tr>
                                <td>Published Date :</td>
                                <td>
                                    <input type="date" name="pdate" placeholder="Published Date">
                                </td>
                            </tr>
                            <tr>
                                <td>Category :</td>
                                <td><select name="category" required>
                                        <option selected hidden value="">Select Category</option>
                                        <option value="Educational">Educational</option>
                                        <option value="Mystery">Mystery</option>
                                        <option value="Fiction">Fiction</option>
                                        <option value="Action-Adventure">Action-Adventure</option>
                                        <option value="Fantasy">Fantasy</option>
                                        <option value="Horror">Horror</option>
                                        <option value="Comedic">Comedic</option>
                                        <option value="Drama">Drama</option>
                                        <option value="Others">Others</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Quantity :</td>
                                <td class="">
                                    <input type="text" name="quantity" placeholder="Quantity" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Image to Upload :</td>
                                <td>
                                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2"><input type="submit" value="ADD BOOK" class="fields" /></td>
                            </tr>
                        </form>
                    </table>


                    <div class="text-center">
                        <a href="adminhome.php" class="link">Go Back</a>
                    </div>
                    <br />
                    <br />

                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</body>

</html>