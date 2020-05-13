  
<?php
include "views/modules/header.php";
?>
  <div class="container">

		<br><br><br><br>

     <h3 class="text-center text-light bg-dark ">Muy cerca de ti</h3> <br>

    <div id="map"></div>

    <script>

      function initMap() {

        var uluru = {lat:  19.317755, lng: -99.07454099999995};

        var map = new google.maps.Map(document.getElementById('map'), {

          zoom: 18,

          center: uluru,

        });

        var marker = new google.maps.Marker({

          position: uluru,

          map: map

        });

      }

    </script>

      <script async defer

    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjrXjXUFZ22tKxeUYApYdypdPTBWoBqw8&callback=initMap">

    </script>

  </div>

<br><br>

<?php
include "views/modules/footer.php";
?>