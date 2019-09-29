/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function validateEmail( strEmail ) {
    var strEmailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if( strEmailFormat.test( strEmail ) ) {
        return true;
    }else{
        return false;
    }
}

function validateMobileNumber( intMobileNumber ) {
    var strNumberFormat = /^\d{10}$/;
    if( strNumberFormat.test( intMobileNumber ) ) {
        return true;
    }else{
        return false;
    }

}

function validateQuantity( intQuantity ) {
    var strNumberFormat = /^\d{6}$/;
    if( strNumberFormat.test(intQuantity)){
        return true;
    }else{
        return false;
    }

}
function getDistrictByState( intStateId ){
    var intHiddenDistrictId = $("#js-hidden-district-id").val();
    $.ajax({
        type: "POST",
        url:  getBaseUrl() + 'fetch-district-list-by-state-id',
        data: { 'state_id' : intStateId, 'hidden_district_id' : intHiddenDistrictId },
        dataType: "html",
        success: function(result){
            var html = $.parseJSON(result);
            $("#js-district-id").html('<option disabled selected> Select District</option>');
            $("#js-district-id").append(html);
        }
    });
}

function fetchProductsByCategory( $intCategoryId ) {
    var intHiddenProductId = $( '#js-hidden-product-id' ).val();
    $.ajax({
        type: "POST",
        url: getBaseUrl() + "fetch-products-by-category-id",
        data: { 'category_id' : $intCategoryId, 'hidden_product_id' : intHiddenProductId },
        dataType: "html",
        success: function(result){
            var html = $.parseJSON(result);
            $("#js-product-id").html('<option disabled selected> Select Product</option>');
            $("#js-product-id").append(html);
        }
    });
}
