<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $strTitle ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- font awesome -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- FormValidation CSS file -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/formValidation.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    </head>
    <body>
        <style>
            p, ul>li {
                font-size: 16px;
                font-weight: 200;
            }

            h3 {
                font-weight: 600;
            }

            .mb-70 {
                margin-bottom: 70px;
            }
        </style>
        <!-- header -->
        <?php echo $this->load->view('includes/header'); ?>
        <!-- banner -->
        <section>
            <div class="container mb-70">
                <div class="row ">
                    <div class="col-md-12">
                        <h1 class="text-center">Terms & Conditions</h1>
                    </div>
                </div> 
                <hr>
                <br>
                <div class="row ">
                    <div class="col-md-12">
                        <p>Welcome to our website. If you continue to browse and use this website you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern relationship with you in relation to this website.</p>
                        <br>
                        <h3>The use of this website is subject to the following terms of use:</h3>
                        <ul>
                            <li>The content of the pages of this website is for your general information and use only. It is subject to change without notice.</li>
                            <li>Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and
                                materials may contain inaccuracies or errors and we expressly exclude liability for any such
                                inaccuracies or errors to the fullest extent permitted by law.
                            </li>
                            <li>Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.</li>
                            <li>This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is strictly prohibited.</li>
                            <li>Unauthorized use of this website may give rise to a claim for damages and/or be a criminal offence.</li>
                        </ul>
                    
                    </div>
                </div> 
            </div>
            
            <?php //echo $this->load->view('includes/footer'); ?>
        </section>

        <!-- js -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/framework/bootstrap.min.js"></script>
        <!-- plugin init js -->

    </body>
</html>
