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
                            <label class="control-label label-required" for="fullname" >FPO Name</label>
                            <input type="text" name="fullname"  class="form-control" id="fullname" placeholder="FPO Name" value="<?= !empty($user_details['fullname'])?$user_details['fullname']:set_value('fullname') ?>">
                            <span class="has-error"><?php echo form_error('fullname'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="ceo_name">CEO Name</label>
                            <input type="text" name="ceo_name"  class="form-control" id="ceo_name" placeholder="CEO Name" value="<?= !empty($user_details['ceo_name'])?$user_details['ceo_name']:set_value('ceo_name') ?>">
                            <span class="has-error"><?php echo form_error('ceo_name'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="username" >Username</label>
                            <input type="text" name="username"  class="form-control" id="username" placeholder="Username" value="<?= !empty($user_details['username'])?$user_details['username']:set_value('username') ?>" readonly>
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
                            <label class="control-label" for="landline_no">Landline number</label>
                            <input type="text" name="landline_no"  class="form-control" id="landline_no" placeholder="Landline number" value="<?= !empty($user_details['landline_no'])?$user_details['landline_no']:set_value('landline_no') ?>">
                            <span class="has-error"><?php echo form_error('landline_no'); ?></span>
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
                            <label class="control-label label-required" for="address">Address</label>
                            <input type="text" name="address"  class="form-control" id="address" placeholder="Address" value="<?= !empty($user_details['address'])?$user_details['address']:set_value('address') ?>">
                            <span class="has-error"><?php echo form_error('address'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="gst_number">GST Number</label>
                            <input type="text" name="gst_number" class="form-control" id="gst_number" placeholder="GST Number" value="<?= !empty($user_details['gst_number'])?$user_details['gst_number']:set_value('gst_number') ?>">
                            <span class="has-error"><?php echo form_error('gst_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="pancard_number">Pan Card Number</label>
                            <input type="text" name="pancard_number" class="form-control" id="pancard_number" placeholder="Pan Card Number" value="<?= !empty($user_details['pancard_number'])?$user_details['pancard_number']:set_value('pancard_number') ?>">
                            <span class="has-error"><?php echo form_error('pancard_number'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="story">Story</label>
                            <input type="text" name="story"  class="form-control" id="story" placeholder="Story" value="<?= !empty($user_details['story'])?$user_details['story']:set_value('story') ?>">
                            <span class="has-error"><?php echo form_error('story'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="is_visit_farm">Can we visit your farm</label>
                            <select class="form-control select2" name="is_visit_farm" id="is_visit_farm">
                                <option disabled="disabled" selected="selected">Select Options</option>
                                <option value="2" <?= $user_details['is_visit_farm'] == 2 ?'selected="selected"':''  ?> >Yes</option>
                                <option value="1" <?= $user_details['is_visit_farm'] == 1 ?'selected="selected"':''; ?>>No</option>
                            </select>
                            <span class="has-error"><?php echo form_error('is_visit_farm'); ?></span>
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
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="certification_id">Select Certification</label>
                            <select class="form-control select2" name="certification_id[]" id="certification_id">
                                <option disabled="disabled" selected="selected">Select Certification</option>
                                <?php foreach (getCertifications() as $key => $value) { 
                                        if(!empty($user_details['certification_id'])){
                                            $selected = $user_details['certification_id'] == $key?'selected="selected"':'';                                
                                        }else{
                                            $selected = '';
                                        }
                                ?>
                                    <option value="<?= $key ?>" <?= set_select('certification_id[]', $key); ?> <?= $selected?>><?= $value ?></option>
                                <?php } ?>
                            </select>
                            <?php if( true == isVal( $strUserCertificationName ) ){ ?>
                                    <p><?= $strUserCertificationName; ?></p>
                            <?php } ?>    
                            <span class="has-error"><?php echo form_error('certification_id[]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Certification Number</label>
                            <input type="text" name="certification_number" class="form-control" id="certification_number" placeholder="Certification Number" value="<?= !empty($user_details['certification_number'])?$user_details['certification_number']:set_value('certification_number') ?>">
                            <span class="has-error"><?php echo form_error('certification_number'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label label-required" for="total_farmer">Number of Farmer</label>
                            <select class="form-control select2" name="total_farmer" id="total_farmer">
                                <option disabled="disabled" selected="selected">Select Options</option>
                                <?php foreach (getTotalFarmer() as $key => $value) { 
                                        if(!empty($user_details['total_farmer'])){
                                            $selected = $user_details['total_farmer'] == $key?'selected="selected"':'';                                
                                        }else{
                                            $selected = '';
                                        }
                                ?>
                                    <option value="<?= $key ?>" <?= set_select('total_farmer', $key); ?> <?= $selected?>><?= $value ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('total_farmer'); ?></span>
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
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Crop Inspection Details</h3>
            </div>
            <div class="box-body">
                <?php if(!empty($user_crop_details)){ ?>
                    <?php foreach($user_crop_details as $val_crop){ 
                    ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="crop_id">Select Crop</label>
                                    <select class="form-control select2" name="Crop[crop_id][]" style="width:100%">
                                        <option disabled="disabled" selected="selected" >Select Crop</option>
                                        <?php foreach (getCropCategory() as $key_cat => $val_cat) { 
                                        ?>
                                            <optgroup label="<?= $val_cat ?>">
                                                <?php
                                                    foreach ($crop_list as $value) {
                                                        if ($value['crop_category_id'] == $key_cat) {
                                                            if(!empty($val_crop['crop_id'])){
                                                                $selected = $val_crop['crop_id'] == $value['id']?'selected="selected"':'';                                
                                                            }else{
                                                                $selected = '';
                                                            }
                                                ?>      
                                                        <option value="<?= $value['id'] ?>" <?= set_select('Crop[crop_id][]', $value['id']); ?> <?= $selected?>><?= $value['name'] ?></option>
                                                <?php }
                                            } ?>
                                            </optgroup>            
                                        <?php } ?>
                                    </select>
                                    <span class="has-error"><?php echo form_error('Crop[crop_id][]'); ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="Crop[area][]">Area (in acre's)</label>
<!--                                    <input type="text" name="Crop[area][]"  class="form-control" id="area" placeholder="Area (in acre's)" value="<?= !empty($val_crop['area'])?$val_crop['area']:set_value('Crop[area][]') ?>" maxlength="5" onkeypress="numberValidation(event)">-->
                                    <select class="form-control select2" name="Crop[area][]" style="width:100%">
                                        <option disabled="disabled" selected="selected" >Select Acre's</option>
                                        <?php foreach( getAreaInNumber() as $valArea ) { 
                                                $selected = '';
                                                if( !empty( $val_crop['area'] ) && $val_crop['area'] == $valArea  ) {
                                                    $selected = 'selected = "selected" ';
                                                }
                                        ?>
                                                <option value="<?= $valArea ?>" <?= set_select('Crop[area][]', $valArea); ?> <?= $selected; ?> ><?= $valArea ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="has-error"><?php echo form_error('Crop[area][]'); ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="Crop[date_sown][]">Date of Sown</label>
                                    <input type="text" name="Crop[date_sown][]" class="form-control picker-date pull-right" id="date_sown" placeholder="Date of Sown" value="<?= (!empty($val_crop['date_sown'])&& $val_crop['date_sown'] != '0000-00-00')?date('m/d/Y',strtotime($val_crop['date_sown'])):set_value('Crop[date_sown][]') ?>">
                                    <span class="has-error"><?php echo form_error('Crop[date_sown][]'); ?></span>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="Crop[date_harvest][]">Date of Harvest</label>
                                    <input type="text" name="Crop[date_harvest][]" class="form-control picker-date pull-right" id="date_harvest" placeholder="Date of Harvest" value="<?= (!empty($val_crop['date_harvest']) && $val_crop['date_harvest'] != '0000-00-00')?date('m/d/Y',strtotime($val_crop['date_harvest'])):set_value('Crop[date_harvest][]') ?>">
                                    <span class="has-error"><?php echo form_error('Crop[date_harvest][]'); ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="Crop[date_inspection][]">Date of Inspection</label>
                                    <input type="text" name="Crop[date_inspection][]" class="form-control picker-date pull-right" id="date_inspection" placeholder="Date of Inspection" value="<?= (!empty($val_crop['date_inspection'])&& $val_crop['date_inspection'] != '0000-00-00')?date('m/d/Y',strtotime($val_crop['date_inspection'])):set_value('Crop[date_inspection][]') ?>">
                                    <span class="has-error"><?php echo form_error('Crop[date_inspection][]'); ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="Crop[crop_condition][]">Crop Condition</label>
                                    <input type="text" name="Crop[crop_condition][]" class="form-control" id="crop_condition" placeholder="Crop Condition" value="<?= !empty($val_crop['crop_condition'])?$val_crop['crop_condition']:set_value('Crop[crop_condition][]') ?>">
                                    <span class="has-error"><?php echo form_error('Crop[crop_condition][]'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="Crop[other_details][]">Other Details</label>
                                    <input type="text" name="Crop[other_details][]" class="form-control" id="other_details" placeholder="Other Details" value="<?= !empty($val_crop['other_details'])?$val_crop['other_details']:set_value('Crop[other_details][]') ?>">
                                    <span class="has-error"><?php echo form_error('Crop[other_details][]'); ?></span>
                                </div>
                            </div>
                        </div>
                <?php } } ?>
                <div class="form-group crop-group-show">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="crop_id">Select Crop</label>
                            <select class="form-control select2" name="Crop[crop_id][]" style="width:100%">
                                <option disabled="disabled" selected="selected" >Select Crop</option>
                                <?php foreach (getCropCategory() as $key_cat => $val_cat) { ?>
                                    <optgroup label="<?= $val_cat ?>">
                                        <?php
                                            foreach ($crop_list as $value) {
                                            if ($value['crop_category_id'] == $key_cat) {
                                        ?>      
                                                <option value="<?= $value['id'] ?>" <?= set_select('Crop[crop_id][]', $value['id']); ?>><?= $value['name'] ?></option>
                                        <?php }
                                    } ?>
                                    </optgroup>            
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('Crop[crop_id][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[area][]">Area (in acre's)</label>
<!--                            <input type="text" name="Crop[area][]"  class="form-control" id="area" placeholder="Area (in acre's)" value="<?= set_value('Crop[area][]') ?>" maxlength="5" onkeypress="numberValidation(event)">-->
                            <select class="form-control select2" name="Crop[area][]" style="width:100%">
                                <option disabled="disabled" selected="selected" >Select Acre's</option>
                                <?php foreach( getAreaInNumber() as $valArea ) { ?>
                                        <option value="<?= $valArea ?>" <?= set_select('Crop[area][]', $valArea); ?> ><?= $valArea ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('Crop[area][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[date_sown][]">Date of Sown</label>
                            <input type="text" name="Crop[date_sown][]" class="form-control picker-date pull-right" id="date_sown" placeholder="Date of Sown" value="<?= set_value('Crop[date_sown][]') ?>">
                            <span class="has-error"><?php echo form_error('Crop[date_sown][]'); ?></span>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[date_harvest][]">Date of Harvest</label>
                            <input type="text" name="Crop[date_harvest][]" class="form-control picker-date pull-right" id="date_harvest" placeholder="Date of Harvest" value="<?= set_value('Crop[date_harvest][]') ?>">
                            <span class="has-error"><?php echo form_error('Crop[date_harvest][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[date_inspection][]">Date of Inspection</label>
                            <input type="text" name="Crop[date_inspection][]" class="form-control picker-date pull-right" id="date_inspection" placeholder="Date of Inspection" value="<?= set_value('Crop[date_inspection][]') ?>">
                            <span class="has-error"><?php echo form_error('Crop[date_inspection][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[crop_condition][]">Crop Condition</label>
                            <input type="text" name="Crop[crop_condition][]" class="form-control" id="crop_condition" placeholder="Crop Condition" value="<?= set_value('Crop[crop_condition][]') ?>">
                            <span class="has-error"><?php echo form_error('Crop[crop_condition][]'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[other_details][]">Other Details</label>
                            <input type="text" name="Crop[other_details][]" class="form-control" id="other_details" placeholder="Other Details" value="<?= set_value('Crop[other_details][]') ?>">
                            <span class="has-error"><?php echo form_error('Crop[other_details][]'); ?></span>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="control-label">Add</label>
                            <button type="button" class="btn btn-success add-crop-button"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="crop_count" id="crop-count" value="0">
                <div class=" form-group crop-group hide" id="template-crop">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="crop_id">Select Crop</label>
                            <select class="form-control crop-select-picker" name="Crop[crop_id][]" style="width:100%">
                                <option disabled="disabled" selected="selected" >Select Crop</option>
                                    <?php foreach (getCropCategory() as $key_cat => $val_cat) { ?>
                                    <optgroup label="<?= $val_cat ?>">
                                        <?php
                                            foreach ($crop_list as $value) {
                                                if ($value['crop_category_id'] == $key_cat) {
                                        ?>      
                                                <option value="<?= $value['id'] ?>" <?= set_select('Crop[crop_id][]', $value['id']); ?>><?= $value['name'] ?></option>
                                        <?php   
                                                }
                                            } 
                                        ?>
                                    </optgroup>            
                                    <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('Crop[crop_id][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[area][]">Area (in acre's)</label>
<!--                            <input type="text" name="Crop[area][]"  class="form-control" id="area" placeholder="Area (in acre's)" value="<?= set_value('Crop[area][]') ?>" maxlength="5" onkeypress="numberValidation(event)">-->
                            <select class="form-control" name="Crop[area][]" style="width:100%">
                                <option disabled="disabled" selected="selected" >Select Acre's</option>
                                <?php foreach( getAreaInNumber() as $valArea ) { ?>
                                        <option value="<?= $valArea ?>" <?= set_select('Crop[area][]', $valArea); ?> ><?= $valArea ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('Crop[area][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[date_sown][]">Date of Sown</label>
                            <input type="text" name="Crop[date_sown][]" class="form-control picker-date pull-right" id="date_sown" placeholder="Date of Sown" value="<?= set_value('Crop[date_sown][]') ?>">
                            <span class="has-error"><?php echo form_error('Crop[date_sown][]'); ?></span>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[date_harvest][]">Date of Harvest</label>
                            <input type="text" name="Crop[date_harvest][]" class="form-control picker-date pull-right" id="date_harvest" placeholder="Date of Harvest" value="<?= set_value('Crop[date_harvest][]') ?>">
                            <span class="has-error"><?php echo form_error('Crop[date_harvest][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[date_inspection][]">Date of Inspection</label>
                            <input type="text" name="Crop[date_inspection][]" class="form-control picker-date pull-right" id="date_inspection" placeholder="Date of Inspection" value="<?= set_value('Crop[date_inspection][]') ?>">
                            <span class="has-error"><?php echo form_error('Crop[date_inspection][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[crop_condition]">Crop Condition</label>
                            <input type="text" name="Crop[crop_condition][]" class="form-control" id="crop_condition" placeholder="Crop Condition" value="<?= set_value('Crop[crop_condition][]') ?>">
                            <span class="has-error"><?php echo form_error('Crop[crop_condition]'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[other_details][]">Other Details</label>
                            <input type="text" name="Crop[other_details][]" class="form-control" id="other_details" placeholder="Other Details" value="<?= set_value('Crop[other_details][]') ?>">
                            <span class="has-error"><?php echo form_error('Crop[other_details][]'); ?></span>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="control-label">Remove</label>
                            <button type="button" class="btn btn-danger" onclick="removeCropTemplate(this)"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Soil Details</h3>
            </div>
            <div class="box-body">
                <?php if(!empty($user_soil_details)){ 
                        foreach($user_soil_details as $val_soil){ 
                ?>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label" for="element">Select Element</label>
                                <select class="form-control" name="Soil[element][]" >
                                    <option disabled="disabled" selected="selected">Select Element</option>
                                    <?php foreach (getSoilElement() as $key => $value) { 
                                            if(!empty($val_soil['element'])){
                                                $selected = $val_soil['element'] == $key?'selected="selected"':'';                                
                                            }else{
                                                $selected = '';
                                            }
                                    ?>
                                        <option value="<?= $key ?>" <?= set_select('Soil[element][]', $key); ?> <?= $selected?>><?= $value ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label" for="percentage">Select Percentage</label>
                                <select class="form-control" name="Soil[percentage][]" >
                                    <option disabled="disabled" selected="selected">Select Percentage</option>
                                    <?php foreach (getSoilPercentage() as $key => $value) { 
                                            if(!empty($val_soil['percentage'])){
                                                $selected = $val_soil['percentage'] == $key?'selected="selected"':'';                                
                                            }else{
                                                $selected = '';
                                            }
                                    ?>
                                        <option value="<?= $key ?>" <?= set_select('Soil[percentage][]', $key); ?> <?= $selected?>><?= $value ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                <?php } } ?>
                <div class="row soil-group-show">
                    <div class="form-group col-md-4">
                        <label class="control-label" for="element">Select Element</label>
                        <select class="form-control" name="Soil[element][]" >
                            <option disabled="disabled" selected="selected">Select Element</option>
                            <?php foreach (getSoilElement() as $key => $value) { ?>
                                <option value="<?= $key ?>" <?= set_select('Soil[element][]', $key); ?>><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="percentage">Select Percentage</label>
                        <select class="form-control" name="Soil[percentage][]" >
                            <option disabled="disabled" selected="selected">Select Percentage</option>
                            <?php foreach (getSoilPercentage() as $key => $value) { ?>
                                <option value="<?= $key ?>" <?= set_select('Soil[percentage][]', $key); ?>><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Add</label>
                        <button type="button" class="btn btn-success add-soil-button"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <input type="hidden" name="soil_count" id="soil-count" value="0">
                <!-- The option field template containing an option field and a Remove button -->
                <div class="row soil-group hide" id="template-soil">
                    <div class="form-group col-md-4">
                        <label class="control-label" for="element">Select Element</label>
                        <select class="form-control soil-element" name="Soil[element][]">
                            <option disabled="disabled" selected="selected">Select Element</option>
                            <?php foreach (getSoilElement() as $key => $value) { ?>
                                <option value="<?= $key ?>" <?= set_select('Soil[element][]', $key); ?>><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="percentage">Select Percentage</label>
                        <select class="form-control soil-percentage" name="Soil[percentage][]" >
                            <option disabled="disabled" selected="selected">Select Percentage</option>
                            <?php foreach (getSoilPercentage() as $key => $value) { ?>
                                <option value="<?= $key ?>" <?= set_select('Soil[percentage][]', $key); ?>><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Remove</label>
                        <button type="button" class="btn btn-danger" onclick="removeSoilTemplate(this)"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class=" form-group">
                    <div class="form-group col-md-3">
                        <span class="has-error"><?php echo form_error('Soil[element][]'); ?></span>
                    </div>
                    <div class="form-group col-md-3">
                        <span class="has-error"><?php echo form_error('Soil[percentage][]'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Micro Nutrient Status</h3>
            </div>
            <div class="box-body">
                <?php if(!empty($user_micro_details)){ 
                        foreach($user_micro_details as $val_micro){ 
                ?>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="element">Select Element</label>
                            <select class="form-control" name="Micro[element][]" >
                                <option disabled="disabled" selected="selected">Select Element</option>
                                <?php foreach (getMicroElement() as $key => $value) { 
                                        if(!empty($val_micro['element'])){
                                            $selected = $val_micro['element'] == $key?'selected="selected"':'';                                
                                        }else{
                                            $selected = '';
                                        }
                                ?>
                                    <option value="<?= $key ?>" <?= set_select('Micro[element][]', $key); ?> <?= $selected?>><?= $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="percentage">Select Percentage</label>
                            <select class="form-control" name="Micro[percentage][]" >
                                <option disabled="disabled" selected="selected">Select Percentage</option>
                                <?php foreach (getMicroPercentage() as $key => $value) { 
                                        if(!empty($val_micro['percentage'])){
                                            $selected = $val_micro['percentage'] == $key?'selected="selected"':'';                                
                                        }else{
                                            $selected = '';
                                        }
                                ?>
                                    <option value="<?= $key ?>" <?= set_select('Micro[percentage][]', $key); ?> <?= $selected?>><?= $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                <?php } }?>
                <div class="row micro-group-show">
                    <div class="form-group col-md-4">
                        <label class="control-label" for="element">Select Element</label>
                        <select class="form-control" name="Micro[element][]" >
                            <option disabled="disabled" selected="selected">Select Element</option>
                            <?php foreach (getMicroElement() as $key => $value) { ?>
                                <option value="<?= $key ?>" <?= set_select('Micro[element][]', $key); ?>><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="percentage">Select Percentage</label>
                        <select class="form-control" name="Micro[percentage][]" >
                            <option disabled="disabled" selected="selected">Select Percentage</option>
                            <?php foreach (getMicroPercentage() as $key => $value) { ?>
                                <option value="<?= $key ?>" <?= set_select('Micro[percentage][]', $key); ?>><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Add</label>
                        <button type="button" class="btn btn-success add-micro-button"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <!-- The option field template containing an option field and a Remove button -->
                <div class="row micro-group hide" id="template-micro">
                    <div class="form-group col-md-4">
                        <label class="control-label" for="element">Select Element</label>
                        <select class="form-control" name="Micro[element][]" >
                            <option disabled="disabled" selected="selected">Select Element</option>
                            <?php foreach (getMicroElement() as $key => $value) { ?>
                                <option value="<?= $key ?>" <?= set_select('Micro[element][]', $key); ?>><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label" for="percentage">Select Percentage</label>
                        <select class="form-control" name="Micro[percentage][]" >
                            <option disabled="disabled" selected="selected">Select Percentage</option>
                            <?php foreach (getMicroPercentage() as $key => $value) { ?>
                                <option value="<?= $key ?>" <?= set_select('Micro[percentage][]', $key); ?>><?= $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="control-label">Remove</label>
                        <button type="button" class="btn btn-danger" onclick="removeMicroTemplate(this)"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class=" form-group">
                    <div class="form-group col-md-3">
                        <span class="has-error"><?php echo form_error('Micro[element][]'); ?></span>
                    </div>
                    <div class="form-group col-md-3">
                        <span class="has-error"><?php echo form_error('Micro[percentage][]'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Input and Organic Manure</h3>
            </div>
            <div class="box-body">
                <?php if( !empty( $userInputOrganicList ) ) { 
                        foreach( $userInputOrganicList as $valInputOrganic ){ 
                ?>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[input_date]">Date</label>
                            <input type="text" name="Input[input_date][]" class="form-control picker-date pull-right" id="input_date" placeholder="Date" value="<?= !empty($valInputOrganic['input_date'])?date('d/m/Y',strtotime($valInputOrganic['input_date'])):set_value('Input[input_date][]') ?>">
                            <span class="has-error"><?php echo form_error('Input[input_date][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[input_name]">Input Name</label>
                            <input type="text" name="Input[input_name][]" class="form-control" id="crop_condition" placeholder="Input Name" value="<?= !empty($valInputOrganic['input_name'])?$valInputOrganic['input_name']:set_value('Input[input_name][]')?>">
                            <span class="has-error"><?php echo form_error('Input[input_name][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[supplier_name]">Supplier Name</label>
                            <input type="text" name="Input[supplier_name][]" class="form-control" id="supplier_name" placeholder="Supplier Name" value="<?= !empty($valInputOrganic['supplier_name'])?$valInputOrganic['supplier_name']:set_value('Input[supplier_name][]')?>">
                            <span class="has-error"><?php echo form_error('Input[supplier_name][]'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[total_area]">Total Area (in acre's)</label>
<!--                            <input type="text" name="Input[total_area]"  class="form-control" id="area" placeholder="Total Area (in acre's)" value="<?= !empty($valInputOrganic['total_area'])?$valInputOrganic['total_area']:set_value('Input[total_area]') ?>" maxlength="5" onkeypress="numberValidation(event)">-->
                            <select class="form-control select2" name="Input[total_area][]" style="width:100%">
                                <option disabled="disabled" selected="selected" >Select Acre's</option>
                                <?php foreach( getAreaInNumber() as $valArea ) { 
                                        $selected = '';
                                        if( !empty( $valInputOrganic['total_area'] ) && $valInputOrganic['total_area'] == $valArea  ) {
                                            $selected = 'selected = "selected" ';
                                        }
                                ?>
                                        <option value="<?= $valArea ?>" <?= set_select('Input[total_area][]', $valArea); ?> <?= $selected; ?> ><?= $valArea ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('Input[total_area][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[other_details]">Other Details</label>
                            <input type="text" name="Input[other_details][]" class="form-control" id="other_details" placeholder="Other Details" value="<?= !empty($valInputOrganic['other_details'])?$valInputOrganic['other_details']:set_value('Input[other_details][]')?>">
                            <span class="has-error"><?php echo form_error('Input[other_details][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[inspector_name][]">Crop Inspector Name</label>
                            <input type="text" name="Crop[inspector_name][]" class="form-control" id="other_details" placeholder="Crop Inspector Name" value="<?= !empty($val_crop['inspector_name'])?$val_crop['inspector_name']:set_value('Crop[inspector_name][]')?>">
                            <span class="has-error"><?php echo form_error('Crop[inspector_name][]'); ?></span>
                        </div>
                    </div>
                <?php } } ?>
                <div class="form-group">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[input_date]">Date</label>
                            <input type="text" name="Input[input_date][]" class="form-control picker-date pull-right" id="input_date" placeholder="Date" value="<?= set_value('Input[input_date][]') ?>">
                            <span class="has-error"><?php echo form_error('Input[input_date][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[input_name]">Input Name</label>
                            <input type="text" name="Input[input_name][]" class="form-control" placeholder="Input Name" value="<?= set_value('Input[input_name][]')?>">
                            <span class="has-error"><?php echo form_error('Input[input_name][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[supplier_name]">Supplier Name</label>
                            <input type="text" name="Input[supplier_name][]" class="form-control" id="supplier_name" placeholder="Supplier Name" value="<?= set_value('Input[supplier_name][]')?>">
                            <span class="has-error"><?php echo form_error('Input[supplier_name][]'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[total_area]">Total Area (in acre's)</label>
<!--                                            <input type="text" name="Input[total_area]"  class="form-control" id="area" placeholder="Total Area (in acre's)" value="<?= set_value('Input[total_area]') ?>" maxlength="5" onkeypress="numberValidation(event)">-->
                            <select class="form-control select2" name="Input[total_area][]" style="width:100%">
                                <option disabled="disabled" selected="selected" >Select Acre's</option>
                                <?php foreach( getAreaInNumber() as $valArea ) { ?>
                                        <option value="<?= $valArea ?>" <?= set_select('Input[total_area][]', $valArea); ?>><?= $valArea ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('Input[total_area][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[other_details]">Other Details</label>
                            <input type="text" name="Input[other_details][]" class="form-control" id="other_details" placeholder="Other Details" value="<?= set_value('Input[other_details][]')?>">
                            <span class="has-error"><?php echo form_error('Input[other_details][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[inspector_name][]">Crop Inspector Name</label>
                            <input type="text" name="Crop[inspector_name][]" class="form-control" id="other_details" placeholder="Crop Inspector Name" value="<?= set_value('Crop[inspector_name][]')?>">
                            <span class="has-error"><?php echo form_error('Crop[inspector_name][]'); ?></span>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="control-label">Add</label>
                            <button type="button" class="btn btn-success js-add-input-organic-button"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="js-input-organic-count" value="0">
                <div class="form-group js-input-organic-group hide" id="js-template-input-organic">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[input_date][]">Date</label>
                            <input type="text" name="Input[input_date][]" class="form-control picker-date pull-right" placeholder="Date" value="<?= set_value('Input[input_date][]') ?>">
                            <span class="has-error"><?php echo form_error('Input[input_date][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[input_name][]">Input Name</label>
                            <input type="text" name="Input[input_name][]" class="form-control" id="js-input-name" placeholder="Input Name" value="<?= set_value('Input[input_name][]')?>">
                            <span class="has-error"><?php echo form_error('Input[input_name][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[supplier_name][]">Supplier Name</label>
                            <input type="text" name="Input[supplier_name][]" class="form-control" id="js-supplier-name" placeholder="Supplier Name" value="<?= set_value('Input[supplier_name][]')?>">
                            <span class="has-error"><?php echo form_error('Input[supplier_name][]'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[total_area][]">Total Area (in acre's)</label>
<!--                                            <input type="text" name="Input[total_area]"  class="form-control" id="area" placeholder="Total Area (in acre's)" value="<?= set_value('Input[total_area]') ?>" maxlength="5" onkeypress="numberValidation(event)">-->
                            <select class="form-control" name="Input[total_area][]" style="width:100%">
                                <option disabled="disabled" selected="selected" >Select Acre's</option>
                                <?php foreach( getAreaInNumber() as $valArea ) { ?>
                                        <option value="<?= $valArea ?>" <?= set_select('Input[total_area]', $valArea); ?>><?= $valArea ?></option>
                                <?php } ?>
                            </select>
                            <span class="has-error"><?php echo form_error('Input[total_area][]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Input[other_details]">Other Details</label>
                            <input type="text" name="Input[other_details][]" class="form-control" id="other_details" placeholder="Other Details" value="<?= set_value('Input[other_details]')?>">
                            <span class="has-error"><?php echo form_error('Input[other_details]'); ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Crop[inspector_name][]">Crop Inspector Name</label>
                            <input type="text" name="Crop[inspector_name][]" class="form-control" id="other_details" placeholder="Crop Inspector Name" value="<?= set_value('Crop[inspector_name][]')?>">
                            <span class="has-error"><?php echo form_error('Crop[inspector_name][]'); ?></span>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="control-label">Remove</label>
                            <button type="button" class="btn btn-danger" onclick="removeInputOrganicTemplate(this)"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>