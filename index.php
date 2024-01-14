<?php
include("setting.php");
session_start();
if (isset($_SESSION['sid'])) {
    header("location:home.php");
}
$sid = mysqli_real_escape_string($set, $_POST['sid']);
$pass = mysqli_real_escape_string($set, $_POST['pass']);

if ($sid == NULL || $_POST['pass'] == NULL) {
    //
} else {
    $p = sha1($pass);
    $sql = mysqli_query($set, "SELECT * FROM students WHERE sid='$sid' AND password='$p'");
    if (mysqli_num_rows($sql) == 1) {
        $_SESSION['sid'] = $_POST['sid'];
        header("location:home.php");
    } else {
        $msg = "Incorrect Details";
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


    <div class="container">
        <div class="text-center">
            <h1 class="allform3">Member Sign In</h1>
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
                                <td colspan="2" class="msg"><?php echo $msg; ?></td>
                            </tr>
                            <tr>
                                <td class="">Member ID : </td>
                                <td><input type="text" name="sid" placeholder="Enter Member ID" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td class="">Password : </td>
                                <td><input type="password" name="pass" placeholder="Enter Password" required="required" /></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2"><input type="submit" value="Sign In" class="fields" /></td>
                            </tr>
                        </form>
                    </table>



                    <div class="text-center">
                        <a href="register.php" class="link2">Sign Up</a>
                        <a href="admin.php" class="link2">Admin Sign In</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</body>

</html>