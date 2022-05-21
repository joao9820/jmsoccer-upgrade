 function getDadosCep () {
  $("#inputCEP").blur(function(){
    //Início do Comando AJAX
    $.ajax({
      //O campo URL diz o caminho de onde virá os dados
      //É importante concatenar o valor digitado no CEP
      url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/',
      //Aqui você deve preencher o tipo de dados que será lido,
      //no caso, estamos lendo JSON.
      dataType: 'json',
      crossDomain: true,
      success: function(resposta){
        //Agora basta definir os valores que você deseja preencher
        $("#inputUF").val(resposta.uf);
        $("#inputCity").val(resposta.localidade);
        $("#inputBairro").val(resposta.bairro);
        $("#inputAddress").val(resposta.logradouro);
      },
      error: function() {

        $("#inputUF").val('');
        $("#inputCity").val('');
        $("#inputBairro").val('');
        $("#inputAddress").val('');
        
        alert('CEP inválido');
      }

    });
  })
};


function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();

  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
      c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
      }
  }
  return "";
}

function validaCPF(cpf){

  var soma;
  var resto;

  soma = 0;

  if (cpf == "00000000000") return false;

  for (i=1; i<=9; i++) soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
  resto = (soma * 10) % 11;

    if ((resto == 10) || (resto == 11))  resto = 0;
    if (resto != parseInt(cpf.substring(9, 10)) ) return false;

    soma = 0;
    for (i = 1; i <= 10; i++) soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
    resto = (soma * 10) % 11;

    if ((resto == 10) || (resto == 11))  resto = 0;
    if (resto != parseInt(cpf.substring(10, 11) ) ) return false;
    return true;

  };