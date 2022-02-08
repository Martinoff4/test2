<?php 
  session_start();
  include_once "php/config.php";
  include_once "php/protocol.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php?page_url=". $redirect_link_var );
  }
?>
<?php include_once "header.php"; 
?>

<body>
<section class="centered-form_request">
  <div class="wrapper_request">
    <section class="form request">
      <header>
      <div>
      <h1>Заяви</h1>
      </div>
     </header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          
        <div class="field img drag-area">
          <div class="div-for_img">+</div> 
      
          </div>
          
        <div class="input-div req-div">
          
      <div class="request_row flex">
        <div class="field input"> 
          <textarea name="title" placeholder="Заглавие..." required></textarea>
        </div>
        <div class="field input"> 
  <select required id="category_mission" name="category_mission">
    <option selected disabled value="">Тип мисия:</option>
    <option value="transport_help">носене/транспортиране</option>
    <option value="delivery_help">пазаруване/доставяне</option>
    <option value="garden_help">работа в градина</option>
    <option value="other_help">друго</option>
  </select>
        </div>
        </div>
        <div class="request_row flex">
        <div class="field input"> 
          <select required name="regions" id="regions">
          </select>
        </div>
        <div class="field input"> 
          <textarea name="city" placeholder="Град..." contenteditable required></textarea>
        </div>
        </div>
        <div class="request_row flex">
        <div class="field input"> 
          <textarea class="desc-text"  name="description" placeholder="Описание..." required></textarea>
        </div>
        </div>
        <div class="request_row flex" id="req_row_type_mission">
        <div class="field input"> 
        <select required id="type_mission" name="type_mission">
    <option selected disabled value="empty">Вид мисия:</option>
    <option value="single_mission">Самостоятелна</option>
    <option value="team_mission">Екипна</option>
  </select>
        </div>
        <div class="field input"> 
        <input type="number" min="1" max="10" name="request_numb" id="request_numb" placeholder="Брой нужни хора" required>
        </div>
        </div>
        <div class="request_row flex">
        <div class="field input"> 
   <div class="date">
     <div class="group-date margin-group">
     <div class="date_text"><p>Дата и час на мисията:</p></div>
     <div class="date_row_main flex">
     <div class="date_row" id="first-child"><p>Дата:</p></div>
     <div class="date_row"> <input type="number" min="00" max="31" name="day" id="date_day" placeholder="Ден" required></div>
     <div class="date_row"><select required name="month" id="month"></select></div>   
     <div class="date_row" id="last-child"><p>2022</p></div> 
     </div>
</div>
<div class="group-date">
<div class="date_text"><p>Дата и час на мисията:</p></div>
<div class="date_row_main flex">  
     <div class="date_row" id="first-child"><p>Час:</p></div>   
  <div class="date_row"><input type="number" min="8" max="19" name="date_hour" id="date_hour" placeholder="Час" required></div>
  <div class="date_row date_row-ds" style="margin: auto 0; font-size: 20px;"><div class="date_space">:</div></div>
  <div class="date_row" id="last-child"> <input type="number" min="00" max="59" name="date_min" id="date_min" placeholder="Мин" required></div>
     </div>
     </div>
   </div>
   <div class="date_row date_row_remove"><input type="number" min="0" max="31" name="date_day_real" id="date_day_real" placeholder="Ден" required></div>
   <div class="date_row date_row_remove"><input type="number" min="0" max="31" name="date_month_numb" id="date_month_numb" placeholder="месец_число" required></div>
   <div class="date_row date_row_remove"><input type="number" min="0" max="31" name="date_month_today" id="date_month_today" placeholder="месец_число_днеска" required></div>

        </div>
        </div>
          <input class="input-request" name="image" type="file" hidden multiple>
        <div class="field button">

          <input type="submit" name="request-submit" value="Готов и заяви">
        </div>
      </form>
    
    </section>
  </div>
  </section>
    <script>
    var active = document.querySelector(".navbtn-3");
    active.classList.add("active");
</script>
<script src="javascript/request-img1.js"></script>
<script src="javascript/request_new.js"></script>
<script src="javascript/urban_dropdown.js"></script>
<?php
if(isset($_SESSION['unique_id'])){
  echo '<script src="javascript/profile-nav.js"></script>';
  }
  ?>
</body>