$(document).ready(function() {
	if(SESSION == ''){
		SESSION = null;
	}
  	var owl = $('.owl-carousel');
  	owl.owlCarousel({
  		center: true,
  		nav:true,
    	loop: true,
    	margin: 25,
    	responsive: {
	      	0: {
	        	items: 3
	      	},
	      	600: {
	        	items: 6
	      	},
	      	960: {
	        	items: 8
	      	},
	      	1200: {
	        	items: 10
	      	}
		}
	});
  	owl.on('mousewheel', '.owl-stage', function(e) {
    	if(e.deltaY > 0){
     		owl.trigger('next.owl');
    	}else{
      		owl.trigger('prev.owl');
    	}
    	e.preventDefault();
  	});
	$('.itemCat').on('click', function(){
		var idCat = $(this).attr('data-id');
		var nameCat = $(this).attr('data-name');
		$('#buscaCat').html(nameCat);
		$('#inputCategoria').attr('value', idCat);
	});
  	$('[data-toggle="tooltip"]').tooltip();


  	var mediaAvalie = $('.estrelas').attr('data-type');

	function avaliacao(mediaAvalie){
		resultAvalia = (Number(mediaAvalie)*20);
		$('.bg').css('width', 0);
		$('.bg').animate({width: resultAvalia+'%'},2500);
	}

  	$('.star').on('mouseover', function(){
  		var indice = $('.star').index(this);
  		$('.star').removeClass('full');
  		for(var i = 0; i <= indice; i++){
  			$('.star:eq('+i+')').addClass('full');
  		}
  		$('.bg').css('width', 0);
  	});

	$('.star').on('click', function(){
  		if(SESSION == null){
  			window.location.replace(BASE_URL+"/Login?error=5");
  		}else{
  			var idEmpresa = $(this).attr('data-id');
  			var idUser = $(this).attr('data-type');
  			var score = $(this).attr('id');
  			$.ajax({
  				url:BASE_URL+'/RequestAjax/verifyAvalie',
	            type:'POST',
	            dataType:'json',
	            data:{idUser:idUser, idEmpresa:idEmpresa},
	            success:function(json){
	            	$('#AvalieComentario').html(json.userAvalia.comment);
	            }
	        });
  			$('.reStar').html(score);
  			$('.btn_star').attr('data-id', ''+idEmpresa+'');
  			$('.btn_star').attr('data-type', ''+idUser+'');
  			$('.btn_star').attr('id', ''+score+'');
  		}
  	});
  	$('.btn_star').on('click', function(){
  		var comentario = $('#AvalieComentario').val();
  		var idEmpresa = $(this).attr('data-id');
		var idUser = $(this).attr('data-type');
  		var score = $(this).attr('id');
		$.ajax({
            url:BASE_URL+'/RequestAjax/avalie',
            type:'POST',
            dataType:'json',
            data:{idUser:idUser, idEmpresa:idEmpresa, score:score, comentario:comentario},
            success:function(json){
            	$('#msgAjax').html(json.msg);
            	$('.bd-example-modal-sm').modal('show');
            	avaliacao(mediaAvalie);
            }
        });
  	});
	avaliacao(mediaAvalie);
});
var adreess = $('.EddressEmp').text();
var map;
function initMap() {
    $.ajax({
            url:'https://maps.googleapis.com/maps/api/geocode/json?address='+adreess+'&key=AIzaSyBgr57MCWUMgBxLF6AZ_Bw5a_5RQjRNg_0',
            type:'GET',
            dataType:'json',
            data:{adreess},
            success:function(json){
            	if(json.status != 'ZERO_RESULTS'){
					var local = {lat: json.results[0].geometry.location.lat, lng: json.results[0].geometry.location.lng};
					var proxim = 17
            	}else{
					var local = {lat: -15.0696984, lng: -52.4115288};
					var proxim = 2
            	}
				// The map, centered at Uluru
				var map = new google.maps.Map(
					document.getElementById('map'), {
						zoom: proxim, 
						center: local
					});
				// The marker, positioned at Uluru
				var marker = new google.maps.Marker({position: local, map: map});
            }
    });
}