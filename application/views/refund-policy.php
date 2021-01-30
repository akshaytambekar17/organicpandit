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
                        <p>We hope you will be happy with our services. However, if you feel it necessary to return an item, we aim to make the returns process as simple as possible.</p>
                        <br>
                        <ul>
                            <li>No questions asked returns policy: On delivery if you are not happy with what you have received, you may return the items to the same delivery executive. We have a no questions asked returns policy.</li>
                            <li>After taking the delivery, you will be able to return within 7 days, only if,
                                <ul>
                                    <li>Item is defected at the time of delivery</li>
                                    <li>Item is expired at the time of delivery</li>
                                    <li>Item is that you are not ordered at the time of delivery</li>
                                </ul>
                            </li>
                        </ul>
                        <br>
                        
                        <p>Please note we cannot accept the return of perishable items like milk, vegetables due to hygiene purposes. Instead we will give you reward points for the same amount. You can use the reward points in your subsequent purchase.</p>
                        <p>We will arrange with you for non-perishable goods to be returned to us (please note that the goods must not have been used and must be in good condition).</p>
                        <p>We will not charge you for any incorrect goods or defective goods which you have received.</p>
                        <p>Over and above all the above conditions, company might accept returns on case to case basis, which is on the goodwill, which is purely subject to the discretion of the company Cancellation.</p>
                        <p>You can cancel your order within one hour of order placed by mailing us at support@organicpandit.com You can cancel the whole order on the time of delivery if you are not satisfied.</p>
                        <br>
                        
                        <h4>Payment</h4>
                        <p><i>We accept following payment options:</i></p>
                        <ul>
                            <li>Cash on delivery</li>
                            <li>Online payment through debit card, credit card, net banking and wallet services</li>
                            <li>Card on delivery</li>
                        </ul>
                        <p>You should pay the correct amount as in the invoice; we accept only Indian rupees</p>
                        
                        <br>
                        <h4>Refund</h4>
                        <p>If there is any refund, it might be routed through the same vendor as the payment was made for eg EBS or PAYU or ICIC Bank gate way etc. In such circumstances the refund is subject to third party processes on which we do not have any control. However, we can provide you the reference number/transaction id. If the payment was made directly to our bank a/c, then we will raise the refund through NEFT. The process will take maximum of 15 (fifteen) working days.</p>
                    
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
