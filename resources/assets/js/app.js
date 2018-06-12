
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

function displayErrors(errors, form){
  $.each(errors, function(input, msg) {
      var erroMsg = $('#'+input).parents('.form-group').find('.erros').text(msg);
      erroMsg.slideDown('fast');
  });
}

require('./bootstrap');
require('./jquery.datetimepicker.js');
require('../../../node_modules/jquery.easing/jquery.easing.min.js');~
require('./admin');


$('.date-field').datetimepicker({
    lang: 'pt-BR',
    i18n: {
        pt: {
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            dayOfWeek: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D']
        }
    },
    timepicker:false,
    format: 'd/m/Y',
    closeOnDateSelect: true
});

$(".custom-file-input").on('change', function(){
    var name = $(this).val();
    var id = $(this).attr('id');
    $(this).parent('div').find('label').text(name);

    if($("#"+id+"_nome").length){
      $("#"+id+"_nome").val(name);
    }
});

$(".navbar-toggler").on('click',function(){
    $('.side-menu-wrapper').fadeToggle('fast');
    $('.side-menu').toggleClass('active');
});
$('.side-menu-wrapper').on('click',function(){
    $(this).fadeOut('fast');
    $('.side-menu').removeClass('active');
}).on("click", ".side-menu", function(event){
  event.stopPropagation();
});;

// Smooth scrolling using jQuery easing
$('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 70)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Scroll to top button appear
  $(document).scroll(function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 80
  });

  // Collapse Navbar
  if($('#mainNav').length){
    var navbarCollapse = function() {
      if ($("#mainNav").offset().top > 100) {
        $("#mainNav").addClass("navbar-shrink");
      } else {
        $("#mainNav").removeClass("navbar-shrink");
      }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);
  }
  

  // Floating label headings for the contact form
  $(function() {
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
      $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
      $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
      $(this).removeClass("floating-label-form-group-with-focus");
    });
  });

  //Send contact e-mail

  $('#enviarContato').on('click', function(e){
    e.preventDefault();

    var btn = $(this);

    $('#success-mensagem').slideUp('fast');

    btn.attr("disabled", true);

    var form = btn.parents('form');
    var formName = btn.parents('form').attr('name');
    var formData = new FormData($('form[name=' + formName + ']')[0]);
    var action = form.attr('action');

    form.find('.erros').slideUp('fast');
    form.find('.progress').slideDown();

    $.ajax({
        type: "POST",
        url: action,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        async: true,
        data: formData,
        processData: false,
        contentType: false,
        success: function() {
            $('#success-mensagem').slideDown('fast');
        },
        error: function(response) {
            displayErrors(response.responseJSON.errors, form);
        },
        complete: function() {
            form.find('.progress').slideUp();
            btn.attr("disabled", false);
        }
    });
  });