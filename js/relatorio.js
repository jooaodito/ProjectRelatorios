$(function(){
    var errmsg = $('.msg');
    var forms = $('form');
    var botao = $('.j_buttom');
    var urlpost = '../php/relatorio.php';
    
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
    
    
    
});


