var form_m = document.querySelector("#form_mecanico");
var form_c = document.querySelector("#form_cliente");
var senhas_iguais = false;

if(typeof form_m.cep_oficina !== 'undefined' ){
    form_m.cep_oficina.addEventListener("input", function(){
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
form_m.senhajs.addEventListener("input", function(event){
    console.log("escutando");
    var valida_senha = document.querySelector("#valida_senha_m");
    console.log(valida_senha);
    if((form_m.senhajs_2.value != '') && (form_m.senhajs.value != form_m.senhajs_2.value)){
        event.preventDefault();
        valida_senha.classList.add("senha_invalida");
        senhas_iguais = false;
    }else{
        valida_senha.classList.remove("senha_invalida");
        senhas_iguais = true;
        return true;
    }
});
form_c.senhajs_c.addEventListener("input", function(event){
    console.log("escutando");
    var valida_senha = document.querySelector("#valida_senha_c");
    if((form_c.senhajs_2_c.value != '') && (form_c.senhajs_c.value != form_c.senhajs_2_c.value)){
        event.preventDefault();
        valida_senha.classList.add("senha_invalida");
        senhas_iguais = false;
    }else{
        valida_senha.classList.remove("senha_invalida");
        senhas_iguais = true;
        return true;
    }
});
form_m.senhajs_2.addEventListener("input", function(event){
    console.log("escutando");
    var valida_senha = document.querySelector("#valida_senha_m");
    if((form_m.senhajs.value != '') && (form_m.senhajs_2.value != form_m.senhajs.value)){
        event.preventDefault();
        valida_senha.classList.add("senha_invalida");
        senhas_iguais = false;
    }else{
        valida_senha.classList.remove("senha_invalida");
        senhas_iguais = true;
        return true;
    }
});
form_c.senhajs_2_c.addEventListener("input", function(event){
    console.log("escutando");
    var valida_senha = document.querySelector("#valida_senha_c");
    if((form_c.senhajs_c.value != '') && (form_c.senhajs_2_c.value != form_c.senhajs_c.value)){
        event.preventDefault();
        valida_senha.classList.add("senha_invalida");
        senhas_iguais = false;
    }else{
        valida_senha.classList.remove("senha_invalida");
        senhas_iguais = true;
        return true;
    }
});
function preencheCampos(endereco){
    form_m.estado_oficina.value = endereco.uf;
    form_m.cidade_oficina.value = endereco.localidade;
    form_m.bairro_oficina.value = endereco.bairro;
    form_m.endereco_oficina.value = endereco.logradouro;
    form_m.complemento.value = endereco.complemento;
}

var botao_enviar = document.querySelector(".botao_enviar");
botao_enviar.addEventListener("click", function(event){
    if(!senhas_iguais && form.senhajs_2.value != ''){
        event.preventDefault();
    }
});