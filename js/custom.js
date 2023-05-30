// ?php
//         # verifca se existe uma mensagem de erro enviada via GET.
//         # se sim, exibe a mensagem enviada no cabeçalho.
//         if(isset($_GET['error'])) { ?>
//             <script>
//                 Swal.fire({
//                 icon: 'error',
//                 title: 'Usuários',
//                 text: '<?=$_GET['error'] ?>',
//                 })
//             </script>
//     <?php } ?>

// Seleciona o link e a janela modal
// $(document).ready(function(){
// 	var modal = $("#modal");
// 	var fechar = $("a#fechar");

// 	fechar.click(function(){
// 		modal.hide();
//    });
// });

// <div id="modal">
//       <div id="fechaModal"><a href="#" id="fechar">  X </a></div>
// </dov>
// Seleciona o link e a janela modal

$(document).ready(function() {
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: false,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>Erro</small>';
			}
		}
	});
});