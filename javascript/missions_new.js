const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
missionsList = document.querySelector(".missions-container"),
// checkbox1 =  document.querySelector("#transport_help"),
// checkbox2 =  document.querySelector("#delivery_help"),
// checkbox3 =  document.querySelector("#garden_help"),
// checkbox4 =  document.querySelector("#other_help"),
// checkbox11 =  document.querySelector("#noseneCb_in"),
// checkbox22 =  document.querySelector("#pazaruvaneCb_in"),
// checkbox33 =  document.querySelector("#rabotavgrCb_in"),
// checkbox44 =  document.querySelector("#drugiCb_in"),
form = document.querySelector("form"),
continueBtn = form.querySelector(".button input");

searchBar.value = "";
 searchIcon.onclick = ()=>{
   searchBar.classList.toggle("show");
   searchIcon.classList.toggle("active");
   searchBar.focus();
   if(searchBar.classList.contains("active")){
     searchBar.value = "";
     searchBar.classList.remove("active");
   }
 }
//  ddEventListener('resize', function() { 
// checkbox1.addEventListener('change', function(){ 
//   if(checkbox1.checked == true){
//     checkbox11.value = checkbox1.value;
//   }else{
//     checkbox11.value = "";
//   }
// });
// checkbox2.addEventListener('change', function(){ 
//   if(checkbox2.checked == true){
//     checkbox22.value = checkbox2.value;
//   }else{
//     checkbox22.value = "";
//   }
// });
// checkbox3.addEventListener('change', function(){ 
//   if(checkbox3.checked == true){
//     checkbox33.value = checkbox3.value;
//   }else{
//     checkbox33.value = "";
//   }
// });
// checkbox4.addEventListener('change', function(){ 
//   if(checkbox4.checked == true){
//     checkbox44.value = checkbox4.value;
//   }else{
//     checkbox44.value = "";
//   }
// });






const errorText = form.querySelector(".error-text");




  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/missions.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
     
        if(xhr.status === 200){
          let data = xhr.response;
            missionsList.innerHTML = data;  
        }
    }
  }
  xhr.send();

  form.onsubmit = (e)=>{
    e.preventDefault();
  }

  continueBtn.onclick = ()=>{
    missionsList.innerHTML = "";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/missionSearch.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
       
          if(xhr.status === 200){
            let data = xhr.response;
              missionsList.innerHTML = data;  
              console.log('broi do 3');
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
  }
