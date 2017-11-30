$(function(){
    var errmsg = $('.msg');
    var forms = $('form');
    var botao = $('.j_buttom');
    var urlpost = '../php/listchamada.php';
    
    botao.attr("type", "submit");
    forms.submit(function(){
        errmsg.fadeOut("fast");
        return false;
    });
    
    function carregando(){
        errmsg.empty().html('<p class="alert alert-info"><img src="../img/load.gif" alt="Carregando..." width="20"> &nbsp; Aguarde, enviando dados!</p>').fadeIn("fast");
    };
    
    function errosend(){
        errmsg.empty().html('<p class="alert alert-danger"><strong>Erro inesperado,</strong> favor contate o admin!</p>').fadeIn("fast");
    };
    
    function errodados(mensagem){
        errmsg.empty().html('<p class="alert alert-danger">'+mensagem+'</p>').fadeIn("fast");
    };
    
    function sucesso(mensagem){
        errmsg.empty().html('<p class="alert alert-success">'+mensagem+'</p>').fadeIn("fast");
    };
   
    $.ajaxSetup({
        url:        urlpost,
        type:       'POST',
        beforeSend: carregando,
        error:      errosend
    });
    
    //cadastro
    var cadastro = $('form[name="cadastroNivel"]');
    
    cadastro.submit(function(){
        var dados = $(this).serialize();
        var acao = "&acao=cadastro" ;
        var sender = dados+acao;
        
        $.ajax({
            data:   sender,
            success: function( resposta ){
                if(resposta == "erro"){
                    errodados('Exite campos em branco!');
                }else if( resposta == "errosend"){
                    errosend();
                }else{
                    sucesso('Parabéns a Celula <strong>'+resposta+'</strong> foi cadastrada!');
                }
            },
            complete: function(){
                cadastro.find("input:text").val('');
                window.location="../pages/painelcelula.php";
            }
        });
        
    });
    
    //ler
    
    var listarnivel = $('.loadniveis');
    var atualizar = $('.atualizar');
    var loadnivel = $('.carregando');
    
    //atualizar.attr("type", "submit");
    
    listarnivel.empty();
    
    function carregarusuarios( instrucao ){
        $.ajax({
            data:       instrucao,
            beforeSend: '',
            error:      '',
            success:    function( leitura ){

                    listarnivel.append( leitura );
                    loadnivel.delay(500).fadeOut("slow");           
            }
        });
    }
    
    carregarusuarios("acao=ler");
    
    atualizar.click(function(){
        listarnivel.empty();

        carregarusuarios("acao=ler");
        loadnivel.delay(500).fadeIn("slow");

    });
    
    //ler modal rede
    
    var listarrede = $('.loadredes');
    var lerrede = $('.lerrede');
    
    function carregarrede( instrucao ){
        $.ajax({
            data:       instrucao,
            beforeSend: '',
            error:      '',
            success:    function( leitura ){

                    listarrede.append( leitura );          
            }
        });
    }
    
    lerrede.click(function(){
        listarrede.empty();

        carregarrede("acao=lerrede");
    });
    
    //selecionar modal rede
    listarrede.on('click', '.selecionar2', function(){
        var listnivelid = $(this).attr("id");
        
        $.ajax({
            data:       '',
            beforeSend: '',
            error:      '',
            success:    function(){
                $(".rede").val(listnivelid);
                $("#ModalRede").modal('hide');
            }
        });
    });
    
    //ler modal superior
    
    var listarsuperior = $('.loadsuperior');
    var lersuperior = $('.lersuperior');
    
    function carregarsuperior( instrucao ){
        $.ajax({
            data:       instrucao,
            beforeSend: '',
            error:      '',
            success:    function( leitura ){

                    listarsuperior.append( leitura );          
            }
        });
    }
    
    lersuperior.click(function(){
        listarsuperior.empty();

        carregarsuperior("acao=lersuperior");
    });
    
    //selecionar modal superior
    listarsuperior.on('click', '.selecionar3', function(){
        var listid = $(this).attr("id");
        
        $.ajax({
            data:       '',
            beforeSend: '',
            error:      '',
            success:    function(){
                $(".superior").val(listid);
                $("#ModalSuperior").modal('hide');
            }
        });
    });
    
    //Excluir
    listarnivel.on('click', '.excluir', function(){
        var delid = $(this).attr("id");
        var deldata = "acao=deletar&del="+delid;
        var liaction = $('tr[class="j_'+delid+'"]');
        
        $.ajax({
            data:       deldata,
            beforeSend: '',
            error:      '',
            success:    function(){
                liaction.fadeOut("slow");
            }
        });
    });
    
    //Lista de Chamada
    var lista = $('form[name="lista"]');
    var listarlista = ('.loadlista');
    var list = ('.lista');
    
    //listarlista.on('click', '.lista', function(){
      //  var listar = $(this).attr("id");
      //  var consult = "acao=consulta&listarid="+listar;
    //});
        
        function carregarlista( instrucao ){
            $.ajax({
                data:       instrucao,
                beforeSend: '',
                error:      '',
                seccess:    function( leitura ){
                    listarlista.append( leitura );

                }
            });
        }
        
        carregarlista("acao=consulta");
        
        list.click(function(){
            listarlista.empty();

            carregarlista("acao=consulta");
        });
    
});


