window.onload = function(){

   let ul = document.querySelector('ul');
   let span = document.querySelector('h2 span');
   let form = document.querySelector('form');
   let contForm = document.querySelector('.col-4');
   let campos = Array.from(form.elements);
   campos.pop();

   // const ajaxCall = (url, callback, params = null) => {
	//    window.fetch(url, params)
   //       .then(response => {
   //          if (params) return response.text();
   //          else return response.json();
   //       })
   //       .then(data => callback(data))
   //       .catch(error => console.error(`Error: `, error));
   //    };

   // const getMovies = (data) => {
	// const totalMovies = data.length;

	// ul.innerHTML = '';
	// span.innerText = totalMovies;

	// for (let i of data) {
	// 	ul.innerHTML += `<li class="list-group-item list-group-item-info">${i.title}</li>`;
	//    }
   // };

   // const setMovie = data => {
	//    if (data === 'Insertado') {
	// 	   contForm.innerHTML += `<div class="alert alert-success">Película insertada exitosamente</div>`;
	//    }
   // };

   // setInterval(() => { ajaxCall('http://localhost:2020/get.php', getMovies); }, 1000);

   form.addEventListener('submit', (e) => {
      e.preventDefault();
      
      console.log(e);

	let data = {
		name: campos[1].value,
		last_name: campos[2].value,
      email: campos[3].value,
      avatar: campos[5].value,
      countries: campos[6].value,
      cities: campos[7],
      password: campos[8],
      password_confirm: campos[9]
   };
   console.log(data);
   

   if (
      data.title === '' ||
      data.rating === '' ||
      data.awards === '' ||
      data.release_date === ''
   ) {
      window.alert('Campos vaciós');
   } else {
      const formData = new FormData();
      formData.append('data', JSON.stringify(data));

      ajaxCall('http://localhost:2020/post.php', setMovie, {
         method: 'POST',
         body: formData
      });
      campos.forEach(campo => { campo.value = ''; });
      }  
   });


}