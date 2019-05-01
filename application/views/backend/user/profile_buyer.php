<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Information</h3>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="fullname" >Fullname</label>
                            <input type="text" name="fullname"  class="form-control" id="fullname" placeholder="Fullname" value="<?= !empty($user_details['fullname'])?$user_details['fullname']:set_value('fullname') ?>">
                            <span class="has-error"><?php echo form_error('fullname'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="ceo_name">CEO Name</label>
                            <input type="text" name="ceo_name"  class="form-control" id="ceo_name" placeholder="CEO Name" value="<?= !empty($user_details['ceo_name'])?$user_details['ceo_name']:set_value('ceo_name') ?>">
                            <span class="has-error"><?php echo form_error('ceo_name'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="username" >Username</label>
                            <input type="text" name="username"  class="form-control" id="username" placeholder="Username" value="<?= !empty($user_details['username'])?$user_details['username']:set_value('username') ?>">
                            <span class="has-error"><?php echo form_error('username'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="email_id" >Email Id</label>
                            <input type="email" name="email_id"  class="form-control" id="email_id" placeholder="Email Id" value="<?= !empty($user_details['email_id'])?$user_details['email_id']:set_value('email_id') ?>">
                            <span class="has-error"><?php echo form_error('email_id'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="mobile_no">Mobile number</label>
                            <input type="text" name="mobile_no"  class="form-control" id="mobile_no" placeholder="Mobile number" value="<?= !empty($user_details['mobile_no'])?$user_details['mobile_no']:set_value('mobile_no') ?>">
                            <span class="has-error"><?php echo form_error('mobile_no'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="landline_no">Landline number</label>
                            <input type="text" name="landline_no"  class="form-control" id="landline_no" placeholder="Landline number" value="<?= !empty($user_details['landline_no'])?$user_details['landline_no']:set_value('landline_no') ?>">
                            <span class="has-error"><?php echo form_error('landline_no'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="address">Address</label>
                            <input type="text" name="address"  class="form-control" id="address" placeholder="Address" value="<?= !empty($user_details['address'])?$user_details['address']:set_value('address') ?>">
                            <span class="has-error"><?php echo form_error('address'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="state_id">Select State</label>
                            <select class="form-control select2" name="state_id" id="state_id">
                                <option disabled="disabled" selected="selected">Select State</option>
                                <?php foreach ($state_list as $value) { 
                                        if(!empty($user_details['state_id'])){
                                            $selected = $user_details['state_id'] == $value['id']?'selected="selected"':'';                                
                                        }else{
                                            $selected = '';
                                        }
                                ?>
                                    <option value="<?= $value['id'] ?>" <?= set_select('state_id', $value['id']); ?> <?= $selected?>><?= $value['name'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('state_id'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="city_id">Select City</label>
                            <select class="form-control select2" name="city_id" id="city_id">
                                <option disabled="disabled" selected="selected">Select City</option>
                            </select>
                            <input type="hidden" name="city_id_hidden" value="<?= $user_details['city_id']?>" id="city-id-hidden">
                            <span class="has-error"><?php echo form_error('city_id'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="agency_id">Select Certification Agency</label>
                            <select class="form-control select2" name="agency_id">
                                <option disabled="disabled" selected="selected" >Select Certification Agency</option>
                                <?php foreach ($certification_agencies_list as $value) { 
                                        if(!empty($user_details['agency_id'])){
                                            $selected = $user_details['agency_id'] == $value['user_id']?'selected="selected"':'';                                
                                        }else{
                                            $selected = '';
                                        }
                                ?>
                                    <option value="<?= $value['user_id'] ?>" <?= set_select('agency_id', $value['user_id']); ?> <?= $selected?>><?= $value['name'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('agency_id'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="gst_number">GST Number</label>
                            <input type="text" name="gst_number" class="form-control" id="gst_number" placeholder="GST Number" value="<?= !empty($user_details['gst_number'])?$user_details['gst_number']:set_value('gst_number') ?>">
                            <span class="has-error"><?php echo form_error('gst_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="aadhar_number">Aadhar Card Number</label>
                            <input type="text" name="aadhar_number" class="form-control" id="aadhar_number" placeholder="Aadhar Card Number" value="<?= !empty($user_details['aadhar_number'])?$user_details['aadhar_number']:set_value('aadhar_number') ?>">
                            <span class="has-error"><?php echo form_error('aadhar_number'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="story">Story</label>
                            <input type="text" name="story"  class="form-control" id="story" placeholder="Story" value="<?= !empty($user_details['story'])?$user_details['story']:set_value('story') ?>">
                            <span class="has-error"><?php echo form_error('story'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="is_test_report">Can you provide test report</label>
                            <select class="form-control select2" name="is_test_report" id="is_test_report">
                                <option disabled="disabled" selected="selected">Select Options</option>
                                <option value="2" <?= $user_details['is_test_report'] == 2 ?'selected="selected"':''?> >Yes</option>
                                <option value="1" <?= $user_details['is_test_report'] == 1 ?'selected="selected"':'' ?>>No</option>
                            </select>
                            <span class="has-error"><?php echo form_error('is_test_report'); ?></span>
                            <br><br>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="certification_id">Select Certification</label>
                            <select class="form-control select2" name="certification_id" id="certification_id">
                                <option disabled="disabled" selected="selected">Select Certification</option>
                                <?php foreach (getCertifications() as $key => $value) { 
                                        if(!empty($user_details['certification_id'])){
                                            $selected = $user_details['certification_id'] == $key?'selected="selected"':'';                                
                                        }else{
                                            $selected = '';
                                        }
                                ?>
                                    <option value="<?= $key ?>" <?= set_select('certification_id', $key); ?> <?= $selected?>><?= $value ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('certification_id'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Certification Number</label>
                            <input type="text" name="certification_number" class="form-control" id="certification_number" placeholder="Certification Number" value="<?= !empty($user_details['certification_number'])?$user_details['certification_number']:set_value('certification_number') ?>">
                            <span class="has-error"><?php echo form_error('certification_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control" id="website" placeholder="Website" value="<?= !empty($user_details['website'])?$user_details['website']:set_value('website') ?>">
                            <span class="has-error"><?php echo form_error('website'); ?></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="type_of_buyer">Type of Buyer</label>
                            <select class="form-control select2" name="type_of_buyer" id="type_of_buyer">
                                <option disabled="disabled" selected="selected">Select Options</option>
                                <option value="Company" <?= $user_details['type_of_buyer'] == 'Company' ?'selected="selected"':''; ?> >Company</option>
                                <option value="Exporter" <?= $user_details['type_of_buyer'] == 'Exporter'?'selected="selected"':''; ?>>Exporter</option>
                                <option value="Consumer" <?= $user_details['type_of_buyer'] == 'Consumer'?'selected="selected"':''; ?>>Consumer</option>
                            </select>
                            <span class="has-error"><?php echo form_error('type_of_buyer'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="profile_image">Choose Profile Pic</label>
                            <input type="file" name="profile_image" class="form-control" id="profile_image">
                            <?php if(!empty($user_details['profile_image'])){ ?>
                                    <br>
                                    <img src="<?= base_url()?>assets/images/gallery/<?= $user_details['profile_image']?>" width="70px" height="70px">
                                    <input type="hidden" name="profile_image_hidden" value="<?= $user_details['profile_image']?>">
                            <?php } ?>
                            <span class="has-error"><?php echo form_error('profile_image'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="certification_image">Choose Certification Pic</label>
                            <input type="file" name="certification_image" class="form-control" id="certification_image">
                            <?php if(!empty($user_details['certification_image'])){ ?>
                                    <br>
                                    <img src="<?= base_url()?>assets/images/gallery/<?= $user_details['certification_image']?>" width="70px" height="70px">
                                    <input type="hidden" name="certification_image_hidden" value="<?= $user_details['certification_image']?>">
                            <?php } ?>
                            <span class="has-error"><?php echo form_error('certification_image'); ?></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label" for="company_image">Choose Company Image</label>
                            <input type="file" name="company_image" class="form-control" id="company_image">
                            <?php if(!empty($user_details['company_image'])){ ?>
                                    <br>
                                    <img src="<?= base_url()?>assets/images/gallery/<?= $user_details['company_image']?>" width="70px" height="70px">
                                    <input type="hidden" name="company_image_hidden" value="<?= $user_details['company_image']?>">
                            <?php } ?>
                            <span class="has-error"><?php echo form_error('company_image'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="video">Choose Video</label>
                            <input type="file" name="video" class="form-control" id="video">
                            <?php if(!empty($user_details['video'])){ ?>
                                <a href="<?= base_url()?>assets/images/gallery/<?= $user_details['video']?>" download><h5>Download <?= $user_details['video']?></h5></a>
                                <input type="hidden" name="video_hidden" value="<?= $user_details['video']?>">
                            <?php } ?>    
                            <span class="has-error"><?php echo form_error('video'); ?></span>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($user_type_details['id'] == 1 || $user_type_details['id'] == 2 || $user_type_details['id'] == 3 || $user_type_details['id'] == 4 || $user_type_details['id'] == 5) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Product Details</h3>
                </div>
                <div class="box-body">
                    <?php if(!empty($user_product_details)){ ?>
                            <div class="col-md-12">
                                <div class="row">
                                    <?php foreach($user_product_details as $val_product){ ?>
<!--                                        <div class="form-group col-md-3">
                                            <label class="control-label label-required" for="name">Product Name</label>
                                            <input type="text" name="Product[name][]" class="form-control" id="name" placeholder="Product Name" value="<?= !empty($val_product['name'])?$val_product['name']:set_value('Product[name][]') ?>">
                                        </div>-->
                                        <div class="form-group col-md-3">
                                            <label class="control-label label-required" for="product_id">Product Name</label>
                                            <select class="form-control select2" name="Product[product_id][]">
                                                <option disabled="disabled" selected="selected">Select Product Name</option>
                                                <?php foreach (getProductCategory() as $key_pro => $val_pro) { ?>
                                                    <optgroup label="<?= $val_pro ?>">
                                                        <?php
                                                            foreach ($product_list as $value) {
                                                                if ($value['product_category_id'] == $key_pro) {
                                                                    if(!empty($val_product['product_id'])){
                                                                        $selected = $val_product['product_id'] == $value['id']?'selected="selected"':'';                                
                                                                    }else{
                                                                        $selected = '';
                                                                    }
                                                        ?>      
                                                                <option value="<?= $value['id'] ?>" <?= set_select('Product[product_id][]', $value['id']); ?> <?= $selected?>><?= $value['name'] ?></option>
                                                        <?php 
                                                                }
                                                            } 
                                                        ?>
                                                    </optgroup>            
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label label-required" for="description">Description</label>
                                            <input type="text" name="Product[description][]" class="form-control" id="description" placeholder="Product Description" value="<?= !empty($val_product['description'])?$val_product['description']:set_value('Product[description][]') ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label label-required" for="from_date">From Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" name="Product[from_date][]" class="form-control picker-date pull-right" id="from_date" placeholder="From Date" value="<?= !empty($val_product['from_date'])?date('m/d/Y', strtotime($val_product['from_date'])):set_value('Product[from_date][]') ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label label-required" for="to_date">To Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" name="Product[to_date][]" class="form-control picker-date pull-right" id="to_date" placeholder="To Date" value="<?= !empty($val_product['to_date'])?date('m/d/Y', strtotime($val_product['to_date'])):set_value('Product[to_date][]') ?>">
                                            </div>        
                                        </div>
                                        <div class="form-group col-md-3">
                                            <?php //printDie($val_product['quantity_id'])?>
                                            <label class="control-label label-required" for="quantity_id">Select Quantity</label>
                                            <select class="form-control" name="Product[quantity_id][]" >
                                                <option disabled="disabled" selected="selected">Select Quantity</option>
                                                <?php foreach (getQuantities() as $key => $value) { 
                                                    if(!empty($val_product['quantity_id'])){
                                                        $selected = $val_product['quantity_id'] == $key?'selected="selected"':'';                                
                                                    }else{
                                                        $selected = '';
                                                    }
                                                ?>
                                                    <option value="<?= $key ?>" <?= set_select('Product[quantity_id][]', $key); ?> <?= $selected?>><?= $value ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label label-required" for="quality">Qualitity</label>
                                            <input type="text" name="Product[quality][]" class="form-control" id="quality" placeholder="Quality" value="<?= !empty($val_product['quality'])?$val_product['quality']:set_value('Product[quality][]') ?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="control-label label-required" for="price">Price</label>
                                            <input type="text" name="Product[price][]" class="form-control" id="price" placeholder="Price" value="<?= !empty($val_product['price'])?$val_product['price']:set_value('Product[price][]') ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label label-required" for="images">Product Images</label>
                                            <input type="file" name="product_images[]" class="form-control" id="images">
                                            <?php if(!empty($val_product['images'])){ ?>
                                                    <br>
                                                    <img src="<?= base_url()?>assets/images/product_images/<?= $val_product['images']?>" width="70px" height="70px">
                                                    <input type="hidden" name="product_images_hidden[]" value="<?= $val_product['images']?>">
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                    <?php   } ?>    
                    <div class="col-md-12 pr-group box-body">
                        <div class="row">
<!--                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="name">Product Name</label>
                                <input type="text" name="Product[name][]" class="form-control" id="name" placeholder="Product Name" value="<?= set_value('Product[name][]') ?>">
                            </div>-->
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="product_id">Product Name</label>
                                <select class="form-control select2" name="Product[product_id][]">
                                    <option disabled="disabled" selected="selected">Select Product Name</option>
                                    <?php foreach (getProductCategory() as $key_pro => $val_pro) { ?>
                                        <optgroup label="<?= $val_pro ?>">
                                            <?php
                                                foreach ($product_list as $value) {
                                                    if ($value['product_category_id'] == $key_pro) {
                                            ?>      
                                                    <option value="<?= $value['id'] ?>" <?= set_select('Product[product_id][]', $value['id']); ?>><?= $value['name'] ?></option>
                                            <?php 
                                                    }
                                                } 
                                            ?>
                                        </optgroup>            
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="description">Description</label>
                                <input type="text" name="Product[description][]" class="form-control" id="description" placeholder="Product Description" value="<?= set_value('Product[description][]') ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="from_date">From Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="Product[from_date][]" class="form-control picker-date pull-right" id="from_date" placeholder="From Date" value="<?= set_value('Product[from_date][]') ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="to_date">To Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="Product[to_date][]" class="form-control picker-date pull-right" id="to_date" placeholder="To Date" value="<?= set_value('Product[to_date][]') ?>">
                                </div>        
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="quantity_id">Select Quantity</label>
                                <select class="form-control" name="Product[quantity_id][]" >
                                    <option disabled="disabled" selected="selected">Select Quantity</option>
                                    <?php foreach (getQuantities() as $key => $value) { ?>
                                        <option value="<?= $key ?>" <?= set_select('Product[quantity_id][]', $key); ?>><?= $value ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="quality">Qualitity</label>
                                <input type="text" name="Product[quality][]" class="form-control" id="quality" placeholder="Quality" value="<?= set_value('Product[quality][]') ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label label-required" for="price">Price</label>
                                <input type="text" name="Product[price][]" class="form-control" id="price" placeholder="Price" value="<?= set_value('Product[price][]') ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="images">Product Images</label>
                                <input type="file" name="product_images[]" class="form-control" id="images">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="control-label">Add</label>
                                <button type="button" class="btn btn-success addButton"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- The option field template containing an option field and a Remove button -->
                    <div class=" col-md-12 product-group box-body hide" id="optionTemplate">
                        <div class="row">
<!--                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="name">Product Name</label>
                                <input type="text" name="Product[name][]" class="form-control" id="name" placeholder="Product Name" value="<?= set_value('Product[name][]') ?>">
                            </div>-->
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="product_id">Product Name</label>
                                <select class="form-control select-picker" name="Product[product_id][]">
                                    <option disabled="disabled" selected="selected">Select Product Name</option>
                                    <?php foreach (getProductCategory() as $key_pro => $val_pro) { ?>
                                        <optgroup label="<?= $val_pro ?>">
                                            <?php
                                                foreach ($product_list as $value) {
                                                    if ($value['product_category_id'] == $key_pro) {
                                            ?>      
                                                    <option value="<?= $value['id'] ?>" <?= set_select('Product[product_id][]', $value['id']); ?>><?= $value['name'] ?></option>
                                            <?php 
                                                    }
                                                } 
                                            ?>
                                        </optgroup>            
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="description">Description</label>
                                <input type="text" name="Product[description][]" class="form-control" id="description" placeholder="Product Description" value="<?= set_value('Product[description][]') ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="from_date">From Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="Product[from_date][]" class="form-control picker-date pull-right" id="from_date" placeholder="From Date" value="<?= set_value('Product[from_date][]') ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="to_date">To Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="Product[to_date][]" class="form-control picker-date pull-right" id="to_date" placeholder="To Date" value="<?= set_value('Product[to_date][]') ?>">
                                </div>        
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="quantity_id">Select Quantity</label>
                                <select class="form-control" name="Product[quantity_id][]" >
                                    <option disabled="disabled" selected="selected">Select Quantity</option>
                                    <?php foreach (getQuantities() as $key => $value) { ?>
                                        <option value="<?= $key ?>" <?= set_select('Product[quantity_id][]', $key); ?>><?= $value ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="quality">Qualitity</label>
                                <input type="text" name="Product[quality][]" class="form-control" id="quality" placeholder="Quality" value="<?= set_value('Product[quality][]') ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label label-required" for="price">Price</label>
                                <input type="text" name="Product[price][]" class="form-control" id="price" placeholder="Price" value="<?= set_value('Product[price][]') ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label label-required" for="images">Product Images</label>
                                <input type="file" name="product_images[]" class="form-control" id="images">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="control-label">Remove</label>
                                <button type="button" class="btn btn-danger" onclick="removeButton(this)"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="product_count" id="product-count" value="0">
                    <div class=" form-group">
                        <div class="form-group col-md-3">
                            <span class="has-error"><?php echo form_error('Product[name][]'); ?></span>
                        </div>
                        <div class="form-group col-md-3">
                            <span class="has-error"><?php echo form_error('Product[description][]'); ?></span>
                        </div>
                        <div class="form-group col-md-3">
                            <span class="has-error"><?php echo form_error('Product[from_date][]'); ?></span>
                        </div>
                        <div class="form-group col-md-3">
                            <span class="has-error"><?php echo form_error('Product[to_date][]'); ?></span>
                        </div>
                        <div class="form-group col-md-3">
                            <span class="has-error"><?php echo form_error('quantity_id[]'); ?></span>
                        </div>
                        <div class="form-group col-md-3">
                            <span class="has-error"><?php echo form_error('Product[quality][]'); ?></span>
                        </div>
                        <div class="form-group col-md-3">
                            <span class="has-error"><?php echo form_error('Product[price][]'); ?></span>
                        </div>
                        <div class="form-group col-md-3">
                            <span class="has-error"><?php echo form_error('Product[images][]'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
<?php } ?>