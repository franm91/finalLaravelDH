window.onload = function(){

   var selectCountries = document.getElementById('countries');
   var selectCities = document.getElementById('cities');
   var cityCont = document.getElementById('cityCont');

   fetch('https://restcountries.eu/rest/v2/all')
      .then(function (response) {
      return response.json();	
      })
      .then(function (countries) {

         selectCountries.addEventListener('change', function () {
            if (this.value === 'Argentina') {
               cityCont.style.display = 'flex';
   
               fetch('https://dev.digitalhouse.com/api/getProvincias')
                  .then(function (response) {
                     return response.json();
                  })
                  .then(function (cities) {
                     selectCities.innerHTML = '';
                     cities.forEach(function (city) {
                        selectCities.innerHTML += '<option>' + city.state + '</option>';
                     });
                  })
                  .catch(function (error) {
                     console.log(error);
                  });
            } else {
               cityCont.style.display = 'none';
               selectCities.innerHTML = '';
            }
         });


         countries.forEach(function (country) {
               if (paisSelect == country.name){
                  var selected = "selected";
               }else{
                  var selected = "";
               }
         selectCountries.innerHTML += '<option '+selected+' value="'+country.name+'">' + country.name + '</option>';

         if (paisSelect === 'Argentina'){
            cityCont.style.display = 'flex';
            fetch('https://dev.digitalhouse.com/api/getProvincias')
               .then(function (response) {
                  return response.json();
               })
               .then(function (cities) {
                  selectCities.innerHTML = '';
                  cities.forEach(function (city) {
                     selectCities.innerHTML += '<option>' + city.state + '</option>';
                  });
               })
               .catch(function (error) {
                  console.log(error);
               });
         } else {
            cityCont.style.display = 'none';
            selectCities.innerHTML = '';
         }
      });
   })
.catch(function (error) {
console.log(error);
});


let form = document.querySelector('form');
let campos = Array.from(form.elements);
campos.pop();


let name = campos[1];
let last_name = campos[2];
let email = campos[3];
let avatar = campos[5];
let country = campos[6];
let city = campos[7];
let password = campos[8];
let password_confirm = [9];


name.addEventListener("keyup", function(){ 
   
   if(name.value.trim() == ""){      
      name.classList.add("is-invalid");

      let error = document.getElementById("error_name");
      error.innerHTML = "El nombre es obligatorio";
   }else{
      name.classList.replace("is-invalid", "is-valid")
   }
   if(name.value.length < 6){
      name.classList.add("is-invalid");

      let error = document.getElementById("error_name");
      error.innerHTML = "Minimo 6 caracteres";

   }

});


last_name.addEventListener("keyup", function(){ 
   
   if(last_name.value.trim() == ""){      
      last_name.classList.add("is-invalid");

      let error = document.getElementById("error_last_name");
      error.innerHTML = "El apellido es obligatorio";
   }else{
      last_name.classList.replace("is-invalid", "is-valid")
   }
   if(last_name.value.length < 6){
      last_name.classList.add("is-invalid");

      let error = document.getElementById("error_last_name");
      error.innerHTML = "Minimo 6 caracteres";

   }

});

function validateEmail(email) {
   var re = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
   if (!re.test(email)){
      return true;
   }else{  
      return false;
   }
 }

email.addEventListener("keyup", function(){ 
   
  console.log(email.value)
   if (validateEmail(email.value)){
      email.classList.add("is-invalid");
      let error = document.getElementById("error_email");
      error.innerHTML = "Ingrese un mail valido";
   }else{
      email.classList.replace("is-invalid", "is-valid");
      
   }


});

function validatePassword(password) {
   const re = /(?=.*[0-9])/;
   if (!re.test(password)){
      return true;
   }else{  
      return false;
   }
}


password.addEventListener("keyup", function(){ 
   
   let error = document.getElementById("error_password");
   
   if (validatePassword(password.value)){
      password.classList.add("is-invalid");
      let error = document.getElementById("error_password");
      error.innerHTML = "Ingresa una contraseña valida";
   }else{
      password.classList.replace("is-invalid", "is-valid");
      
   }


});
        


// function validatePasswordConfirm(password,confirm){
//    if (password === confirm){
//       return true;
//    }{
//       return false;
//    };
// }

//    password_confirm.addEventListener("keyup", function(){

//    let error = document.getElementById("error_password_confirm");

//    if(validatePasswordConfirm(password.value, password_confirm)){.value
//       password_confirm.classList.add("is-invalid");
//       let error = document.getElementById("error_password_confirm");
//       error.innerHTML = "Las contraseñas no coinciden";
//    }else{
//       password_confirm.classList.replace("is-invalid", "is-valid");
      
//    }

// });










}
