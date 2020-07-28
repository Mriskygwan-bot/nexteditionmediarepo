(function($){
  $(function(){

    $('.sidenav').sidenav();
    $('.collapsible').collapsible();
    $('.carousel').carousel();

    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        duration: 300,
        numVisible: 1,
        dist: -200
    });

    $('.modal').modal();
  });
})(jQuery);
