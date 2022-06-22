//memanggil atribut page-scroll pada saat on click memanggil funsi
$('.page-scroll').on('click', function(e){
	//mengambil nilai href yg di click
	var href =$(this).attr('href');
	//tangkap isi elemen href
	var elemenHref = $(href);

	$('html,body').animate({
		scrollTop: elemenHref.offset().top - 50
	}, 1000);
	e.preventDefault();
});

// $("document").ready(function() {
//      $("#href").click(function() {
//           $.smoothScroll({ scrollTarget: "#page-scroll", });
//      });
// });