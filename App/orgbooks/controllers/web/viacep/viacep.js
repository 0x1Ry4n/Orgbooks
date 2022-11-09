import { toastrSuccess, toastrError } from "../../scripts/toastr.js";

const btnVerificarCEP = document.querySelector('#VerificarCEP');
const campoCEP = document.querySelector('#cep');

const buscarCEP = (cep) => {
  if (cep.length < 8) return;
  
  let url = 'https://viacep.com.br/ws/${cep}/json/'.replace('${cep}', cep);
  
  fetch(url)
    .then((res) => {
    if (res.ok) {
      res.json().then((json) => {
        if (!json.erro) {
          toastrSuccess('CEP válido!');
        } else {
            campoCEP.value = "";
            toastrError('CEP inválido!');
        }
      });
    } 
  });
}

btnVerificarCEP.addEventListener('click', function(e) {  
  buscarCEP(campoCEP.value);
});