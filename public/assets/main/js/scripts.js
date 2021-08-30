$(document).ready(function (){
    let url,
        errorMsg = $('.errorMsg');


   $(window).on("scroll", function() {
    let scroll = $(window).scrollTop();
    if (scroll > 30) {
        $("header").addClass("fixed animated slideInDown");
    }
});

   $(".menu-bar").on("click", function(){
      $(this).toggleClass("active");
      $(".mobile-menu").toggleClass("active");
  });

   $(".mobile-menu ul ul").parent().addClass("menu-item-has-children");
   $(".mobile-menu ul li.menu-item-has-children > a").on("click", function() {
      $(this).parent().toggleClass("active").siblings().removeClass("active");
      $(this).next("ul").slideToggle();
      $(this).parent().siblings().find("ul").slideUp();
      return false;
  });

   $(".mobile-menu .menu-bar").on("click", function() {
      $("header .menu-bar").removeClass("active");
  });

    $('.select2').select2();


    $('.businessReg').submit(function (e) {
        e.preventDefault();
        url = $(this).prop('action');
        $.ajax({
            url: url,
            method: 'POST',
            data: $(this).serialize()
        }).done((response)=>{
            if(response.code == '200'){
                errorMsg.html('<p class="alert alert-success"><span class="fa fa-exclamation-circle"></span> '+ response.msg +' </p>');
            }else {
                errorMsg.html('<p class="alert alert-danger"><span class="fa fa-exclamation-circle"></span> '+ response.msg +' </p>');
            }
        });
    });
})
