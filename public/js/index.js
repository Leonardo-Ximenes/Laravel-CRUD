// Funcao controla visibilidade dos blocos
function setVisibility(element, visibility){

  if(visibility == 'off'){

      document.getElementById(element).style.display = 'none';    

  }else{

      document.getElementById(element).style.display = 'flex'; 
  }

}

// Limpa campos formulario  
document.querySelector('#btn-erase').addEventListener('click', e => {
    e.preventDefault();  
    document.getElementById('form-create').reset();
});

// Validacoes do Formulario
document.querySelector('#btn-create').addEventListener('click', e =>{
 
      // Verifica o checked do campo
      let agree;
      agree = document.getElementById('agree');
      
      if(!agree.checked){
        alert('Concordar com os termos é obrigatório!');
        // nao submete o formulario caso nao tenha concordado
        e.preventDefault();
      }    

});

// Nao exibir dados endereco
document.querySelector('#no_info').addEventListener('click', e =>{

  let field    = document.getElementById('no_info');
  const blocos = ['bloco-1', 'bloco-2', 'bloco-3'];
  //console.log(field.checked);

  if(field.checked){

      blocos.forEach(function(bloco){

        setVisibility(bloco, 'off');

      });    

  }else{

      blocos.forEach(function(bloco){

        setVisibility(bloco, 'on');

      });    
  }






  

});

