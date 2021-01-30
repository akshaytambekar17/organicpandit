<section class="video-section">
    <script>
        document.getElementById('vid').play();
    </script>
    <div class="video-bg">
        <video src="<?= base_url() ?>assets/design/img/video-bg.mp4" class="about-video" autoplay muted loop id="vid">
            <source src="<?= base_url() ?>assets/design/movie.mp4" type="video/mp4" />
        </video>
        <div class="heading-about">
            <h1>Contact Us</h1>
        </div>
    </div>
</section>
<section class="main-section about-content">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2 class="text-center text-green pb-30">Contact Us</h2>
            </div>
        </div> 
        <?php if($message = $this ->session->flashdata('Message')){?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?=$message ?>
                    </div>
                </div>
            <?php }?> 
            <?php if($message = $this ->session->flashdata('Error')){?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?=$message ?>
                    </div>
                </div>
            <?php }?>
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <form id="contact-us" method="post" name="contact-us">
                    <div class="form-group">
                        <label>Enter Your Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?= set_value('name')?>">
                        <span class="has-error"><?php echo form_error('name'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Enter Your Email</label>
                        <input type="email" class="form-control" name="email_id" placeholder="Enter Email" value="<?= set_value('email_id')?>">
                        <span class="has-error"><?php echo form_error('email_id'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Enter Your Mobile number</label>
                        <input type="text" class="form-control" name="mobile_no" placeholder="Enter Mobile number" value="<?= set_value('mobile_no')?>">
                        <span class="has-error"><?php echo form_error('mobile_no'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Enter Your Query</label>
                        <textarea class="form-control" rows="5" name="query" placeholder="Enter Message" value="<?= set_value('query')?>"></textarea>
                        <span class="has-error"><?php echo form_error('query'); ?></span>
                    </div>  
                    <br>
                    <div class="text-center">
                        <input type="submit" class="btn btn-info text-center" value="Get In Touch">
                    </div>
                    <div id="loading" style="display: none;"> <img src="<?php echo base_url(); ?>assets/images/processing.gif" alt="organic world" > </div>
                </form>
               
                <script>
                    function initMap() {
                        var uluru = {lat: -25.363, lng: 131.044};
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 4,
                            center: uluru
                        });
                        var marker = new google.maps.Marker({
                            position: uluru,
                            map: map
                        });
                    }
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjTlVj092XFODcKcwdq7iLxcnH39Rodtk&callback=initMap">
                </script>
            </div>
            <div class="col-md-4 col-sm-4">
                <h3>Address</h3>    
                <p>Organic Pandit</p>
                <p>901-AL Cazer, Supreme Pallacio, Pancard club road, Dhankude wasti, Baner, Pune – 411045.</p>
                <p>Call us at: +91 91453 47218</p>
                <p>Mail: support@organicpandit.com</p>
            </div>            
        </div>
    </div>
</section>
<!-- js -->
<script>
    function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }

    $(document).ready(function () {

        $('#contact_form').formValidation({
            framework: 'bootstrap',
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'The username is required'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email is required'
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'The address is required'
                        }
                    }
                },
                message: {
                    validators: {
                        notEmpty: {
                            message: 'The message is required'
                        }
                    }
                }
            }
        })

                .on('success.form.fv', function (e) {
                    e.preventDefault();

                    $.ajax({
                        url: "<?php echo base_url(); ?>contact/sendMail",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $("#loading").show();
                        },
                        success: function (response)
                        {
                            console.log(response);
                            $("#loading").hide();
                            if (response = 'success') {
                                console.log(response);
                                swal({
                                    title: "Success!",
                                    text: "Message has been sent successfully",
                                    type: "success",
                                    showCancelButton: false,
                                    timer: 2000
                                });
                                // document.getElementById("farmerRegisterForm").reset();
                            }
                        }
                    });


                });
    });
</script>

