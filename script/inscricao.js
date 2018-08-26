var form = document.querySelector(".formulario");
var senhas_iguais = false;

if(typeof form.cep_oficina !== 'undefined' ){
    form.cep_oficina.addEventListener("input", function(){
        var cep = this.value.replace('-', '');
        if(cep.length == 8){
            var url = "https://viacep.com.br/ws/" + cep + "/json";
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url);
            xhr.addEventListener("load", function(){
            var resposta = xhr.responseText;
            var endereco = JSON.parse(resposta);
                if(endereco.erro != true){
                    preencheCampos(endereco);
                }else{
                    console.log(xhr.status);
                    console.log(xhr.responseText);
                }
            });
            xhr.send();
        }
    });
}
form.senhajs.addEventListener("input", function(){
    console.log("escutando");
    var valida_senha = document.querySelector("#valida_senha");
    if((form.senhajs_2.value != '') && (form.senhajs.value != form.senhajs_2.value)){
        valida_senha.classList.add("senha_invalida");
        senhas_iguais = false;
    }else{
        valida_senha.classList.remove("senha_invalida");
        senhas_iguais = true;
    }
});
form.senhajs_2.addEventListener("input", function(){
    console.log("escutando");
    var valida_senha = document.querySelector("#valida_senha");
    if((form.senhajs.value != '') && (form.senhajs_2.value != form.senhajs.value)){
        valida_senha.classList.add("senha_invalida");
        senhas_iguais = false;
    }else{
        valida_senha.classList.remove("senha_invalida");
        senhas_iguais = true;
    }
});
function preencheCampos(endereco){
    form.estado_oficina.value = endereco.uf;
    form.cidade_oficina.value = endereco.localidade;
    form.bairro_oficina.value = endereco.bairro;
    form.endereco_oficina.value = endereco.logradouro;
    form.complemento.value = endereco.complemento;
}

var botao_enviar = document.querySelector(".botao_enviar");
botao_enviar.addEventListener("click", function(event){
    if(!senhas_iguais && form.senhajs_2.value != ''){
        event.preventDefault();
    }
});