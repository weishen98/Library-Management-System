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

function getBookDetails($id) {
    global $set;
    $id = mysqli_real_escape_string($set, $id);
    $result = mysqli_query($set, "SELECT * FROM books WHERE id='$id'");
    return mysqli_fetch_array($result);
}

function edit() {
    global $set;

    if (!isset($_POST['id'])) {
        // Handle the case when no book ID is provided.
        // For example, you can redirect the user to the inventory page.
        header("Location: inventory.php");
        exit;
    }

    $id = mysqli_real_escape_string($set, $_POST['id']);
    $bookDetails = getBookDetails($id);

    if (!$bookDetails) {
        // Handle the case when the book with the given ID is not found.
        // For example, you can redirect the user to the inventory page.
        header("Location: inventory.php");
        exit;
    }

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $au = isset($_POST['auth']) ? $_POST['auth'] : '';
    $pdate = isset($_POST['pdate']) ? $_POST['pdate'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';

    if ($_FILES["image"]["error"] != 4) {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;

        if ($fileSize > 1000000) {
            echo "<script>alert('Image Size Is Too Large');</script>";
        } else {
            move_uploaded_file($tmpName, 'img/' . $newImageName);
            $query = "UPDATE books SET image = '$newImageName' WHERE id = $id";
            mysqli_query($set, $query);
        }
    }

    $query = "UPDATE books SET name = '$name', author = '$au', pdate = '$pdate', category = '$category', quantity = '$quantity' WHERE id = $id";
    mysqli_query($set, $query);

    echo "<script>
            alert('Book Edited Successfully');
            window.location.href = 'inventory.php';
          </script>";
}

function delete() {
    global $set;

    if (!isset($_GET['id'])) {
        // Handle the case when no book ID is provided.
        // You may want to redirect or show an error message.
        return;
    }

    $id = mysqli_real_escape_string($set, $_GET["id"]);

    $query = "DELETE FROM books WHERE id = $id";
    mysqli_query($set, $query);

    echo "<script>
            alert('Book Deleted Successfully');
            window.location.href = 'inventory.php';
          </script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["submit"]) && $_POST["submit"] == "delete") {
        delete();
    }
    else {
        edit();
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
    <!--<link href="form.css" rel="stylesheet" type="text/css" />-->
    <link rel="stylesheet" href="form.css?v=<?php echo time(); ?>">
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
            <h1 class="allform2">Edit Books</h1>
        </div>
    </div>

    <div class="allform">
        <div class="small-container">
            <div class="row">
                <!-- <div class="row">-->
                <div class="col-12">

                    <table class="center">
                    <form action="edit.php" method="post" enctype="multipart/form-data">
       
                            <tr>
                                <td class="msg" colspan="2"><?php echo $msg; ?></td>
                            </tr>
                            <tr>
    
    <td class=""><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" required>
        </td>
</tr>     
<tr>
    <td class="">Book : </td>
    <td class=""><input type="text" name="name" id="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>" required>
        </td>
</tr>
<tr>
    <td class="">Author : </td>
    <td><input type="text" name="auth" id="auth" value="<?php echo isset($_GET['author']) ? $_GET['author'] : ''; ?>" required>
        </td>
</tr>
<tr>
    <td>Published Date :</td>
    <td>
    <input type="text" name="pdate" id="pdate" value="<?php echo isset($_GET['pdate']) ? $_GET['pdate'] : ''; ?>" required>
        </td>
</tr>
<tr>
    <td>Category :</td>
    <td><select type="text" name="category" id="category" required>
        
    <option selected hidden value="">Select Category</option>
            <option value="Educational" <?php echo ($_GET['category'] == 'Educational') ? 'selected' : ''; ?>>Educational</option>
            <option value="Mystery" <?php echo ($_GET['category'] == 'Mystery') ? 'selected' : ''; ?>>Mystery</option>
            <option value="Fiction" <?php echo ($_GET['category'] == 'Fiction') ? 'selected' : ''; ?>>Fiction</option>
            <option value="Action-Adventure" <?php echo ($_GET['category'] == 'Action-Adventure') ? 'selected' : ''; ?>>Action-Adventure</option>
            <option value="Fantasy" <?php echo ($_GET['category'] == 'Fantasy') ? 'selected' : ''; ?>>Fantasy</option>
            <option value="Horror" <?php echo ($_GET['category'] == 'Horror') ? 'selected' : ''; ?>>Horror</option>
            <option value="Comedic" <?php echo ($_GET['category'] == 'Comedic') ? 'selected' : ''; ?>>Comedic</option>
            <option value="Drama" <?php echo ($_GET['category'] == 'Drama') ? 'selected' : ''; ?>>Drama</option>
            <option value="Others" <?php echo ($_GET['category'] == 'Others') ? 'selected' : ''; ?>>Others</option>
                                        
                                    </select></td>
                            </tr>
                            <tr>
    <td>Quantity :</td>
    <td class="">
    <input type="text" name="quantity" id="quantity" value="<?php echo isset($_GET['quantity']) ? $_GET['quantity'] : ''; ?>" required>

    </td>
</tr>
                            <tr>
                                <td>Image to Upload :</td>
                                <td>
                                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                                </td>
                            </tr>
                            <tr>
                            <td class="text-center" colspan="2"><input type="submit" value="Edit" class="fields" /></td>
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




