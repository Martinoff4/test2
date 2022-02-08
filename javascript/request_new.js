  
  document.addEventListener('DOMContentLoaded', () => {
    const selectDrop = document.querySelector('#month');
        
    fetch('./javascript/json/date.json').then(response => {
        return response.json();
      }).then(data_months => {
     let output_months = "";
        data_months.forEach(months => {
             output_months += `<option ${months.selectable} value="${months.value}">${months.month}</option>`;
        })
        selectDrop.innerHTML = output_months;
      }).catch(err => {
        console.log(err);
      });
    });
    
//js details
const type_mission = document.querySelector("#type_mission"),
needed_ppl = document.querySelector("#request_numb"),
request_row_numb = document.querySelector("#req_row_type_mission"),
date_day = document.querySelector("#date_day"),
date_month = document.querySelector("#month"),
date_month1 = document.querySelector(".month"),
date_hour = document.querySelector("#date_hour"),
date_day_real = document.querySelector("#date_day_real"),
date_month_numb = document.querySelector("#date_month_numb"),
date_month_today = document.querySelector("#date_month_today"),
date_min = document.querySelector("#date_min");

type_mission.addEventListener('change', function() {
  if(this.value === "single_mission"){
    needed_ppl.style.display = "none";
    needed_ppl.value = 1;
    request_row_numb.style.display = "block";
    
  }else{
    needed_ppl.style.display = "block";
    request_row_numb.style.display = "flex";
  }
});
needed_ppl.addEventListener('change', function(){
  if(needed_ppl.value > 10){
    data = "Невалидна стойност за нужните хора.";
    errorText.style.display = "block";
    errorText.textContent = data;
  }else{
    errorText.style.display = "none";
    data = null;
    errorText.textContent = null;
  }
});
date_day.addEventListener('change', function(){
  if(date_day.value > 31){
    data = "Невалидна стойности за дни.";
    errorText.style.display = "block";
    errorText.textContent = data;
  }else{
    errorText.style.display = "none";
    data = null;
    errorText.textContent = null;
  }
});
date_hour.addEventListener('change', function(){
  if(date_hour.value > 19 || date_hour.value < 8){
    data = "Невалиден час за тази мисия.";
    errorText.style.display = "block";
    errorText.textContent = data;
  }else{
    errorText.style.display = "none";
    data = null;
    errorText.textContent = null;
  }
});
const date = new Date();

date_month.addEventListener('change', function() {
  const months_array = ['Януари', 'Февруари', 'Март', 'Април', 'Май', 'Юни', 'Юли', 'Август', 'Септември', 'Октомври', 'Ноември', 'Декември'];
  const value = months_array.find(elem => elem == date_month.value);
  date_month_numb.value = months_array.indexOf(value);
  date_month_today.value = date.getMonth();
  if(date.getDate() > date_day.value && date.getMonth() >= months_array.indexOf(value) || date.getDate() <= date_day.value && date.getMonth() > months_array.indexOf(value)){

  data = "Не можеш да се връщаш във времето :)";
  errorText.style.display = "block";
  errorText.textContent = data;
  }else{
    errorText.style.display = "none";
    data = null;
    errorText.textContent = null;
  }
});
date_day.addEventListener('change', function(){
 
if(date_day.value > 31){
  data = "Не съществува такъв ден.";
  errorText.style.display = "block";
  errorText.textContent = data;
}else{
  errorText.style.display = "none";
  data = null;
  errorText.textContent = null;
}
date_day_real.value = date.getDate();
});

date_min.addEventListener('change', function(){
  if(date_min.value > 59){
    data = "Невалиден час за тази мисия.";
    errorText.style.display = "block";
    errorText.textContent = data;
  }else{
    errorText.style.display = "none";
    data = null;
    errorText.textContent = null;
  }
});
//real js start
const form = document.querySelector(".request form"),
continueBtn = form.querySelector(".button input"),
select = form.querySelector("#cars"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
  e.preventDefault();
}

continueBtn.onclick = ()=>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/request.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            if(data === "success"){
              console.log("success");
            }else{
              errorText.style.display = "block";
              errorText.textContent = data;
            }
        }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}