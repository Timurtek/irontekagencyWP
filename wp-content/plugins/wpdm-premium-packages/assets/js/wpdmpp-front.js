
jQuery(function ($) {

    try { $('.ttip').tooltip(); } catch (e){}

    $('.price-variation').on('click', function () {

        var pid = $(this).data('product-id'), price;
        price = parseFloat($('#price-' + pid).html());
        $('.price-variation-' + pid).each(function () {
            if ($(this).attr('checked') == 'checked')
                price += parseFloat($(this).data('price'));
        });
        var pricehtml = "<i class='fa fa-shopping-cart'></i> Add to Cart <span class='label label-primary'>" + $('#total-price-' + pid).data('curr') + price + "<label>";

        $('#cart_submit').html(pricehtml);

    });

    $('.wpdm_cart_form').submit(function () {
        var btnaddtocart = $(this).find('.btn-addtocart');
        btnaddtocart.css('width', btnaddtocart.css('width'));
        btnaddtocart.attr('disabled', 'disabled');
        var form = $(this);
        var btnlbl = btnaddtocart.html();
        btnaddtocart.html('<i class="fa fa-refresh fa-spin"></i>');
        $(this).ajaxSubmit({
            success: function (res) {
                if (btnaddtocart.data('cart-redirect') == 'on') {
                    location.href = res;
                    return false;
                }
                //btnaddtocart.removeAttr('disabled');
                form.find('.btn-viewcart').remove();
                btnaddtocart.addClass('btn-wc');
                btnaddtocart.html('<i class="fa fa-check-circle"></i>').after('<a href="' + res + '" class="' + btnaddtocart.attr('class').replace('btn-addtocart', '') + ' btn-viewcart ttip" type="button" title="Cart">Checkout <i class="fa fa-long-arrow-right"></i></a>');
                $('.ttip').tooltip();
                window.postMessage("cart_updated", window.location.protocol + "//" + window.location.hostname);
            }
        });
        return false;
    });


    $('#checkoutbtn').click(function(){
        $(this).attr('disabled','disabled');
        $('#checkoutarea').slideDown();
    });

    $('#save-cart').on('click', function(){
        $(this).attr('disabled','disabled').html('<i class=\"fa fa-spinner fa-spin\"></i> Saving...');
        $.post(location.href, {action: 'wpdm_pp_ajax_call', execute: 'SaveCart'}, function(res){
            $('#wpdm-after-cart').html('<div class=\"panel panel-primary\"><div class=\"panel-body\"><div class=\"input-group\"><span class=\"input-group-addon\"><strong>".__("Saved Cart URL","wpdm-premium-package")."</strong></span><input type=text readonly=readonly style=\"background: #fff\" onclick=\"this.select()\" id=\"carturl\"  class=\"form-control group-item\" value=\"".wpdmpp_cart_page("savedcart=")."'+res+'\"></div></div><div class=\"panel-footer text-right\"><div class=\"input-group\"><span class=\"input-group-addon\"><i id=\"fae\" class=\"fa fa-envelope\"></i></span><input type=email class=\"form-control group-item\" id=\"cmail\" placeholder=\"".__("Email Address", "wpdm-premium-package")."\"><span class=\"input-group-btn\"><button id=\"email-cart\" style=\"width:140px\" type=button class=\"btn btn-primary\">".__("Email This Cart", "wpdm-premium-package")."</button></span></div></div></div></form>');
            $('#save-cart').html('<i class=\"fa fa-check-circle\"></i> Saved');
        })
    });

    $('body').on('click', '#email-cart', function(){
        $('#fae').removeClass('fa-envelope').addClass('fa-spinner fa-spin');
        $('#email-cart').attr('disabled','disabled').html('Sending...');
        $.post(location.href, {action: 'wpdm_pp_ajax_call', execute: 'EmailCart', email: jQuery('#cmail').val(), carturl: jQuery('#carturl').val()}, function(res){
            $('#fae').removeClass('fa-spinner fa-spin').addClass('fa-envelope');
            $('#email-cart').html('Sent');
        });
    });


    /* Delete Order */
    $('.delete_order').on('click',function(){
        var nonce = $(this).attr('nonce');
        var order_id = $(this).attr('order_id');
        var url = ajax_url;
        var th = $(this);
        jQuery('#order_'+order_id).fadeTo('0.5');
        if(confirm("Are you sure you want to delete this order ?")){
            $(this).html('<i class="fa fa-spinner fa-spin"></i>').css('outline','none');
            jQuery.ajax({
                type : "post",
                dataType : "json",
                url : url,
                data : {action: "wpdmpp_delete_frontend_order", order_id : order_id, nonce: nonce},
                success: function(response) {
                    if(response.type == "success") {
                        $('#order_'+order_id).slideUp();
                    }
                    else {
                        alert("Something went wrong during deleting...")
                    }
                }
            });
        }
        return false;
    });


    /* Checkout */
    //try { $('select#country').selectpicker(); }catch (err){ }


    $('#payment_form').submit(function(){
        $('#pay_btn').attr('disabled','disabled').html('<i class="fa fa-spin fa-spinner"></i>').css('outline','none');
        $('#wpdmpp-cart-form .btn').attr('disabled','disabled');
        $(this).ajaxSubmit({
            'url': '?task=paynow',
            'beforeSubmit':function(){
                //jQuery('#payment_w8').fadeIn();
            },
            'success':function(res){
                $('#paymentform').html(res);
                if(res.match(/error/)){
                    alert(res);
                }else{
                    $('#payment_w8').fadeOut();
                }
            }
        });
        return false;
    });
    $(".pm-list .list-group-item:first-child").addClass('active');
    $(".pm-list .list-group-item:first-child input[type=radio]").attr('checked','checked');
    $(".pm-list .list-group-item").on('click', function(){
        $('.pm-list .list-group-item').removeClass('active');
        $(this).addClass('active');
    });

    //if(document.getElementById('wpdm-after-cart') != undefined)
    //    populateCountryState();

    $('.calculate-tax').on('change', function () {
        var country = $('#country').val();
        var state = $('#region').val() != null ? $('#region').val() : $('#region-txt').val();

        $.get(ajax_url+'?action=gettax&country='+country+'&state=' + state, function (res) {
            //console.log(res);
            var tax_info = JSON.parse(res);
            $('#wpdmpp_cart_tax').text(tax_info.tax);
            $('#wpdmpp_cart_tax_total').text(tax_info.total);
            $('.cart-total-final').removeClass('hide');
            $('.cart-total-final').text( 'Total: ' + tax_info.total);
        });
    });

    $('body').on('change','#select-payment-method #country', function () {
        populateStates($(this).val());
    });


});


function populateCountryState() {

    var $ = jQuery;

    var dataurl = wpdmpp_base_url + '/assets/js/data/';

    var countries = [], states = [], countryOptions ="",  stateOptions ="", countrySelect = $('#country'), stateSelect = $('#region');

    $.getJSON(dataurl+'countries.json', function(data){
        $.each(data, function(i, country){
            countries[""+country.code] = country.filename;
            countryOptions += "<option value='"+country.code+"'>"+country.name+"</option>";
        });
        countrySelect.html(countryOptions);
    });
    countrySelect.change(function() {
        var countryCode = $(this).val();
        loadStates(countryCode);

    });

    function loadStates(countryCode){
        var filename = countries[countryCode];
        if(filename != undefined) {
            $('#region-txt').attr('disabled','disabled').hide();
            $('#region').removeAttr('disabled').show();
            $.getJSON(dataurl + 'countries/' + filename + '.json', function (data) {
                stateOptions = "";
                $.each(data, function (i, state) {
                    states["" + state.code] = state;
                    var scode = state.code.replace(countryCode + "-", "");
                    stateOptions += "<option value='" + scode + "'>" + state.name + "</option>";
                });
                stateSelect.html(stateOptions);
            });
        } else {
            $('#region').attr('disabled','disabled').hide();
            $('#region-txt').removeAttr('disabled').show();
        }

    }
}

function populateStates(countryCode){
    var $ = jQuery;

    var dataurl = wpdmpp_base_url + '/assets/js/data/';
    var countries = [], states = [], countryOptions ="",  stateOptions ="", countrySelect = $('#country'), stateSelect = $('#region'), filename = '';
    $.getJSON(dataurl+'countries.json', function(data){
        $.each(data, function(i, country){
            if(countryCode == country.code) {
                filename = country.filename;
            }

        });

        if(filename != undefined && filename != '') {
            $('#region-txt').attr('disabled','disabled').hide();
            $('#region').removeAttr('disabled').show();
            $.getJSON(dataurl + 'countries/' + filename + '.json', function (data) {
                stateOptions = "";
                $.each(data, function (i, state) {
                    states["" + state.code] = state;
                    var scode = state.code.replace(countryCode + "-", "");
                    stateOptions += "<option value='" + scode + "'>" + state.name + "</option>";
                });
                stateSelect.html(stateOptions);
            });
        } else {
            $('#region').attr('disabled','disabled').hide();
            $('#region-txt').removeAttr('disabled').show();
        }

    });
    
}




function  wpdmpp_pp_remove_cart_item(id){

    if(!confirm('Are you sure?')) return false;
    jQuery('#save-cart').removeAttr('disabled');
    jQuery('#cart_item_'+id+' *').css('color','#ccc');
    jQuery.post('?wpdmpp_remove_cart_item='+id ,function(res){
            var obj = jQuery.parseJSON(res);

            jQuery('#cart_item_'+id).fadeOut().remove();
            jQuery('#wpdmpp_cart_total').html(obj.cart_total);
            jQuery('#wpdmpp_cart_discount').html(obj.cart_discount);
            jQuery('#wpdmpp_cart_subtotal').html(obj.cart_subtotal); });
    return false;
}

function  wpdmpp_pp_remove_cart_item2(id,item){
    if(!confirm('Are you sure?')) return false;
    jQuery('#cart_item_'+id+'_'+item+' *').css('color','#ccc');
    jQuery.post('?wpdmpp_remove_cart_item='+ id + '&item_id='+item
        ,function(res){
            var obj = jQuery.parseJSON(res);
            jQuery('#save-cart').removeAttr('disabled');
            jQuery('#cart_item_'+id+'_'+item).fadeOut().remove();
            jQuery('#wpdmpp_cart_total').html(obj.cart_total);
            jQuery('#wpdmpp_cart_discount').html(obj.cart_discount);
            jQuery('#wpdmpp_cart_subtotal').html(obj.cart_subtotal); });
    return false;
}
