<?php
include("setting.php");
$name = $_POST['name'];
$email = $_POST['email'];
$contactno = $_POST['contactno'];
$gender = $_POST['gender'];
$sid = $_POST['sid'];
$pas = sha1($_POST['pass']);
if ($name == NULL || $email == NULL || $contactno == NULL || $gender == NULL || $sid == NULL || $_POST['pass'] == NULL) {
    //
} else {
    $sql = mysqli_query($set, "INSERT INTO students(sid,name,gender,contactno,password,email) VALUES('$sid','$name','$gender','$contactno','$pas','$email')");
    if ($sql) {
        $msg = "Successfully Registered";
    } else {
        $msg = "User Already Exists";
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
            <h1 class="allform3">Member Registration</h1>
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
                                <td>Name : </td>
                                <td><input type="text" name="name" placeholder="Enter Full name" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Email ID : </td>
                                <td><input type="email" name="email" placeholder="Enter Email ID" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Gender : </td>
                                <td>
                                    <input type="radio" id="male" name="gender" value="Male">Male </input>
                                    <input type="radio" id="female" name="gender" value="Female">Female</input>
                                </td>
                            </tr>

                            <tr>
                                <td>Contact No. : </td>
                                <td>
                                    <input type="text" name="contactno" placeholder="Enter contact number" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Student ID : </td>
                                <td><input type="text" name="sid" placeholder="Enter Student ID" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td>Password : </td>
                                <td><input type="password" name="pass" placeholder="Enter Password" required="required" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center"><input type="submit" value="Register" /></td>
                            </tr>
                        </form>
                    </table>


                    <div class="text-center">
                        <a href="index.php" class="link">Go Back</a>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</body>

</html>