<?php
include "views/modules/header.php";
?>

<div class="container">
<div class="row">
<div class="sec-1 col-lg-12">   
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" style="width: 100px; height: 400px;" src="images/banner20.png" alt="First slide">
          <div class="carousel-caption d-none d-md-block"> 
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 400px;" src="images/banner30.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 400px;" src="images/banner12.png" alt="Third slide">
    </div>
       <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 400px;" src="images/banner33.png" alt="Third slide">
    </div>
       <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 400px;" src="images/banner21.png" alt="Fourth slide">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 400px;" src="images/banner22.png" alt="Fifth slide">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 400px;" src="images/banner23.png" alt="Sixty slide">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 400px;" src="images/banner24.png" alt="Seventy slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>




</div>
<!-- <div class="col-lg-6">
<iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fferreriopisuena%2Fvideos%2F201354774131642%2F&show_text=0&width=560" width="100%" height="400" style="border:none;overflow:hidden"
 scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
</div> -->
  </div>
</div>
<!-- 
<div class="sec-2">
<ul id="c"> 	
		<li><p><strong>1</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li><p><strong>2</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li><p><strong>3</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li><p><strong>4</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>

		<li><p><strong>5</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li><p><strong>6</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li><p><strong>7</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li><p><strong>8</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li> 

		<li><p><strong>9</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li><p><strong>10</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li><p><strong>11</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li><p><strong>12</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li> 
	</ul>
    </div> -->
<div class="sec-3">
  <section class="customer-logos slider">
    <div class="slide"><img src="images/werner-logo.png"></div>
    <div class="slide"><img src="images/anclo-logo.png"></div>
    <div class="slide"><img src="images/austromex-logo.jpg"></div>
    <div class="slide"><img src="images/bosch-logo.jpg"></div>
    <div class="slide"><img src="images/cifunsa-logo.jpg"></div>
    <div class="slide"><img src="images/deacero-logo.gif"></div>
    <div class="slide"><img src="images/dewalt-logo.png"></div>
    <div class="slide"><img src="images/escalumex-logo.jpg"></div>
    <div class="slide"><img src="images/fanal-logo.jpg"></div>
    <div class="slide"><img src="images/fandeli-logo.jpg"></div>
    <div class="slide"><img src="images/fifa.png"></div>
    <div class="slide"><img src="images/fischer-logo.png"></div>
    <div class="slide"><img src="images/helvex.jpg"></div>
    <div class="slide"><img src="images/henkel-logo.png"></div>
    <div class="slide"><img src="images/intec-logo.jpg"></div>
    <div class="slide"><img src="images/truper-logo.png"></div>
    <div class="slide"><img src="images/3m-logo.png"></div>
  </section>
</div>
              </div>
              
              <br>
		          <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v6.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="182875078985108"
  theme_color="#6699cc"
  logged_in_greeting="Buen día, ¿En que podemos ayudarte?"
  logged_out_greeting="Buen día, ¿En que podemos ayudarte?">
      </div>

<?php
include "views/modules/footer.php";
?>