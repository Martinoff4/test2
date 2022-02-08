const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
missionsList = document.querySelector(".missions-container"),
checkbox3 =  document.querySelector(".delivery_help");

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


 searchBar.onkeyup = ()=>{
   let searchTerm = searchBar.value;
   
   if(searchTerm != ""){
     searchBar.classList.add("active");
   }else{
     searchBar.classList.remove("active");
   }
   let xhr = new XMLHttpRequest();
   xhr.open("POST", "php/missionSearch.php", true);
   xhr.onload = ()=> {
     if(xhr.readyState === XMLHttpRequest.DONE){
         if(xhr.status === 200){
           if(searchBar.value != ""){
           let data = xhr.response;
           missionsList.innerHTML = data;   
            
         }
     }
   }
  }
   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xhr.send("searchTerm=" + searchTerm);
  
 }

let xhr = new XMLHttpRequest();
xhr.open("GET", "php/missions.php", true);
xhr.onload = ()=>{
  if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        if(!searchBar.classList.contains("active")){
          missionsList.innerHTML = data;
        }
      }
  }
}
xhr.send();

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/missions.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            missionsList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);

