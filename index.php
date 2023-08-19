<?php
  require('includes/db.php');
  $query = "SELECT * FROM home,section_control,social_media,about,user_info,footer_details";
  $run = mysqli_query($db, $query);
  $user_data = mysqli_fetch_array($run);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$user_data['name']?> - <?=$user_data['title']?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <h1><a href="index.php"><?=$user_data['name']?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      <h2>I'm a passionate <span><?=$user_data['title']?></span> from <?=$user_data['city']?></h2>

      <?php if($user_data['shownav']) { ?>
      <nav id="navbar" class="navbar">
        <ul>
          <?php if($user_data['home_section']){ ?>
            <li><a class="nav-link active" href="#header">Home</a></li>
          <?php }?>
          <?php if($user_data['about_section']){ ?>
            <li><a class="nav-link" href="#about">About</a></li>
          <?php }?>
          <?php if($user_data['resume_section']){ ?>
            <li><a class="nav-link" href="#resume">Resume</a></li>
          <?php }?>
          <?php if($user_data['service_section']){ ?>
            <li><a class="nav-link" href="#services">Services</a></li>
          <?php }?>
          <?php if($user_data['portfolio_section']){ ?>
            <li><a class="nav-link" href="#portfolio">Portfolio</a></li>
          <?php }?>
          <?php if($user_data['contact_section']){ ?>
            <li><a class="nav-link" href="#contact">Contact</a></li>
          <?php }?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <?php } ?>

      <?php if($user_data['showicons']){ ?>
        <div class="social-links">
          <?php if($user_data['twitter']!==''){ ?>
            <a href="https://twitter.com/<?=$user_data['twitter']?>" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
          <?php  } ?>
          <?php if($user_data['facebook']!==''){ ?>
            <a href="https://facebook.com/<?=$user_data['facebook']?>" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
          <?php  } ?>
          <?php if($user_data['instagram']!==''){ ?>
            <a href="https://instagram.com/<?=$user_data['instagram']?>" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
          <?php  } ?>
          <?php if($user_data['linkedin']!==''){ ?>
            <a href="https://linkedin.com/in/<?=$user_data['linkedin']?>" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
          <?php  } ?>
          <?php if($user_data['youtube']!==''){ ?>
            <a href="https://youtube.com/<?=$user_data['youtube']?>" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
          <?php  } ?>
          <?php if($user_data['telegram']!==''){ ?>
            <a href="https://web.telegram.org/<?=$user_data['telegram']?>" target="_blank" class="telegram"><i class="bi bi-telegram"></i></a>
          <?php  } ?>
          <?php if($user_data['skype']!==''){ ?>
            <a href="https://skype.com/<?=$user_data['skype']?>" target="_blank" class="skype"><i class="bi bi-skype"></i></a>
          <?php  } ?>
          <?php if($user_data['github']!==''){ ?>
            <a href="https://github.com/<?=$user_data['github']?>" target="_blank" class="github"><i class="bi bi-github"></i></a>
          <?php  } ?>
        </div>
      <?php } ?>

    </div>
  </header><!-- End Header -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

      <div class="section-title">
        <h2>About</h2>
        <p>Know more about me</p>
      </div>

      <div class="row">
        <div class="col-lg-4 mb-4" data-aos="fade-right">
          <center>
          <img src="img/<?=$user_data['profile_pic']?>" class="img-fluid" alt="" width="80%">
          </center>
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3><?=$user_data['about_title']?></h3>
          <p class="fst-italic pb-3">
          <?php if($user_data['about_subtitle']) { ?>
            <?=$user_data['about_subtitle']?>
          <?php } ?>
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Date Of Birth:</strong> <span><?php echo date('d M Y', strtotime($user_data['birthday']))?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><?=$user_data['website']?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?=$user_data['mobile']?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?=$user_data['city']?>, <?=$user_data['country']?></span></li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?=$user_data['age']?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?=$user_data['degree']?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?=$user_data['email']?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>
                  <?php if($user_data['freelance'] != 0)
                  {
                    echo "Available";
                  } else {
                    echo "Not Available";
                  }
                  ?>
                </span></li>
              </ul>
            </div>
          </div>
          <p class="pt-3">
          <?php if($user_data['about_description']) { ?>
            <?=$user_data['about_description']?>
          <?php } ?>
          </p>
        </div>
      </div>

    </div><!-- End About Me -->

    <!-- ======= Counts ======= -->
    <?php if($user_data['show_counter']) { 
       $query5 = "SELECT * FROM counter";
       $run5 = mysqli_query($db,$query5);
    ?>
    <div class="counts container">

      <div class="row">
        <?php 
          while($count = mysqli_fetch_array($run5)) { 
        ?>
        <div class="col-lg-4 col-md-6 mt-5">
          <div class="count-box">
            <i class="<?=$count['icon']?>"></i>
            <span data-purecounter-start="<?=$count['pre']?>" data-purecounter-end="<?=$count['post']?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><?=$count['title']?></p>
          </div>
        </div>
        <?php } }?>
      </div>
    </div>
    
    <!-- End Counts -->

   <!-- ======= Skills  ======= -->
   <div class="skills container">
      <div class="row">

        <div class="col-lg-5 p-2">

          <div class="section-title">
            <h2>Skills</h2>
          </div>

          <div class="row skills-content">
            <?php
              $query2 = "SELECT * FROM skills";
              $run2 = mysqli_query($db, $query2);
              while($skills = mysqli_fetch_array($run2)) {
            ?>
            <div class="progress">
              <span class="skill"><?=$skills['skill_name']?> <i class="val"><?=$skills['skill_level']?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?=$skills['skill_level']?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>

        <div class="col-lg-2 p-4"></div>

        <div class="col-lg-5 p-2">

          <div class="section-title">
            <h2>Languages</h2>
          </div>

          <div class="row skills-content">
          <?php
              $query3 = "SELECT * FROM languages";
              $run3 = mysqli_query($db, $query3);
              while($languages = mysqli_fetch_array($run3)) {
            ?>
            <div class="progress">
              <span class="skill"><?=$languages['lang_name']?> <i class="val"><?=$languages['lang_level']?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?=$languages['lang_level']?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
    
      </div>

    </div>
    <!-- End Skills -->

    <!-- ======= Interests ======= -->
    <?php if($user_data['show_interest']) { 
      $query6 = "SELECT * FROM interest";
      $run6 = mysqli_query($db,$query6);
    ?>
    <div class="interests container">

      <div class="section-title">
        <h2>Interests</h2>
      </div>

      <div class="row">
      <?php 
          while($interest = mysqli_fetch_array($run6)) { 
        ?>
        <div class="col-lg-3 col-md-4 mb-3">
          <div class="icon-box">
            <i class="<?=$interest['icon']?>" style="color: <?=$interest['icon_color']?>;"></i>&nbsp;
            <h3><?=$interest['title']?></h3>
          </div>
        </div>
        <?php } } ?>
      </div>

    </div>
    
    <!-- End Interests -->

    <!-- ======= Testimonials ======= -->
    <?php if($user_data['show_testimonial']) { 
        
    ?>
    <div class="testimonials container">

      <div class="section-title">
        <h2>Testimonials</h2>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper pb-5">
          <?php
          $query7 = "SELECT * FROM testimonial";
          $run7 = mysqli_query($db,$query7);
            while($testimonial = mysqli_fetch_array($run7)) {     
          ?>
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p class="">
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                <?=$testimonial['quot']?>
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="img/<?=$testimonial['alumni_pic']?>" class="testimonial-img" alt="" style="width: 75px; height:80px">
              <h3><?=$testimonial['name']?></h3>
              <h4><?=$testimonial['job_title']?></h4>
              
            </div>            
          </div>
          <?php } ?>
         
          <!-- End testimonial item -->

        </div>
        <div class="swiper-pagination pb-5 "></div>
      </div>

      <div class="owl-carousel testimonials-carousel">

      </div>

    </div>   
    <?php } ?>
    <!-- End Testimonials  -->

  </section>
  <!-- End About Section -->

   <!-- ======= Resume Section ======= -->
   <section id="resume" class="resume">
    <div class="container">
    
      <div class="section-title">
        <h2>Resume</h2>
        <p>Check My Resume</p>
      </div>
      <div class="row">
        <div class="col-lg-6">
        <h3 class="resume-title">Education</h3>
        <?php
              $query4 = "SELECT * FROM resume";
              $run4 = mysqli_query($db,$query4);
              while($resume = mysqli_fetch_array($run4)) {
                if($resume['type']=='education') {
        ?>                   
          <div class="resume-item ">            
            <h4><?=$resume['title']?></h4>
            <h5><?=$resume['time_from']?> - <?=$resume['time_to']?></h5>
            <p><em><?=$resume['organization']?>, <?=$resume['location']?></em></p>
            <p><?=$resume['about_exp']?></p>            
          </div>
          <?php } } ?>          
        </div>
        
        <div class="col-lg-6">
          <h3 class="resume-title">Professional Experience</h3>
          <?php
              $query4 = "SELECT * FROM resume";
              $run4 = mysqli_query($db,$query4);
              while($resume = mysqli_fetch_array($run4)) {
                if($resume['type']=='professional') {
        ?> 
          <div class="resume-item ">            
            <h4><?=$resume['title']?></h4>
            <h5><?=$resume['time_from']?> - <?=$resume['time_to']?></h5>
            <p><em><?=$resume['organization']?>, <?=$resume['location']?></em></p>
            <p><?=$resume['about_exp']?></p>            
          </div>
        <?php } } ?>
      </div>

    </div>
  </section>
  <!-- End Resume Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Services</h2>
        <p>My Services</p>
      </div>      

      <?php
        $query8 = "SELECT * FROM services";
        $run8 = mysqli_query($db,$query8);
      ?>
      <div class="row">
        <?php
          while($services = mysqli_fetch_array($run8)) {
        ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="icon-box">
            <div class="icon"><i class="<?=$services['icon']?>"></i></div>
            <h4><a href=""><?=$services['title']?></a></h4>
            <p><?=$services['text']?></p>
          </div>
        </div>
        <?php } ?>
      </div>

    </div>
  </section>
  <!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Portfolio</h2>
        <p>My Works</p>
      </div>

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-card">Card</li>
            <li data-filter=".filter-web">Web</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Me</p>
      </div>

      <div class="row mt-2">

        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>My Address</h3>
            <p><?=$user_data['street']?>, &nbsp;<?=$user_data['city']?>, &nbsp;<?=$user_data['pincode']?></p>
          </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <?php if($user_data['showicons']){ ?>
        <div class="social-links">
          <?php if($user_data['twitter']!==''){ ?>
            <a href="https://twitter.com/<?=$user_data['twitter']?>" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
          <?php  } ?>
          <?php if($user_data['facebook']!==''){ ?>
            <a href="https://facebook.com/<?=$user_data['facebook']?>" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
          <?php  } ?>
          <?php if($user_data['instagram']!==''){ ?>
            <a href="https://instagram.com/<?=$user_data['instagram']?>" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
          <?php  } ?>
          <?php if($user_data['linkedin']!==''){ ?>
            <a href="https://linkedin.com/<?=$user_data['linkedin']?>" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
          <?php  } ?>
          <?php if($user_data['youtube']!==''){ ?>
            <a href="https://youtube.com/<?=$user_data['youtube']?>" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
          <?php  } ?>
          <?php if($user_data['telegram']!==''){ ?>
            <a href="https://telegram.com/<?=$user_data['telegram']?>" target="_blank" class="telegram"><i class="bi bi-telegram"></i></a>
          <?php  } ?>
          <?php if($user_data['skype']!==''){ ?>
            <a href="https://skype.com/<?$user_data['skype']?>" target="_blank" class="skype"><i class="bi bi-skype"></i></a>
          <?php  } ?>
          <?php if($user_data['github']!==''){ ?>
            <a href="https://github.com/<?=$user_data['github']?>" target="_blank" class="github"><i class="bi bi-github"></i></a>
          <?php  } ?>
        </div>
      <?php } ?>
          </div>
        </div>

        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Me</h3>
            <p><?=$user_data['email']?></p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Me</h3>
            <p><?=$user_data['mobile']?></p>
          </div>
        </div>
      </div>

      <form id="form" method="post" role="form" class=" mt-4">
        <div class="row">
          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control " id="name" placeholder="Your Name" required>
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message" required></textarea>
        </div>
       <div>
        <h4 class="sent-notification"></h4>
       </div>
        <div class="text-center pt-3"><button type="submit" onclick="sendMail()" class="btn btn-success btn-lg"  name="send">Send Message</button></div>
      </form>

      <script type="text/javascript">
        function sendEmail(){
          var name=$("#name");
          var email=$("#email");
          var subject=$("#subject");
          var message=$("#message");

          if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(message)) {
            $.ajax({
              url: 'sendEmail.php',
              method: 'POST',
              dataType: 'json',
              data: {
                name: name.val(),
                email: email.val(),
                subject: subject.val(),
                message: message.val()
              }, success: function(response) {
                $('form')[0].reset();
                $('.sent-notification').text("Message sent successfully");
              }
            })
          }
        }
        function isNotEmpty(caller) {
          if(caller.val()=="") {
            caller.css('border','1px solid red');
          } 
          else 
          {
            caller.css('border', '');
          }
        }

      </script>

    </div>
  </section>
  <!-- End Contact Section -->

  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/personal-free-resume-bootstrap-template/ -->
    Designed by <a href="<?=$user_data['url']?>" target="_blank"><?=$user_data['company']?></a>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" ></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>