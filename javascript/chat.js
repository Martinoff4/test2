const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");


const form2 = document.querySelector(".typing-area2"),
inputField2 = form2.querySelector(".input-field2"),
sendBtn2 = form2.querySelector(".button2");


inputField2.focus();
inputField2.onkeyup = () =>{
    if(inputField2.value != ""){
        sendBtn2.classList.add("active");
    } else{
        sendBtn2.classList.remove("active");
    }
}

form.onsubmit = (e)=>{
    e.preventDefault();
    
}


inputField.focus();
inputField.onkeyup = ()=>{
   
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
              
              sendBtn.classList.remove("active");
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.ontouchmove = ()=>{
    chatBox.classList.add("active");
}



setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){   
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
    

}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;

  }
