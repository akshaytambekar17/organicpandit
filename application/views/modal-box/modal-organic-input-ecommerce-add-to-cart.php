<div class="row">
    <div class="form-group col-md-4">
        <label class="control-label">Category</label>
        <input type="text"  class="form-control" value="<?= $arrEcommerceCategory[$arrOrganicInputEcommerceDetails['category_id']] ?>" readonly="readonly" >
        <input type="hidden" id="js-add-to-cart-category-id" value="<?= $arrOrganicInputEcommerceDetails['category_id'] ?>" >
    </div>
    <div class="form-group col-md-4">
        <label class="control-label">Sub Category</label>
        <input type="text"  class="form-control" value="<?= $arrEcommerceSubCategory[$arrOrganicInputEcommerceDetails['sub_category_id']] ?>" readonly="readonly" >
        <input type="hidden" id="js-add-to-cart-sub-category-id" value="<?= $arrOrganicInputEcommerceDetails['sub_category_id'] ?>" >
    </div>
    <div class="form-group col-md-4">
        <label class="control-label">Brand</label>
        <input type="text" class="form-control" value="<?= $arrOrganicInputEcommerceDetails['ecommerce_brand_id'] ?>" readonly="readonly" id="js-add-to-cart-brand">
    </div>

</div>

<div class="row">
    <div class="form-group col-md-4">
        <label>Quantity</label>
        <input type="number" class="form-control" placeholder="Quantity" id="js-add-to-cart-quantity" value="1" min="1">
    </div>
    <div class="form-group col-md-4">
        <label>Price</label>
        <input type="text" class="form-control" placeholder="Price" id="js-add-to-cart-price" value="<?= $arrOrganicInputEcommerceDetails['price']; ?> " readonly="readonly">
    </div>
</div>
<div class="clearfix"> </div>
<input type="hidden" id="js-add-to-cart-organic-input-ecommerce-id" value="<?= $arrOrganicInputEcommerceDetails['id'] ?>">