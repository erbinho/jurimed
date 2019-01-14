$(function(){
	$('[data-toggle="tooltip"]').tooltip();

	$('.carousel').carousel({
	  interval: 20000
	});

	$('#area-login').on('click', function(){
		$('.box-login').slideDown();
	});
	
	$('.fecharAreaLogin').on('click', function(){
		$('.box-login').slideUp();
	});

 	$('.sender_repeat').on('keyup', function(){
		var pass_repeat = $(this).val();
		var pass        = $('.sender_new').val();
		if(pass_repeat == pass){
			$('.send_btn').removeAttr('disabled');
			$('.send-area-btn').empty();
		}else{
			$('.send_btn').attr('disabled', '');
			html = '<div class="alert alert-warning" role="alert">Senhas não estão Iguais!</div>';
			$('.send-area-btn').html(html);
		}
	});

	$('.sender_new').on('keyup', function(){
		var pass_repeat = $(this).val();
		var pass        = $('.sender_repeat').val();
		if(pass_repeat == pass){
			$('.send_btn').removeAttr('disabled');
			$('.send-area-btn').empty();
		}else{
			$('.send_btn').attr('disabled', '');
			html = '<div class="alert alert-warning" role="alert">Senhas não estão Iguais!</div>';
			$('.send-area-btn').html(html);
		}
	});

	var $w = $(window);
	$w.on("scroll", function(){
	   if( $w.scrollTop() > 30 ) {
	   	   $('.menu-start').addClass('menu-scroll');
	   }else{
	   	   $('.menu-start').removeClass('menu-scroll');
	   }
	});

	/*---- AREA DE MASCARAS EM IMPUT ----- */
	$('input[name="cpf"]').mask("999.999.999-99");
    $('input[name="cpf"]').on('focusin', function(){
        $(this).mask("999.999.999-99");
        $('.msgAlert').slideDown();
    });
    $('input[name="cpf"]').on('blur', function(){
        $(this).unmask();
        $('.msgAlert').slideUp();
    });

    
    $('#inputCPF').on('keyup', function(){
    	var value = validarCPF();
    	if(value != false){
    		html = '<div class="alert alert-success" role="alert">';
            html += 	'O CPF digitado é <a href="#" class="alert-link">Válido</a>.';
            html +='</div>';
            $('.msgAlert').html(html);
            $('.msgAlert').slideDown();
    	}else{
    		html = '<div class="alert alert-warning" role="alert">';
            html += 	'O CPF digitado é <a href="#" class="alert-link">Inválido</a>.';
            html +='</div>';
            $('.msgAlert').slideDown();
            $('.msgAlert').html(html);
    	}
    });
});