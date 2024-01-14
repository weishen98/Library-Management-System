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
if ($bn != NULL && $au != NULL) {
    $sql = mysqli_query($set, "INSERT INTO books(name,author) VALUES('$bn','$au')");
    if ($sql) {
        $msg = "Successfully Added";
    } else {
        $msg = "Book Already Exists";
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
    <!--<link href="table.css" rel="stylesheet" type="text/css" />-->
    <link rel="stylesheet" href="table.css?v=<?php echo time(); ?>">
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
            <h1 class="allform2">Books Request From Members</h1>
        </div>
    </div>

    <div class="allform">
        <div class="small-container">
            <div class="row">
                <!-- <div class="row">-->
                <div class="col-12">

                    <table class="center">
                        <tr>
                            <th>Book Name</th>
                            <th>Author</th>
                            <th>Requested by<br>(Student ID) </th>
                        </tr>
                        <?php
                        $x = mysqli_query($set, "SELECT * FROM request");
                        while ($y = mysqli_fetch_array($x)) {
                        ?>
                            <tr>
                                <td><?php echo $y['name']; ?></td>
                                <td><?php echo $y['author']; ?></td>
                                <td><?php echo $y['sid']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
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
    <!--mysqli_query($set-->
</body>

</html>