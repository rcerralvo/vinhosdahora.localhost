$( document ).ready(function() {

$('li').closest('ul').slideDown('normal');
	
$('#filtro > ul > li > a').click(function() {

  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
	
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $(this).closest('li').addClass('active');
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false;	
  }		
});
});