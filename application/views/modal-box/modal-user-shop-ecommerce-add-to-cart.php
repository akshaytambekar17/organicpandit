<div class="row">
    <div class="form-group col-md-4">
        <label class="control-label">Category</label>
        <input type="text"  class="form-control" value="<?= $arrUserEcommerceDetails['category_name'] ?>" readonly="readonly" >
        <input type="hidden" id="js-add-to-cart-category-id" value="<?= $arrUserEcommerceDetails['category_id'] ?>" >
    </div>
    <div class="form-group col-md-4">
        <label class="control-label">Product</label>
        <input type="text"  class="form-control" value="<?= $arrUserEcommerceDetails['product_name'] ?>" readonly="readonly" id="js-add-to-cart-product-name">
        <input type="hidden" id="js-add-to-cart-product-id" value="<?= $arrUserEcommerceDetails['product_id'] ?>" >
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        <label>Quantity</label>
        <input type="number" class="form-control" placeholder="Quantity" id="js-add-to-cart-quantity" value="1" min="1">
    </div>
    <div class="form-group col-md-4">
        <label>Price</label>
        <input type="text" class="form-control" placeholder="Price" id="js-add-to-cart-price" value="<?= $arrUserEcommerceDetails['price']; ?> " readonly="readonly">
    </div>
</div>
<div class="clearfix"> </div>
<input type="hidden" id="js-add-to-cart-user-ecommerce-id" value="<?= $arrUserEcommerceDetails['user_ecommerce_id'] ?>">