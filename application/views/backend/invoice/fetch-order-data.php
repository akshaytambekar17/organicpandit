<div class="js-order-data">                            
    <div class="row">
        <div class="form-group col-md-12">
            <label>User Type</label>
                <h4><?= $arrmixOrderDetails['user_type_name']?></h4>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label>Full Name</label>
            <h4><?= $arrmixOrderDetails['fullname']?></h4>
        </div>

        <div class="form-group col-md-4">
            <label>Mobile Number</label>
            <h4><?= $arrmixOrderDetails['mobile_no']?></h4>
        </div>

        <div class="form-group col-md-4">
            <label>Email Id</label>
            <h4><?= $arrmixOrderDetails['email_id']?></h4>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <label>Address</label>
            <h4><?= $arrmixOrderDetails['address']?></h4>
        </div>
        <div class="form-group col-md-4">
            <label>State</label>
            <h4><?= $arrmixOrderDetails['state_name']?></h4>
        </div>
        <div class="form-group col-md-4">
            <label>City</label>
            <h4><?= $arrmixOrderDetails['city_name']?></h4>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label>Pincode</label>
            <h4><?= $arrmixOrderDetails['pincode']?></h4>
        </div>

    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <h3>Product Details</h3>
        </div>
    </div>
    <?php if( true == isArrVal( $arrmixCartProductList['cart_product_list'] ) ) { 
            if( true == $arrmixCartProductList['is_cart_order_type_1'] ) {                                         
    ?>
                <h4>Buy Product</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </thead>
                        <tbody>
                            <?php foreach( $arrmixCartProductList['cart_product_list'] as $arrCartProductDetails ) {  
                                    if( true == isset( $arrmixCartProductList['is_cart_old_data'] ) || ( true == isset( $arrCartProductDetails['options']['cart_order_type'] ) && CART_ORDER_TYPE_1 == $arrCartProductDetails['options']['cart_order_type'] ) ) {
                            ?>  
                                        <tr>
                                            <td><?= $arrCartProductDetails['name'] ?></td>
                                            <td><?= $arrCartProductDetails['price'] ?></td>
                                            <td><?= $arrCartProductDetails['qty'] ?></td>                                                                
                                        </tr>        
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>    
            <?php } 
                if( true == $arrmixCartProductList['is_cart_order_type_2'] ) {
            ?>
                <h4>Organic Input-Ecommerce</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </thead>
                        <tbody>
                            <?php 
                                $arrEcommerceCategory = getEcommerceCategory();
                                $arrEcommerceSubCategory = getEcommerceSubCategory();
                                foreach( $arrmixCartProductList['cart_product_list'] as $arrCartProductDetails ) {  
                                    if( CART_ORDER_TYPE_2 == $arrCartProductDetails['options']['cart_order_type'] ) {
                            ?>  
                                        <tr>
                                            <td><?= $arrEcommerceCategory[$arrCartProductDetails['options']['category_id']] ?></td>
                                            <td><?= $arrEcommerceCategory[$arrCartProductDetails['options']['sub_category_id']] ?></td>
                                            <td><?= $arrCartProductDetails['options']['brand'] ?></td>
                                            <td><?= $arrCartProductDetails['price'] ?></td>
                                            <td><?= $arrCartProductDetails['qty'] ?></td>                                                                    
                                        </tr>        
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>    
            <?php } 
                if( true == $arrmixCartProductList['is_cart_order_type_3'] ) {
            ?>        
                <h4>Shop Products</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </thead>
                        <tbody>
                            <?php foreach( $arrmixCartProductList['cart_product_list'] as $arrCartProductDetails ) {  
                                    if( CART_ORDER_TYPE_3 == $arrCartProductDetails['options']['cart_order_type'] ) {
                            ?>  
                                        <tr>
                                            <td><?= $arrCartProductDetails['name'] ?></td>
                                            <td><?= $arrCartProductDetails['price'] ?></td>
                                            <td><?= $arrCartProductDetails['qty'] ?></td>
                                        </tr>        
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>    
    <?php } } ?>
    <br>
    <div class="row">
        <div class="form-group col-md-4">
            <label>Total Amount</label>
            <h4><?= $arrmixOrderDetails['total_amount']?></h4>
        </div>

        <div class="form-group col-md-4">
            <label>Payment Method</label>
            <h4><?= ( PAYMENT_METHOD_ONLINE == $arrmixOrderDetails['payment_method'] ) ? 'Online Payment' : 'Cash on Delivery' ?></h4>
        </div>

            <div class="form-group col-md-4">
                    <label>Online Payment Status</label>
                    <h4>
                        <?php
                            if( ORDER_PAYMENT_STATUS_COMPLETED == $arrmixOrderDetails['order_payment_status'] ){
                                echo 'Completed';
                            } else if( ORDER_PAYMENT_STATUS_USER_CANCELLED == $arrmixOrderDetails['order_payment_status'] ) {
                                echo 'User Cancelled';
                            } else {
                                echo 'Pending';
                            }
                        ?>
                    </h4>
            </div>

        <div class="form-group col-md-4">
            <label>Order Date</label>
            <h4><?= $arrmixOrderDetails['created_at'] ?></h4>
        </div>

    </div>
</div>
<input type="hidden" name="user_id" value="<?= $arrmixOrderDetails['user_id']?>">
<input type="hidden" name="order_number" value="<?= $arrmixOrderDetails['order_no']?>">
<div class="clearfix"> </div>      

