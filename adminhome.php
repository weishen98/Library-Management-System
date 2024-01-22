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
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!--<link href="home.css" rel="stylesheet" type="text/css" />-->
    <link rel="stylesheet" href="home.css?v=<?php echo time(); ?>">
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

    <div class="slideshowcontainer">
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide"><img src="images/WPadvertisement1.png"></div>
                <div class="swiper-slide"><img src="images/WPadvertisement2.png"></div>
                <div class="swiper-slide"><img src="images/WPadvertisement3.png"></div>

            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </div>

    </div>
    </div>


    <!-- Just some dummy content -->

    <div class="container">
        <div class="text-center">
            <h1 class="popular2">Popular Read</h1>
        </div>
    </div>

    <div class="popular">
        <div class="small-container">
            <div class="row">
                <!-- <div class="row">-->
                <div class="col-3"><img src="images/demon slayer book.png"><br>
                    <h3>Demon Slayer</h3>
                </div>

                <div class="col-3"><img src="images/attack on titans book.png"><br>
                    <h3>Attack on Titan</h3>
                </div>

                <div class="col-3"><img src="images/jujutsu book.png"><br>
                    <h3>Jujutsu Kaisen</h3>
                </div>

                <div class="col-3"><img src="images/jojo book.png"><br>
                    <h3>Jojo Bizzare Adventure</h3>
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="text-center">
            <h1 class="featured4">Featured Book</h1>
        </div>
    </div>

    <div class="featured">
        <div class="small-container">
            <div class="row">
                <div class="col-4"><img src="images/demon slayer book 2.png" class="featured-img"></div>
                <div class="col-8">
                    <h1 class="featured3">Demon Slayer</h1>
                    <div class="featured2">Everything changed for Tanjiro Kamado when he came home one day to discover
                        that his family was attacked and slaughtered by a demon.
                        Tanjiro and his sister Nezuko were the sole survivors of the incident, with Nezuko being
                        transformed into a demon, but still surprisingly showing signs of human emotion and thought.
                        After an encounter with Giyū Tomioka, the Water Hashira of the Demon Slayer Corps, Tanjiro is
                        recruited by Giyū and sent to his retired master Sakonji Urokodaki for training to also become a
                        demon slayer,
                        beginning his quest to help his sister turn into human again and avenge the death of his family.
                    </div>
                    <br>
                    <a href="inventory.php" class="btn">View Book Inventory &#8594;</a>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <h1 class="operation2">Operations</h1>
        </div>
    </div>

    <div class="operation">
        <div class="small-container">
            <div class="row">
                <div class="col-5"><a class="" href="addBooks.php"><img src="images/add books.png"></a><br>
                    <h3>Add Books</h3>
                </div>

                <div class="col-5"><a class="" href="bookRequests.php"><img src="images/request books.png"></a><br>
                    <h3>Books Request</h3>
                </div>

                <div class="col-5"><a class="" href="issue.php"><img src="images/issue books.png"></a><br>
                    <h3>Book Issued</h3>
                </div>

                <div class="col-5"><a class="" href="inventory.php"><img src="images/book inventory.png"></a><br>
                    <h3>Book Inventory</h3>
                </div>

                <div class="col-5"><a class="" href="changePasswordAdmin.php"><img src="images/password.png"></a><br>
                    <h3>Change Password</h3>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <h1 class="testimonial4">Testimonials</h1>
        </div>
    </div>

    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-4">
                    <img src="images/elon musk.png"><br>
                    <h3>Elon Musk</h3>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i><br>
                    <i class="fa-solid fa-quote-left"></i><br>
                    <p>A very brilliant library concept, indeed an entreprenuerial material. I can certainly see a
                        potential in market growth and development.</p>

                </div>

                <div class="col-4">
                    <img src="images/the rock.png"><br>
                    <h3>Dwayne Johnson</h3>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i><br>
                    <i class="fa-solid fa-quote-left"></i><br>
                    <p>It's about drive, it's about power We stay hungry, we devour Put in the work, put in the hours
                        And take what's ours Black & samoan in my veins My culture banging with strange.</p>

                </div>

                <div class="col-4">
                    <img src="images/stephen chow.png"><br>
                    <h3>Stephen Chow</h3>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i><br>
                    <i class="fa-solid fa-quote-left"></i><br>
                    <p>呢間圖書館真高級，設備齊全，各種书读，有水準服務，真係好犀利! 冇得頂呀! This library very geng chao. 10/10 would come again!!</p>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <h1 class="partner2">Partnership</h1>
        </div>
    </div>
    <div class="partner">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <a href="https://college.taylors.edu.my/en.html"><img src="images/taylor.png"></a>
                </div>
                <div class="col-5">
                    <a href="https://www.samsung.com/my/"><img src="images/samsung.png"></a>
                </div>
                <div class="col-5">
                    <a href="https://www.coca-cola.com/"><img src="images/coke.png"></a>
                </div>
                <div class="col-5">
                    <a href="https://www.honda.com.my/"><img src="images/honda.png"></a>
                </div>
                <div class="col-5">
                    <a href="https://www.ibm.com/my-en"><img src="images/ibm.png"></a>
                </div>

            </div>
        </div>
    </div>


    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col2">
                    <img src="images/Library Promax Title WB.png">
                    <p>Our purpose is to serve and enabled the public to have access to a wide range of books' choices,
                        catering to their read of interest.</p>
                </div>
                <div class="footer-col3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li><a href="https://www.facebook.com/weishen.hong.98/">Facebook</a></li>
                        <li><a href="https://twitter.com/home">Twitter</a>
                        <li>
                        <li><a href="https://www.instagram.com/accounts/login/">Instagram</a></li>
                        <li><a href="https://youtu.be/dQw4w9WgXcQ">YouTube</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2022 - Wei Shen</p>
        </div>

    </div>




    <!-------for ads slider-------->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!-- Bootstrap Javascript bundle -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <script>
        // -------for ads slider--------
        const swiper = new Swiper('.swiper', {
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            loop: true,

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
        // -------for ads slider--------
    </script>

</body>

</html>