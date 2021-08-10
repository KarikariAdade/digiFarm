$(document).ready(function (){
   $(window).on("scroll", function() {
    var scroll = $(window).scrollTop();
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
})
