<?php
include("setting.php");
session_start();
if (!isset($_SESSION['sid'])) {
    header("location:index.php");
}
$sid = $_SESSION['sid'];
$a = mysqli_query($set, "SELECT * FROM students WHERE sid='$sid'");
$b = mysqli_fetch_array($a);
$name = $b['name'];
$bn = $_POST['name'];
$ba = $_POST['author'];
if ($bn != NULL && $ba != NULL) {
    $sql = mysqli_query($set, "INSERT INTO request(name,author,sid) VALUES('$bn','$ba','$sid')");
    if ($sql) {
        $msg = "Successfully Requested";
    } else {
        $msg = "Request Already Exists";
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

            <a class="navbar-brand" href="home.php"><img class="logo" src="images/logo.png" alt="logo"></a>

            <!-- Toggler/collapsibe Button for small screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myList" aria-controls="myList" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- List of links -->
            <div class="collapse navbar-collapse" id="myList">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active nav2">
                        <a class="nav-link" href="issueBook.php">Issue Book</a>
                    </li>
                    <li class="nav-item nav2">
                        <a class="nav-link" href="request.php">Request New Books</a>
                    </li>
                    <li class="nav-item nav2">
                        <a class="nav-link" href="changePassword.php">Change Password</a>
                    </li>
                    <li class="nav-item nav2">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>



                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome <font color="#FC0C0C">Member</font>
                            ,<br><?php echo $name; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="text-center">
            <h1 class="allform2">Request for Unavailable Book</h1>
        </div>
    </div>

    <div class="allform">
        <div class="small-container">
            <div class="row">
                <!-- <div class="row">-->
                <div class="col-12">

                    <table class="center">
                        <form method="post" action="">

                            <tr>
                                <td class="msg" colspan="2"><?php echo $msg; ?></td>
                            </tr>
                            <tr>
                                <td>Book : </td>
                                <td><input type="text" required="required" name="name" placeholder="Enter Book Name" />
                                </td>
                            </tr>
                            <tr>
                                <td class="labels">Author Name : </td>
                                <td><input type="text" required="required" name="author" placeholder="Enter Author Name" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center"><input type="submit" value="Request" /></td>
                            </tr>
                        </form>
                    </table>


                    <div class="text-center">
                        <a href="home.php" class="link">Go Back</a>
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