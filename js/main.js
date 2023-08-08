$(function() {  
    $("#btnButton").on("click", function() {
        if(VerificaRequired() == true){
            enviar();
        }else {
           window.alert(VerificaRequired())
        }
    });

    $("#btnAtualizar").on("click", function () {
        const id = $(this).attr("data-id");
        AtualizaDados(id);
    });


    $("[id^=btnD_]").on ("click", function () {
        if(confirm("tem certeza ? ")){
            const id = $(this).attr("data-id");
            deletaDados(id);
        }
    });

});

function VerificaRequired() {
    
    obrigatorios = [];
    $('select[required]').each(function() {
        if ((this.value).trim() == '') {
            obrigatorios.push(this.id);
        }
    });
    $('input[required]').each(function() {
        if ((this.value).trim() == '') {
            obrigatorios.push(this.id);
        }
    });
    
    campos = "";
    if (obrigatorios.length > 0) {
        for (i = 0; i < obrigatorios.length; i++) { 
            campos += ", " + $("#title"+obrigatorios[i]).text().replace(" (*)", "");;
            $("#"+obrigatorios[i]).css('border-color', 'red');
        }
        return "Campos obrigatórios não preenchidos: " + campos.substring(2);
    } else {
        return true;
    }
        
}

function enviar() {
    dados = {
        "tipo" :  $("#Tipo").val(),
        "modelos":  $("#Modelos").val(),
        "cor":  $("#Cor").val(),
        "valor":  $("#Valor").val(),
    }

    $.ajax({
        type: "POST",
        url: "php/funcoes.php?funcao=insere",
        data: dados,
            success: function (ret) {
                if(!ret){
                    location.href = "index.php"
                } else {
                    alert(ret);
                }           
        }
    });
}

function deletaDados(id){
    $.ajax({
        type: "POST",
        url: "php/funcoes.php?funcao=Deleta",
        data: {"id": id},
        success: function (ret) {
            if (!ret){
                $("#btnD_" + id).closest("tr").remove();
            } else {
                alert(ret)
            }        
        }
    });
}

function AtualizaDados(id){
    dados = {
        "id": id,
        "tipo" :  $("#Tipo").val(),
        "modelos": $("#Modelos").val(),
        "cor":  $("#Cor").val(),
        "valor":   $("#Valor").val(),
    }
    $.ajax({
        type: "POST",
        url: "php/funcoes.php?funcao=editar",
        data: dados,
        success: function (ret) {
            if (!ret){
                location.href = "index.php"
            } else {
                alert(ret)
            }          
        }
    });

  

}