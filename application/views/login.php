<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mera Kisan Organic</title>
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
    <style>
        .main-content{
            width: 50%;
            border-radius: 20px;
            box-shadow: 0 5px 5px rgba(0,0,0,.4);
            margin: 5em auto;
            display: flex;
        }
        .company__info{
            background-color: #000;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
        }
        .fa-android{
            font-size:3em;
        }
        @media screen and (max-width: 640px) {
            .main-content{width: 90%;}
            .company__info{
                display: none;
            }
            .login_form{
                border-top-left-radius:20px;
                border-bottom-left-radius:20px;
            }
        }
        @media screen and (min-width: 642px) and (max-width:800px){
            .main-content{width: 70%;}
        }
        .row > h2{
            color:#008080;
        }
        .login_form{
            background-color: #fff;
            border-top-right-radius:20px;
            border-bottom-right-radius:20px;
            border-top:1px solid #ccc;
            border-right:1px solid #ccc;
        }
        form{
            padding: 0 2em;
        }
        .form__input{
            width: 100%;
            border:0px solid transparent;
            border-radius: 0;
            border-bottom: 1px solid #aaa;
            padding: 1em .5em .5em;
            padding-left: 2em;
            outline:none;
            margin:1.5em auto;
            transition: all .5s ease;
        }
        .form__input:focus{
            border-bottom-color: #008080;
            box-shadow: 0 0 5px rgba(0,80,80,.4); 
            border-radius: 4px;
        }
        .btn{
            transition: all .5s ease;
            width: 70%;
            border-radius: 30px;
            color:#008080;
            font-weight: 600;
            background-color: #fff;
            border: 1px solid #008080;
            margin-top: 1.5em;
            margin-bottom: 1em;
        }
        .btn:hover, .btn:focus{
            background-color: #008080;
            color:#fff;
        }
    </style>
    <body>

        <!-- header -->
        <?php echo $this->load->view('includes/header'); ?>
        <!-- banner -->
        <section>
            <div class="container-fluid">
                <?php if ($message = $this->session->flashdata('Message')) { ?>
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $message ?>
                    </div>

                <?php } ?> 
                <?php if ($message = $this->session->flashdata('Error')) { ?>
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $message ?>
                    </div>
                <?php } ?> 
                <div class="row main-content bg-success text-center">
                    <div class="col-md-5 text-center company__info">
                        <span class="company__logo">
                            <h2>
                                <img src="<?= logoOrganicPandit()?>" alt="Organic Pandit" width="100%">
                            </h2>
                        </span>
<!--                        <h4 class="company_title">Your Company Logo</h4>-->
                    </div>
                    <div class="col-md-7 col-xs-12 col-sm-12 login_form ">
                         
                        <div class="container-fluid">
                            <div class="row">
                                <h2>Log In</h2>
                            </div>
                            <div class="row">
                                <form class="form-group" id="loginForm" method="post">
                                    <div class="row">
                                        <select class="form__input select2" name="user_type_id" >
                                            <option disabled="disabled" selected="selected" >Select User Type</option>
                                            <?php foreach ($this->UserType->getUserTypes() as $value) { ?>
                                                    <option value="<?= $value['id'] ?>" <?= set_select('user_type_id', $value['id']); ?>><?= $value['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="row">
                                        <input type="text" class="form__input" id="username" name="username" placeholder="Username">
                                    </div>
                                    <div class="row">
                                            <!-- <span class="fa fa-lock"></span> -->
                                        <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                                    </div>
<!--                                    <div class="row">
                                        <input type="checkbox" name="remember_me" id="remember_me" class="">
                                        <label for="remember_me">Remember Me!</label>
                                    </div>-->
                                    <div class="row">
                                        <input type="submit" value="Submit" class="btn js-submit">
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <p>Don't have an account? <a href="<?= base_url()?>signup">Register Here</a></p> 
                                <p>If your account not verified then <a href="<?= base_url()?>account-verification">Click Here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php //echo $this->load->view('includes/footer'); ?>
        </section>

        <!-- js -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <!-- form  validation -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/formValidation.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/framework/bootstrap.min.js"></script>
        <!-- plugin init js -->

        <script type="text/javascript">
            $(document).ready(function () {
                $('#loginForm').formValidation({
                    framework: 'bootstrap',
                    fields: {
                        user_type_id: {
                            validators: {
                                notEmpty: {
                                    message: 'The user type is required'
                                }
                            }
                        },
                        username: {
                            validators: {
                                notEmpty: {
                                    message: 'The username is required'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                }
                            }
                        }
                    }
                })

                        .on('success.form.fv', function (e) {
                            e.preventDefault();

                            $.ajax({
                                url: "<?php echo base_url(); ?>login/login_validation",
                                method: "POST",
                                data: new FormData(this),
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function (response) {
                                    var response = $.parseJSON(response);
                                    if ( false == response['success'] ) {
                                        $( '.js-submit' ).attr( "disabled", false );
                                        $( '.js-submit' ).removeClass( 'disabled' );
                                        swal({
                                            title: "Fail!",
                                            text: response['message'],
                                            type: "warning",
                                            showCancelButton: false,
                                            timer: 5000
                                        });
                                        
                                    } else {
                                        swal({
                                            title: "Success!",
                                            text: "Login successful!",
                                            type: "success",
                                            showCancelButton: false,
                                            timer: 2000
                                        });
                                        window.location.href = "<?php echo base_url(); ?>home";
                                    }
                                }
                            });


                        });
            });


        </script>

    </body>
</html>
