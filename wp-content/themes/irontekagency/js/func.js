$(document).ready(function() {

  // $(function(){ $('[data-toggle="tooltip"]').tooltip();});
  // $('.tooltips').tooltip();

    var loader = '<div class="load-wrapp"><div class="load-9"><div class="spinner"><div class="bubble-1"></div><div class="bubble-2"></div><div class="bubble-3"></div></div></div></div>';
  //Ajax Load
  $.ajaxSetup({cache:false});
  $(".gray_content").click(function(){
    var post_link = $(this).attr("href");
    $("#single-gray-ajax").removeClass('hide');
    $("#single-gray-ajax .container").html(loader);
    $("#single-gray-ajax .container").load(post_link);
    return false;
  });

  $(".search-link").click(function(){
    $('#search-pop').removeClass('hide');
    $('#search-pop #searchform #s').focus();
    return false;
  });
  $("#search-pop a.close-pop").click(function(){
    $('body').removeClass('noScroll');
    $("#search-pop").addClass('hide');
    return false;
  });

  $(".report-post").click(function(){
    $('#report-post-pop').removeClass('hide');
    return false;
  });
  $("#report-post-pop a.close-pop").click(function(){
    $('body').removeClass('noScroll');
    $("#report-post-pop").addClass('hide');
    return false;
  });


  //Services
  var firstlink = $('.services_cat_btn select option:first-child').attr('link');
  $("#packages_area").html(loader);
  $("#packages_area").load(firstlink);

  $(".services_cat_btn select ").on('change',function(){
    var post_link = $('option:selected', this).attr('link');
    $("#packages_area").html('');
    $("#packages_area").html(loader);
    $("#packages_area").load(post_link);
    return false;
  });
  //Gray Content close
  $("#single-gray-ajax a.close-pop").click(function(){
    $("#single-gray-ajax").addClass('hide');
    return false;
  });
  $("#contact-us a.close-pop").click(function(){
    $('body').removeClass('noScroll');
    $("#contact-us").addClass('hide');
    return false;
  });
  $(".say-hi").click(function(){
    $('body').addClass('noScroll');
    $("#contact-us").removeClass('hide');
    return false;
  });
  //scrollTo
  $(".hire-us").click(function() {
    $('html, body').animate({
        scrollTop: $("#services_category_list").offset().top - 60
    }, 800);
    return false;
});

});
$(document).on('keyup',function(evt) {
    if (evt.keyCode == 27) {
      $('.pop').addClass('hide');
      $('body').removeClass('noScroll');
    }
});
