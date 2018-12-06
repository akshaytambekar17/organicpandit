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
    <body background="<?php echo base_url(); ?>assets/images/final.jpg";>

        <!-- header -->
        <?php echo $this->load->view('includes/header'); ?>
        <!-- banner -->
        <section>
            <div class="container">
                <div class="row">

                    <h3 class="text-center text-green pb-30">Login to Your Account</h3>
                    <div class="login-container">
                        <?php if ($message = $this->session->flashdata('Message')) { ?>
                            <div class="col-md-12 ">
                                <div class="alert alert-dismissible alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <?= $message ?>
                                </div>
                            </div>
                        <?php } ?> 
                        <?php if ($message = $this->session->flashdata('Error')) { ?>
                            <div class="col-md-12 ">
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <?= $message ?>
                                </div>
                            </div>
                        <?php } ?>  
                        <form class="form-horizontal" id="loginForm" method="POST">
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="utype">User Type:</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" name="user_type_id">
                                        <option disabled="disabled" selected="selected" >Select User Type</option>
                                        <?php foreach ($this->UserType->getUserTypes() as $value) { ?>
                                                <option value="<?= $value['id'] ?>" <?= set_select('user_type_id', $value['id']); ?>><?= $value['name'] ?></option>
                                        <?php } ?>
                                    </select>
<!--                                    <select class="form-control" id="usertype" name="usertype">
                                        <option>Select User </option>
                                        <option value="farmer">Farmer</option>
                                        <option value="fpo">FPO</option>
                                        <option value="trader">Trader</option>
                                        <option value="processor">Processor</option>
                                        <option value="buyer">Buyer</option>
                                        <option value="org_consultant">Organic consultant</option>
                                        <option value="org_input">Organic Input Company</option>
                                        <option value="packaging">Packaging</option>
                                        <option value="logistic">Logistic</option>
                                        <option value="farm_equipment">Farm  Equipment</option>
                                        <option value="exhibitors">Exhibitors</option>
                                        <option value="shops">Shops</option>
                                        <option value="labs">Labs</option>
                                        <option value="gov_agency">Gov. agency</option>
                                        <option value="institutions">Institutions</option>
                                        <option value="others">Others</option>
                                        <option value="restaurant">Restaurant</option>
                                        <option value="ngo">NGO</option>
                                        <option value="certification">Certification</option>

                                    </select>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="username">Username:</label>
                                <div class="col-sm-8"> 
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="password">Password:</label>
                                <div class="col-sm-8"> 
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-black">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <?php echo $this->load->view('includes/footer'); ?>
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
                        usertype: {
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
                                success: function (response)
                                {
                                    console.log(response);
                                    if (response != 'success') {
                                        swal({
                                            title: "Fail!",
                                            text: "username or password is incorrect!",
                                            type: "warning",
                                            showCancelButton: false,
                                            timer: 2000
                                        });


                                        // document.getElementById("farmerRegisterForm").reset();
                                    } else {
                                        console.log(response);
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
