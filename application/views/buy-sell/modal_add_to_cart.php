<div class="row">
    <div class="form-group col-md-3">
        <label class="control-label label-required">Category Name</label>
        <input type="text"  class="form-control" placeholder="Category" readonly="readonly" id="js-add-to-cart-category" value="<?= $arrSellProductDetails['category_name'] ?>" >
    </div>

    <div class="form-group col-md-3">
        <label class="control-label label-required">Product Name</label>
        <input type="text"  class="form-control" placeholder="Product" readonly="readonly" id="js-add-to-cart-product" value="<?= $arrSellProductDetails['product_name'] ?>" data-product_id="<?= $arrSellProductDetails['product_id'] ?>"  >
    </div>

</div>

<div class="row">
    <div class="form-group col-md-4">
        <label>Quantity (in Kg)</label>
        <input type="text" class="form-control" placeholder="Price" readonly="readonly" id="js-add-to-cart-sell-quantity" value="<?= $arrSellProductDetails['sell_quantity'] ?>">
    </div>
    <div class="form-group col-md-4">
        <label>Expected Price (per Kg)</label>
        <input type="text" class="form-control" placeholder="Expected Price" readonly="readonly" id="js-add-to-cart-expected-price" value="<?= $arrSellProductDetails['price']; ?> " >
    </div>
    <div class="form-group col-md-4">
        <label>Total Price</label>
        <h4 id="js-add-to-cart-price" data-total_price="<?= $arrSellProductDetails['total_price']; ?>"><?= $arrSellProductDetails['total_price'] ?></h4>
        <!--<input type="text" class="form-control" placeholder="Price" readonly="readonly" id="js-add-to-cart-price" value="<?/*= $arrSellProductDetails['total_price']*/?>">-->
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <label>Delivery Location</label>
        <h4><?= $strDeliveryLocation ?></h4>
    </div>
</div>

<div class="clearfix"> </div>
<input type="hidden" id="js-add-to-cart-sell-product-id" value="<?= $arrSellProductDetails['sell_product_id'] ?>">



