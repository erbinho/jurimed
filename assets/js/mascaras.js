$(function(){

    // CAMPOS DO TIPO CPF
    $('input[name="cpfUser"]').on('focusin', function(){
        $(this).mask("000.000.000-00");
    });
    $('input[name="cpfUser"]').on('blur', function(){
        $(this).unmask();
    });

    // CAMPOS DO TIPO RG
    $('input[name="rgUser"]').on('focusin', function(){
        $(this).mask("00.000.000-0");
    });
    $('input[name="rgUser"]').on('blur', function(){
        $(this).unmask();
    });


    // CAMPOS DO TIPO TELEFONE FIXO CELULAR
    var behavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
    },
    options = {
        onKeyPress: function (val, e, field, options) {
            field.mask(behavior.apply({}, arguments), options);
        }
    };
    $('input[name="foneFixo"]').mask(behavior, options);
    $('input[name="foneCel"]').mask(behavior, options);

    // CAMPOS DO TIPO CEP
    $('input[name="cepUser"]').mask("00000-000");

    





























	// CAMPOS DO TIPO CNPJ
    $('input[name="cnpj"]').mask("00.000.000/0000-00");
    $('input[name="cnpj"]').on('focusin', function(){
        $(this).mask("00.000.000/0000-00");
    });
    $('input[name="cnpj"]').on('blur', function(){
        $(this).unmask();
    });

	// CAMPOS DO TIPO CPF
    $('input[name="cpf"]').mask("000.000.000-00");
    $('input[name="cpf"]').on('focusin', function(){
        $(this).mask("000.000.000-00");
    });
    $('input[name="cpf"]').on('blur', function(){
        $(this).unmask();
    });

	// CAMPOS DO TIPO DATANASCIMENTO
//	$('input[name="datanas"],'+
//	  'input[name="clientedesde"],'+
//	  'input[name="empdesde"],'+
//	  'input[name="data_aso"],'+
//	  'input[name="data_exa_a_d"],'+
//	  'input[name="data_exa_c_d"],'+
//	  'input[name="data_exa_d_d"],'+
//	  'input[name="data_exa_e_d"],'+
//	  'input[name="data_exa_f_d"],'+
//	  'input[name="data_exa_g_d"],'+
//	  'input[name="data_exa_b_d"],'+
//	  'input[name="fradesde"],'+
//	  'input[name="fundesde"]').mask("00/00/0000");

//  $('input[name="datanas"],'+
//	  'input[name="clientedesde"],'+
//	  'input[name="empdesde"],'+
//	  'input[name="data_aso"],'+
//	  'input[name="data_exa_a_d"],'+
//	  'input[name="data_exa_c_d"],'+
//	  'input[name="data_exa_d_d"],'+
//	  'input[name="data_exa_e_d"],'+
//	  'input[name="data_exa_f_d"],'+
//	  'input[name="data_exa_g_d"],'+
//	  'input[name="data_exa_b_d"],'+
//	  'input[name="fradesde"],'+
//	  'input[name="fundesde"]').on('focusin', function(){
//        $(this).mask("00/00/0000");
//    });

	// CAMPOS DO TIPO CEP
    $('input[name="cep"]').mask("00000-000");
    $('input[name="cep"]').on('focusin', function(){
        $(this).mask("00000-000");
    });
    $('input[name="cep"]').on('blur', function(){
        $(this).unmask();
    });

	// CAMPOS DO TIPO TELEFONE FIXO
    $('input[name="tel"]').mask("(00) 0000-0000");
    $('input[name="tel"]').on('focusin', function(){
        $(this).mask("(00) 0000-0000");
    });

    // CAMPOS DO TIPO TELEFONE CELULAR
    $('input[name="cel"]').mask(behavior, options);
    $('input[name="cel"]').on('focusin', function(){
        $(this).mask(behavior, options);
    });

    // CAMPOS DO TIPO TELEFONE FAX
    $('input[name="fax"]').mask("(00) 0000-00009");
    $('input[name="fax"]').on('focusin', function(){
        $(this).mask("(00) 0000-00009");
    });

   // $('input[name="vecto"]').mask("00/00/0000");
    //$('input[name="vecto"]').on('focusin', function(){
     //   $(this).mask("99/99/9999");
    //});

//    $('input[name="valor"]').mask('#.##0,00', {reverse: true});
//    $('input[name="valor_t"]').mask('#.##0,00', {reverse: true});

	// CAMPOS DO TIPO RG
    $('input[name="rg"]').mask("00.000.000-0");
    $('input[name="rg"]').on('focusin', function(){
        $(this).mask("00.000.000-0");
    });
    $('input[name="rg"]').on('blur', function(){
        $(this).unmask();
    });
    
//    $('#areaCadastroCat').on('click', 'input[name="dateAci"]', function(){
//        $(this).mask("99/99/9999");
//    });
//    $('#areaCadastroCat').on('click', 'input[name="dateAci"]', function(){
//        $(this).mask("00/00/0000");
//    });
    $('#areaCadastroCat').on('click', 'input[name="horaAci"]', function(){
        $(this).mask("00:00");
    });
    $('#areaCadastroCat').on('click', 'input[name="horaTra"]', function(){
        $(this).mask("00:00");
    });
    $('#areaCadastroCat').on('click', 'input[name="cnpj"]', function(){
        $(this).mask("00.000.000/0000-00");
    });
});