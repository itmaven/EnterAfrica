$(document).ready(function () {
  $('#sd-nav > li > a').click(function(){
    if ($(this).attr('class') != 'active'){
      $('#sd-nav li ul').slideUp();
      $(this).next().slideToggle();
      $('#sd-nav li a').removeClass('active');
      $(this).addClass('active');
    }
  });
});