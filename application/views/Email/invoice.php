<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
<html> 
    <head> 
        <title>Invoice</title> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
        <meta name="viewport" content="width=device-width" />
    </head> 
    <body>
        <h4>Hi <?php echo $arrmixOrderDetails['fullname'] ?>,</h4>
        <br>
        <h1>Thank you for shopping with us. Please find the below Invoice details</h1>
        <div class="row" style="margin-right: -15px;margin-left: -15px;">
            <div class="form-group col-md-4" style="margin-bottom: 15px;width: 33.33333333%;float: left;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                <label>Full Name</label>
                <h4><?= $arrmixOrderDetails['fullname']?></h4>
            </div>

            <div class="form-group col-md-4" style="margin-bottom: 15px;width: 33.33333333%;float: left;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                <label>Mobile Number</label>
                <h4><?= $arrmixOrderDetails['mobile_no']?></h4>
            </div>

            <div class="form-group col-md-4" style="margin-bottom: 15px;width: 33.33333333%;float: left;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                <label>Email Id</label>
                <h4><?= $arrmixOrderDetails['email_id']?></h4>
            </div>
        </div>
        <div class="row" style="margin-right: -15px;margin-left: -15px;">
            <div class="form-group col-md-4" style="margin-bottom: 15px;width: 33.33333333%;float: left;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                <label>Address</label>
                <h4><?= $arrmixOrderDetails['address']?></h4>
            </div>
            <div class="form-group col-md-4" style="margin-bottom: 15px;width: 33.33333333%;float: left;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                <label>State</label>
                <h4><?= $arrmixOrderDetails['state_name']?></h4>
            </div>
            <div class="form-group col-md-4" style="margin-bottom: 15px;width: 33.33333333%;float: left;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                <label>City</label>
                <h4><?= $arrmixOrderDetails['city_name']?></h4>
            </div>
        </div>
        <div class="row" style="margin-right: -15px;margin-left: -15px;">
            <div class="form-group col-md-4" style="margin-bottom: 15px;width: 33.33333333%;float: left;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                <label>Pincode</label>
                <h4><?= $arrmixOrderDetails['pincode']?></h4>
            </div>

        </div>
        <div class="row" style="margin-right: -15px;margin-left: -15px;">
            <div class="form-group col-md-4" style="margin-bottom: 15px;width: 33.33333333%;float: left;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                <h3>Product Details</h3>
            </div>
        </div>
    </body>    
</html>    
   
