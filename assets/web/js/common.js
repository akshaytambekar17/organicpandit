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

function numberValidation( objEvent ){
    if( ( objEvent.which != 46 || $( this ).val().indexOf('.') != -1 ) && ( objEvent.which < 48 || objEvent.which > 57 )  && objEvent.which != 8 ) {
        objEvent.preventDefault();
    }
}

function getCitiesByState( intStateId ) {
    var intHiddenCityId = $("#js-hidden-city-id").val();
    $.ajax({
        type: "POST",
        url:  getBaseUrl() + 'fetch-cities-by-state-id',
        data: { 'state_id' : intStateId, 'hidden_city_id' : intHiddenCityId },
        dataType: "html",
        success: function(result){
            var html = $.parseJSON(result);
            $( "#js-city-id" ).html('<option disabled selected> Select City</option>');
            $( "#js-city-id" ).append(html);
        }
    });
}

function getStatesByCountry( intCountryId ) {
    var intHiddenStateId = $("#js-hidden-state-id").val();
    $.ajax({
        type: "POST",
        url:  getBaseUrl() + 'fetch-states-by-country-id',
        data: { 'country_id' : intCountryId, 'hidden_state_id' : intHiddenStateId },
        dataType: "html",
        success: function( objResult ){
            var strHtml = $.parseJSON( objResult );
            $( "#js-state-id" ).html( '<option disabled selected> Select State</option>' );
            $( "#js-state-id" ).append( strHtml );
            
            $( '#js-city-id').html('');
            $( '#js-city-id').append( '<option disabled selected> Select City</option>' );
        }
    });
}

function getFrontendCitiesByState( intStateId ) {
    var intHiddenCityId = $("#js-hidden-city-id").val();
    $.ajax({
        type: "POST",
        url:  getBaseUrl() + 'fetch-frontend-cities-by-state-id',
        data: { 'state_id' : intStateId, 'hidden_city_id' : intHiddenCityId },
        dataType: "html",
        success: function(result){
            var html = $.parseJSON(result);
            $( "#js-city-id" ).html('<option disabled selected> Select City</option>');
            $( "#js-city-id" ).append(html);
        }
    });
}

function getFrontendStatesByCountry( intCountryId ) {
    var intHiddenStateId = $("#js-hidden-state-id").val();
    $.ajax({
        type: "POST",
        url:  getBaseUrl() + 'fetch-frontend-states-by-country-id',
        data: { 'country_id' : intCountryId, 'hidden_state_id' : intHiddenStateId },
        dataType: "html",
        success: function( objResult ){
            var strHtml = $.parseJSON( objResult );
            $( "#js-state-id" ).html( '<option disabled selected> Select State</option>' );
            $( "#js-state-id" ).append( strHtml );
            
            $( '#js-city-id').html('');
            $( '#js-city-id').append( '<option disabled selected> Select City</option>' );
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
