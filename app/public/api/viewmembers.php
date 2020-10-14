<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>OCFR</title>
        <link rel="icon" type="image/x-icon" href="https://oconeecountyfire.com/wp-content/uploads/2018/11/oconeecountyfire-logo2.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.html"><img src="https://oconeecountyfire.com/wp-content/uploads/2018/11/oconeecountyfire-logo2.png" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#masthead">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#login">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" id="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">FIRE RESCUE</div>
                <div class="masthead-subheading">Oconee County, GA</div>
            </div>
        </header>
        <!-- Selection-->
        <section class="page-section" id="login">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Members</h2>
                    <h3 class="section-subheading text-muted">Welcome to the main members page, please select your option.</h3>
                </div>
                <?php
                    require 'common.php';

                    $db = DbConnection::getConnection();

                    $sql = 'SELECT * FROM member';

                    $stmt = $db->prepare($sql);

                    $stmt->execute();

                    $member = $stmt->fetchAll();

                    $json = json_encode($member, JSON_PRETTY_PRINT);

                    echo $json;

                    $table = '<table class="table"><thead class="thead-dark"><th scope="col">No.</th><th scope="col">First Name</th><th scope="col">Middle Name</th><th scope="col">Last Name</th><th scope="col">Street</th><th scope="col">City</th><th scope="col">State</th><th scope="col">Zipcode</th><th scope="col">Phone</th><th scope="col">Email</th><th scope="col">Position</th><th scope="col">Radio Number</th><th scope="col">Station</th><th scope="col">Status</th><tbody>';

                    for($i = 0; $i < sizeof($json); $i++) {
                        $table = '<th scope = "row">$json["memberID"]</th>';
                    }
                    
                    $table .= '</tbody></table>';
                    
                    echo $table;
                ?>
            </div>
        </section>  
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright 2020 © MSIS Team 18</div>
                    <div class="col-lg-4 my-3 my-lg-0"></div>
                    <div class="col-lg-4 text-lg-right">Template Obtained From StartBootstrap.com</div>
                </div>
            </div>
        </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- Vue JS-->
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="js/index.app.js"></script>
    </body>
</html>
