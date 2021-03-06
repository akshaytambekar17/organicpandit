<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="<?= true == isStrVal( $arrBlogDetails['meta_title'] ) ? $arrBlogDetails['meta_title'] : '' ?>">
        <meta name="keywords" content="<?= true == isStrVal( $arrBlogDetails['meta_keyword'] ) ? $arrBlogDetails['meta_keyword'] : '' ?>">
        <meta name="author" content="">

        <title><?= $strTitle ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url(); ?>assets/blog/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="<?= base_url(); ?>assets/blog/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="<?= base_url(); ?>assets/blog/css/clean-blog.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/blog/css/style.css" rel="stylesheet">

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url(); ?>home">
                    <img src="<?php echo base_url(); ?>assets/images/logo.png" class="logo-img"></a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>blogs">Publications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Header -->
        <header class="masthead" style="background-image: url('<?= base_url()?>assets/blog/img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-heading">
                            <h1><?= $arrBlogDetails['title'] ?></h1>
<!--                            <h2 class="subheading">Problems look mighty small from 150 miles up</h2>-->
                            <span class="meta">Posted by
                                <a href="#">Organic Team</a>
                                on <?= date( 'F d, Y', strtotime( $arrBlogDetails['created_at'] ) ) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Post Content -->
        <article>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <p><?= $arrBlogDetails['description'] ?></p>

                        <a href="#">
                            <img class="img-fluid" src="<?= base_url()?>assets/images/blogs/<?= $arrBlogDetails['blog_image'] ?>" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </article>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-muted">Copyright &copy; Organic Pandit 2019</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="<?= base_url(); ?>assets/blog/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/blog/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="<?= base_url(); ?>assets/blog/js/clean-blog.min.js"></script>


    </body>

</html>
