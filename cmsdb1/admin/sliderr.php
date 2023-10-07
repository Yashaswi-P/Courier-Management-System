<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../login.php');
    }

?>
<div style="overflow-x:auto;">
    <?php
    include('../dbconnection.php');

    $qryd= "SELECT * FROM `user_account`";
    $run= mysqli_query($dbcon,$qryd);

    if(mysqli_num_rows($run)<1){
        echo "No Matches Found";
    }
    else{
        $count=0;
        while($data=mysqli_fetch_assoc($run))
        {
            $count++;
        ?><head>
              <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link rel="stylesheet" href="styles.css">
            </head>
        <section>
        <div class="swiper mySwiper container">
      <div class="swiper-wrapper content">
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <!--<img src="images/img9.jpg" alt="">-->
            </div>

            <div class="media-icons">
              <i class="fab fa-facebook"></i>
              <i class="fab fa-twitter"></i>
          
            </div>

            <div class="name-profession">
              <span class="name">Someone Name</span>
              <span class="profession">Web Developer</span>
            </div>
            <div class="button">
              <button class="aboutMe">About Me</button>
              <button class="hireMe">Hire Me</button>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
  </section>

  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

        <?php
        }
    }
    ?>
</table>
</div>