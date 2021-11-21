/*!
* Start Bootstrap - Shop Homepage v5.0.4 (https://startbootstrap.com/template/shop-homepage)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

$(document).on('click', '.dropdown-menu', function (e) {
    e.stopPropagation();
  });
  
  // make it as accordion for smaller screens
  if ($(window).width() < 992) {
    $('.dropdown-menu a').click(function(e){
      e.preventDefault();
        if($(this).next('.submenu').length){
          $(this).next('.submenu').toggle();
        }
        $('.dropdown').on('hide.bs.dropdown', function () {
       $(this).find('.submenu').hide();
    })
    });
  }

  $(document).ready(function(){
    $('.cre_vou_user').on('click', function(e){
      
      var id_post = $(this).data('post');
      var quantity = parseInt($(this).data('quantity'));
      
        $.ajax({
          url:  '/ajax-create-voucher/'+id_post,
          type: 'GET',
          
         }).done(function(result){
           $('#code_vou').text(result);
           $('.notifi_can_create').addClass('show');
           $('.notifi_can_create').css({'display':'block'});
          
         });
      
      
    })
    })
  