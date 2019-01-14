$(document).ready(function() {
    // -- MUDAR SKIN DO LAYOUT -- //
    $('a[id="skin"]').on('click', function(){
       var skin = $('body').attr('data-skin');
       var skinActive = $(this).attr('data-skin');
       $('body').removeClass(skin);
       $('body').removeAttr('data-skin');
       $('body').addClass(skinActive);
       $('body').attr('data-skin',skinActive);
       $.ajax({
            url:BASE_URL+'/RequestAjax/ConfigSkin',
            type:'POST',
            data:{skin:skinActive}
        });
    });
    
    //--ATIVAR PLUGIN SELECT --//
    $('.select2').select2();

    //--ATIVAR PLUGIN TOOLTIP BOOTSTRAP --//
    $('[data-toggle="tooltip"]').tooltip();

    //-- ATIVAR PLUGIN DATATABLE MONTAGEM DA TABELA USUÁRIOS --//
    $('#lista-user').dataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "ajax":{
            "url": "RequestAjax/listaUser",
            "type": "POST"
        },
        "language": {
            "url": BASE_URL+"/assets/plugins/dataTables/dataTables.pt-br.json"
        },
        "columnDefs": [
            {className: "text-center", "targets": [0], "width": "5%"},
            {className: "text-center", "targets": [1], "width": "10%"},
            {className: "text-center", "targets": [3], "width": "20%"}
        ]
    });
    

});

