var mySwiper = new Swiper('.swiper-container', {
    speed: 400,
    spaceBetween: 300
  });
  
  var mySwiper = document.querySelector('.swiper-container').swiper;
  
$(document).ready(function() {
	var mayor = $('.NTT').eq(0).height(); // tomamos el valor primero como mayor
	// recorremos cada portada existente comparando su altura con la variable ya almacenada
	// si la altura almacenada es menor a la altura del loop se asigna nuevamente
	$('.NTT').each(function() {
	  if ($(this).height() > mayor) mayor = $(this).height();
	});
	// con la variable ya almacenada con el valor mayor se asigna a todas las variables
	$('.NTT').height(mayor);
  });
   
  $(document).ready(function() {
	var mayor = $('.NTT').eq(2).width(); // tomamos el valor primero como mayor
	// recorremos cada portada existente comparando su altura con la variable ya almacenada
	// si la altura almacenada es menor a la altura del loop se asigna nuevamente
	$('.NTT').each(function() {
	  if ($(this).width() > mayor) mayor = $(this).width();
	});
	// con la variable ya almacenada con el valor mayor se asigna a todas las variables
	$('.NTT').width(mayor);
  });
  