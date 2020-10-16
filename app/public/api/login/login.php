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
        <!-- Check If User Exists-->
        <?php
            require "common.php";
            $db = DbConnection::getConnection();
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $sql="SELECT DISTINCT * FROM account WHERE email = ? AND password = ?";

            $stmt = $db->prepare($sql);
            $stmt->execute([
                $email, 
                password_hash($password, PASSWORD_BCRYPT)
            ]);
            $user = $stmt->fetchAll();
        ?>
        <!-- Login-->
        <section class="page-section" id="login">
            <div class="container">
                <div class="text-center">
                    <?php
                        if ($stmt->rowCount() > 0) {
                            echo '<h2 class="section-heading text-uppercase">Welcome Back ' . $row["fname"] . '</h2>';
                            echo '<h3 class="section-subheading text-muted">' . $row["position"] . '</h3>';
                            echo '<form method="POST" action="members.html" id="members" name="members" novalidate="novalidate">
                                    <div class="row align-items-stretch mb-5 justify-content-center">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" id="email" type="hidden" value= $email />
                                                <div class="text-center">
                                                    <div id="success"></div>
                                                    <button class="btn btn-primary btn-xl text-uppercase" id="login" type="submit">View Members</button>
                                                </div>
                                            </div>
                                        </div>
                                    <div>
                                </form>';
                            echo '<form method="POST" action="certifications.php" id="certifications" name="certifications" novalidate="novalidate">
                                    <div class="row align-items-stretch mb-5 justify-content-center">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" id="email" type="hidden" value= $email />
                                                <div class="text-center">
                                                    <div id="success"></div>
                                                    <button class="btn btn-primary btn-xl text-uppercase" id="login" type="submit">View Certifications</button>
                                                </div>
                                            </div>
                                        </div>
                                    <div>
                                </form>';
                            echo '<form method="POST" action="expcert.php" id="expcert" name="expcert" novalidate="novalidate">
                                    <div class="row align-items-stretch mb-5 justify-content-center">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" id="email" type="hidden" value= $email />
                                                <div class="text-center">
                                                    <div id="success"></div>
                                                    <button class="btn btn-primary btn-xl text-uppercase" id="login" type="submit">View Expired Certifications</button>
                                                </div>
                                            </div>
                                        </div>
                                    <div>
                                </form>';
                            echo '<form method="POST" action="memreport.php" id="memreport" name="memreport" novalidate="novalidate">
                                    <div class="row align-items-stretch mb-5 justify-content-center">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" id="email" type="hidden" value= $email />
                                                <div class="text-center">
                                                    <div id="success"></div>
                                                    <button class="btn btn-primary btn-xl text-uppercase" id="login" type="submit">View Member Report</button>
                                                </div>
                                            </div>
                                        </div>
                                    <div>
                                </form>';
                        } else {
                            echo '<form method="post" action="login.html" id="login" name="login" novalidate="novalidate">
                                    <div class="text-center">
                                        <div id="success"></div>
                                        <button class="btn btn-primary btn-xl text-uppercase" id="login" type="submit">Login</button>
                                    </div>
                                </form>';
                        }
                    ?>
                </div>
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
    </body>
</html>
