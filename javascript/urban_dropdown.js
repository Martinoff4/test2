
document.addEventListener('DOMContentLoaded', () => {
    //regions start
      const selectDrop = document.querySelector('#regions');
      fetch('./javascript/json/regions.json').then(response => {
          return response.json();
        }).then(data => {
       let output = "";
          data.forEach(regions => {
               output += `<option ${regions.selectable} value="${regions.value}"> ${regions.name}</option>`;
          })
          selectDrop.innerHTML = output;
        }).catch(err => {
          console.log(err);
        });

        const selectDrop2 = document.querySelector('#regions2');
      fetch('./javascript/json/regions.json').then(response => {
          return response.json();
        }).then(data => {
       let output = "";
          data.forEach(regions => {
               output += `<option ${regions.selectable2} value="${regions.value}"> ${regions.name}</option>`;
          })
          selectDrop2.innerHTML = output;
        }).catch(err => {
          console.log(err);
        });
        //date start
  
  
  });

  
