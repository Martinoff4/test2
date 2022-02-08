<?php 
  session_start();
  include_once "php/config.php";

?>
<?php include_once "header.php"; 
?>

<body>

    <div class="missions-search-bar">
    <div class="search">
        <span class="text">Избери потребител за да почнеш чат</span>
        <input type="text" placeholder="Потърси заглавие на мисия...">
        <button><i class="fas fa-search"></i></button>
      </div>
    </div>

    <div class="missions-wrapper">
      <div class="filter">
       <div class="filter-title">Филтър</div>
       <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
       <div class="categories">
         <div class="categories-title">Категории</div>
         <div class="diff_categories">
       <input type="checkbox" id="transport_help" name="checkbox[]" value="transport_help4">
       <label for="transport_help">носене/транспортиране</label>
       </div>
         <div class="diff_categories">
       <input type="checkbox" id="delivery_help" name="checkbox[]" value="delivery_help">
       <label for="delivery_help">пазаруване/доставяне</label>
       </div>
         <div class="diff_categories">
       <input type="checkbox" id="garden_help" name="checkbox[]" value="garden_help">
       <label for="garden_help">работа в градина</label>
       </div>
         <div class="diff_categories">
       <input type="checkbox" id="other_help" name="checkbox[]" value="other_help">
       <label for="other_help">други</label>
       </div>
       </div>
       <div class="urban-areas">
         <div class="urban-title">Област</div>
         <select required name="regions2" id="regions2">
         </select>
         <div class="town-village-div">
           <div class="arrow"><img src="img_main/urban_arrow.svg" alt=""></div>
           <input type="text" placeholder="Избери Град/Село">
         </div>
         </div>
         <div class="type-mission">
           <div class="type-title">Вид на мисията</div>
           <div class="diff_types">
       <input type="radio" id="single_mission" name="type_mission" value="single_mission">
       <label for="single_mission">Самостоятелна</label>
       </div>
           <div class="diff_types">
       <input type="radio" id="team_mission" name="type_mission" value="team_mission">
       <label for="team_mission">Екипна</label>
       </div>
       <div class="diff_types">
         <div class="neededppl_div flex">
         <div class="arrow">
        <img src="img_main/urban_arrow.svg" alt="">
        </div>
       <input type="number" name="needed_ppl" id="needed_ppl" placeholder="2-10">
       </div>
         </div>
         </div>
         <div class="mission-date">
         <div class="date-title">Дата на мисията</div>
         <div class="wanted-date">
         <input type="date" id="wanted-date" name="wanted-date">
         </div>
         </div>
         <div class="mission-hour">
           <div class="hour-title">Час на мисията</div>
         <div class="hour-wrapper">
        <div class="hour-input">
            <div class="hour-field">
                <span>Min</span>
                <input type="number" class="input-min" value="8">
            </div>
            <div class="seperator">-</div>
            <div class="hour-field">
                <input type="number" class="input-max" value="19">
                <span>Max</span>
            </div>
        </div>
        <div class="slider">
            <div class="progress"></div>
        </div>
        <div class="range-input">
            <input type="range" class="range-min" min="8" max="19" value="8" step="1">
            <input type="range" class="range-max" min="8" max="19" value="19" step="1">
        </div>
    
         </div>
         <input type="submit" value="submit">
         </form>
       
       </div>
      </div>
      <div class="missions-container">

    </div>
    </div>
    <script>
    var active = document.querySelector(".navbtn-2");
    active.classList.add("active");
    </script>

    <script src="javascript/missions_new.js"></script>
    <script src="javascript/hour-range.js"></script>
    <script src="javascript/urban_dropdown.js"></script>
<?php
if(isset($_SESSION['unique_id'])){
  echo '<script src="javascript/profile-nav.js"></script>';
  }
  ?>
</body>