const rangeInput = document.querySelectorAll(".range-input input"),
hourInput = document.querySelectorAll(".hour-input input"),
progress = document.querySelector(".slider .progress");

let hourGap = 1;

hourInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(hourInput[0].value),
        maxVal = parseInt(hourInput[1].value);

        if((maxVal - minVal >= hourGap) && minVal >= 8 && maxVal <= 19){
            if(e.target.className === "input-min"){
                rangeInput[0].value = minVal;
                progress.style.left = ((minVal - 8) / (rangeInput[0].max - 8)) * 100 + "%";
            }else{
                rangeInput[1].value = maxVal;
                progress.style.right = 100 - ((maxVal - 8) / (rangeInput[1].max - 8)) * 100 + "%";
            }
        }
    });
    
});

rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

        if(maxVal - minVal < hourGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - hourGap;
            }else{
                rangeInput[1].value = minVal + hourGap;
            }
        }else{
        hourInput[0].value = minVal;
        hourInput[1].value = maxVal;
        progress.style.left = ((minVal - 8) / (rangeInput[0].max - 8)) * 100 + "%";
        progress.style.right = 100 - ((maxVal - 8) / (rangeInput[1].max - 8)) * 100 + "%";
        }
    });
    
});