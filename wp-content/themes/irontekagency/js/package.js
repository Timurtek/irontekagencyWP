function empty_form(){
  var inputs = $('#package-contact input[type="text"],#package-contact input[type="email"],#package-contact input[type="tel"],#package-contact input[type="file"],#package-contact textarea');
  inputs.val('');
}

$(document).ready(function(){

  $('#package-contact a.close-pop').click(function(){
    $('#package-contact').addClass('hide');
    $('#package_div .ts-service-img').html('');
    $('body').removeClass('noScroll');
    empty_form();
    return false;
  });

$('a.package-select').click(function(){
    $('body').addClass('noScroll');
    var data = $(this).data("id");
		package_select(data);
    package_contact();
    var package_div = $(this).closest('.ts-service-img').html();
    $('#package_div .ts-service-img').append(package_div);

    return false;
  });
$('#package-contact a.add_files').click(function(){
  alert('asdasdaasda');
  return false;
});
  //Package select
  function package_select(data){
    var formSelect = $(".wpcf7-form-control.wpcf7-select");
    if(data=="branding-topaz"){
      formSelect.val('Branding - Topaz');
    }else if(data=="branding-ruby"){
      formSelect.val('Branding - Ruby');
    }else if(data=="branding-sapphire"){
      formSelect.val('Branding - Sapphire');
    }else if(data=="branding-emerald"){
      formSelect.val('Branding - Emerald');
    }else if(data=="webdesign-topaz"){
      formSelect.val('Web Design - Topaz');
    }else if(data=="webdesign-ruby"){
      formSelect.val('Web Design - Ruby');
    }else if(data=="webdesign-sapphire"){
      formSelect.val('Web Design - Sapphire');
    }else if(data=="webdesign-emerald"){
      formSelect.val('Web Design - Emerald');
    }else if(data=="landing-topaz"){
      formSelect.val('Landing Page - Topaz');
    }else if(data=="landing-ruby"){
      formSelect.val('Landing Page - Ruby');
    }else if(data=="landing-sapphire"){
      formSelect.val('Landing Page - Sapphire');
    }else if(data=="landing-emerald"){
      formSelect.val('Landing Page - Emerald');
    }else if(data=="email-topaz"){
      formSelect.val('Email Marketing - Topaz');
    }else if(data=="email-ruby"){
      formSelect.val('Email Marketing - Ruby');
    }else if(data=="email-sapphire"){
      formSelect.val('Email Marketing - Sapphire');
    }else if(data=="email-emerald"){
      formSelect.val('Email Marketing - Emerald');
    }else if(data=="campaign-topaz"){
      formSelect.val('Campaign - Topaz');
    }else if(data=="campaign-ruby"){
      formSelect.val('Campaign - Ruby');
    }else if(data=="campaign-sapphire"){
      formSelect.val('Campaign - Sapphire');
    }else if(data=="campaign-emerald"){
      formSelect.val('Campaign - Emerald');
    }
  }

  function package_contact(){
    $('#package-contact').removeClass('hide');
  }
});

$(document).on('keyup',function(evt) {
    if (evt.keyCode == 27) {
      empty_form();
      $('.pop').addClass('hide');
      $('#package_div .ts-service-img').html('');
      $('body').removeClass('noScroll');
    }
});
