<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
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
                        <div class="site-heading">
                            <h1>Organic Publications</h1>
<!--                            <span class="subheading">A Blog Theme by Start Bootstrap</span>-->
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container-fluid">
            <?php if( true == isStrVal( $this ->session->flashdata( 'Error' ) ) ) { 
                    $strErrorMessage = $this ->session->flashdata( 'Error' );
            ?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $strErrorMessage ?>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-lg-3 col-md-3 mx-auto">
                    <h4>Categories</h4>
                    <input type="text" id="js-blog-category-id" class="blog-category-input" onkeyup="filterBlogcategory()" placeholder="Search for category.." title="Type in a category">

                    <ul id="blog-category-ul">
                        <?php foreach( $arrBlogCategoriesList as $arrBlogCategoryDetails ) { ?>
                        <li>
                            <a class="<?= ( ( true == isset( $intBlogCategoryId ) ) && ( $intBlogCategoryId == $arrBlogCategoryDetails['blog_category_id'] ) ) ? 'blog-category-li-selected' : '' ?>" href="<?= base_url()?>blogs?blog_category_id=<?= $arrBlogCategoryDetails['blog_category_id'] ?>">
                                <?= $arrBlogCategoryDetails['blog_category_name'] ?>
                            </a>
                        </li>
                        <?php } ?>    
                    </ul>
                </div>
                <div class="col-lg-9 col-md-9 mx-auto">
                    <?php 
                        if( true == isArrVal( $arrBlogsList ) ) {
                            foreach( $arrBlogsList as $arrBlogDetails ) {  
                    ?>
                            <div class="post-preview">
                                <a href="<?= base_url()?>blog-details?blog_id=<?= $arrBlogDetails['blog_id'] ?>" >
                                    <h2 class="post-title">
                                        <?= $arrBlogDetails['title'] ?>
                                    </h2>
                                    <h4 class="post-subtitle">
                                        <?php
                                            $strDescription = strip_tags( $arrBlogDetails['description'] );
                                            if( strlen( $strDescription ) > 200 ) {
                                                // truncate string
                                                $strDescriptionCut = substr( $strDescription, 0, 200 );
                                                $strEndPoint = strrpos( $strDescriptionCut, ' ' );
                                                        
                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $strDescription = $strEndPoint ? substr( $strDescriptionCut, 0, $strEndPoint ) : substr( $strDescriptionCut, 0 );
                                                $strDescription .= '.....';
                                            }
                                            echo $strDescription;
                                        ?>
                                        
                                    </h4>
                                </a>
                                <p class="post-meta">Posted by
                                    <a href="#">Oragnic Team</a>
                                    on <?= date( 'F d, Y', strtotime( $arrBlogDetails['created_at'] ) ) ?></p>
                            </div>
                            <hr>
                    <?php } } else { ?>    
                            <div class="post-preview">
                                <h3 class="post-title">
                                    No Publications. New Publication will adding soon <?= ( ( true == isset( $arrBlogCategoryData ) )&&  ( true == isArrVal( $arrBlogCategoryData ) ) ) ? ' for ' . $arrBlogCategoryData['blog_category_name'] : '' ?>!
                                </h3>
                            </div>
                    <?php } ?>    
                    <!-- Pager -->
<!--                    <div class="clearfix">
                        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                    </div>-->
                </div>
            </div>
        </div>

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
        <script>
            $(".alert").delay(5000).slideUp(200, function() {
                $(this).alert('close');
            });
            function filterBlogcategory() {
                var input, filter, ul, li, a, i, txtValue;
                input = document.getElementById("js-blog-category-id");
                filter = input.value.toUpperCase();
                ul = document.getElementById("blog-category-ul");
                li = ul.getElementsByTagName("li");
                for (i = 0; i < li.length; i++) {
                    a = li[i].getElementsByTagName("a")[0];
                    txtValue = a.textContent || a.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }
            }
            
        </script>
    </body>

</html>
