var App = function(){

	var editaEmp = function(){

		$('.editaEmp').on('click',function(){

			var id = $(this).attr('data-id');

			abre = new Array();
			fecha = new Array();

			$('.update-empresa').show();

			$.ajax({
				type:'POST',
				url:BASE_URL+'/RequestAjax/ajaxGetEmpresa',
				data:{id:id},
				dataType: 'json',
				success: function(res){
					if(res.error == 0){
						
						if(res.abre != null){
							abre = res.abre.split(',');
						}
						if(res.fecha != null){
							fecha = res.fecha.split(',');
						}
						$('.abre-atd').html('');
						$('.fecha-atd').html('');

						$('.update-empresa .box-title').html(res.razaoSocial);
						$('input[name="id"]').val(res.id);
						$('input[name="id_user"]').val(res.idUser);
						$('input[name="id_bairro"]').val(res.idBairro);
						$('input[name="id_cidade"]').val(res.idCidade);
						$('input[name="id_endereco"]').val(res.idEndereco);
						$('input[name="id_cep"]').val(res.idCep);
						$('input[name="id_estado"]').val(res.idEstado);
						$('input[name="nomeFantasia"]').val(res.nomeFantasia);
						$('input[name="telefone"]').val(res.telefoneFixo);
						$('input[name="celular"]').val(res.celular);
						$('input[name="cep"]').val(res.cep);
						$('input[name="endereco"]').val(res.endereco);
						$('input[name="numeroEndereco"]').val(res.numeroEndereco);
						$('input[name="bairro"]').val(res.bairro);
						$('input[name="cidade"]').val(res.cidade);
						if(res.siglaEstado){
							$('#estado option:selected').val(res.siglaEstado).text(res.estado);
						}

						if(res.abre != null){
							for (var i = 0; i < 7; i++) {
								$('.abre-atd').append('<input maxlength="2" type="text" name="abre[]" class="form-control" value="'+abre[i]+'">')
							}
						}else{
							for (var i = 0; i < 7; i++) {
								$('.abre-atd').append('<input maxlength="2" type="text" name="abre[]" class="form-control" placeholder="00">')
							}
						}

						if(res.fecha != null){
							for (var i = 0; i < 7; i++) {
								$('.fecha-atd').append('<input type="text" name="fecha[]" class="form-control" value="'+fecha[i]+'">')
							}
						}else{
							for (var i = 0; i < 7; i++) {
								$('.fecha-atd').append('<input type="text" name="fecha[]" class="form-control" placeholder="00">')
							}
						}		

					}
				}
			});
		});

	}

	var closeEditEmp = function(){
		$('.closeUpdateEmpresa').on('click',function(){
			$('.update-empresa').hide();
		});
	}

	var updateEmp = function(){
		//debugger;

		let form = $('form[name="update-empresa"]');

		form.submit(function(){
			$(this).ajaxSubmit({
				url: BASE_URL+'/RequestAjax/ajaxUpdateEmp',
				dataType: 'json',
				success: function(data){
					alert(data.msg);					
					setTimeout(function(){
						$('.update-empresa').hide();
					},1000);
				}
			});
			return false;
		});

	}


	return {
		init: function(){
			editaEmp();
			updateEmp();
			closeEditEmp();
		}
	}

}();

jQuery(document).ready(function(){
	App.init();
});
