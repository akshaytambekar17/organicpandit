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
            }

            p {
                font-weight: 200;
            }
            h4 {
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
                        <h1 class="text-center"><?= $strTitle ?></h1>
                    </div>
                </div> 
                <hr>
                <br>
                <div class="row ">
                    <div class="col-md-12">
                        <p>At Organic Pandit we recognise the importance of protecting your personal information and are committed to processing it responsibly and in compliance with applicable data protection laws in all countries in which the company operates.</p>
                        <br>
                        <p>This Privacy Statement describes company’s general privacy practices that apply to personal information we collect, use and share about our clients, business partners, supplier and other organisations with which Organic Pandit has or contemplates a business relationship as well as the individuals working for them. This Privacy Statement does not apply to the extent company processes personal information on behalf of clients for their benefit. It may apply to collection of information related to authorised users of such services to the extent Organic Pandit processes this information for its own interests (as "controller").</p>
                        <br>
                        <p>This Privacy Statement is supplemented by the Organic Pandit Online Privacy Statement, which provides more information in the online context, including recruitment. We may provide additional or more specific information on the collection or use of personal information on websites or related to a specific product or service. </p>
                        <br>
                        <h4>Why and how we collect and use your personal information?</h4>
                        <p>We may collect your personal information as an individual for various purposes, such as the following:</p>
                        <ul>
                            <li>Access and use of websites or other online service (including "apps").</li>
                            <p>When entering one of our websites, or using an online service (where references to online services include desktop or mobile applications or "apps"), we will record information necessary to provide you with access, for the operation of the website and for us to comply with security and legal requirements in relation to operating our site, such as passwords, IP address and browser settings. We also collect information about your activities during your visit in order to personalise your website experience, such as recording your preferences and settings, and to collect statistics to help us improve and further develop our websites, products and services.</p>
                            
                            <li>Responding to your request for information, order, or support</li>
                            <p>When you contact us (online or offline) in connection with a request for information, to order a product or service, to provide you with support, or to participate in a forum or other social computing tool, we collect information necessary to fulfill your request, to grant you access to the product or service, to provide you with support and to be able to contact you. For instance, we collect your name and contact information, details about your request and your agreement with us and the fulfillment, delivery and invoicing of your order and we may include client satisfaction survey information. We retain such information for administrative purposes, defending our rights, and in connection with our relationship with you.</p>
                            <p>When you provide your name and contact information to register in connection with such a request, the registration may serve to identify you when you visit our websites. Registration may also allow you to customise and control your privacy settings.</p>
                            
                            <li>Contacting clients, prospects, partners and suppliers</li>
                            <p>In our relationship with clients, partners and suppliers, they also provide us with business contact information (such as name, business contact details, position or title of their employees, contractors, advisors and authorised users) for purposes such as contract management, fulfilment, delivery of products and services, provision of support, invoicing and management of the services or the relationship.</p>
                            
                            <li>Visitor information</li>
                            <p>We register individuals visiting our sites and locations (name, identification and business contact information) and use camera supervision for reasons of security and safety of persons and belongings, as well as for regulatory purposes. </p>
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
