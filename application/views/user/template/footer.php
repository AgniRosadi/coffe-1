<footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
      <div class="row justify-content-between">
      <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="single-footer-widget footer_1">
          <a href=" index.html"> <img style="height: 200px; width: 150px" src="<?php echo base_url('assets/') ?>logo.png" alt=""> </a>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-xl-4">
        <div class="single-footer-widget footer_2">
          <h4>Sistem Pemetaan Cafe DI Kabupaten Batang</h4>
          <p>Cara Mudah Menemukan Cafe Maupun Kedai Kopi Di Kabupaten Batang
          </p>
          <div class="social_icon">
            <a href=" #"> <i class="ti-facebook"></i> </a>
            <a href=" #"> <i class="ti-twitter-alt"></i> </a>
            <a href=" #"> <i class="ti-instagram"></i> </a>
            <a href=" #"> <i class="ti-skype"></i> </a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-md-4">
        <div class="single-footer-widget footer_2">
          <h4>Hubungi Kami</h4>
          <div class="contact_info">
            <p><span> Alamat :</span> Jl. Paninggaran Batang </p>
            <p><span> Telephon :</span>  (0285) 421878</p>
            <p><span> Email : </span>Coffe@Batang.go.id. </p>
          </div>
        </div>
      </div>
    </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Ayu Putri Pratiwi</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?= base_url('assets/');?>js/jquery.min.js"></script>
  <script src="<?= base_url('assets/');?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= base_url('assets/');?>js/popper.min.js"></script>
  <script src="<?= base_url('assets/');?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/');?>js/jquery.easing.1.3.js"></script>
  <script src="<?= base_url('assets/');?>js/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('assets/');?>js/jquery.stellar.min.js"></script>
  <script src="<?= base_url('assets/');?>js/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/');?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url('assets/');?>js/aos.js"></script>
  <script src="<?= base_url('assets/');?>js/jquery.animateNumber.min.js"></script>
  <script src="<?= base_url('assets/');?>js/bootstrap-datepicker.js"></script>
  <script src="<?= base_url('assets/');?>js/jquery.timepicker.min.js"></script>
  <script src="<?= base_url('assets/');?>js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?= base_url('assets/');?>js/google-map.js"></script>
  <script src="<?= base_url('assets/');?>js/main.js"></script>
  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvtEWZ71MgdB_u_n1p0PEh7VTKcEpM6KE&callback=initMap"></script>
    

  <script>

     $("#pilihKec").change(function(){

    var kecamatan_id = $(this).val();
    if(kecamatan_id !==''){
      $.ajax({

        url:"<?= base_url(); ?>user/getKelurahan",
        method:"POST",
        dataType:"json",
        data:{kecamatan_id : kecamatan_id},
        success:function(data){
          $("#pilihKel").html(data);
        }
      });
    }else{
      $("#pilihKel").html('<option value="">--Pilih L--</option>');
    }
  });


    var map;
 var markers = [];

 function initialize() {
  var mapOptions = {
    zoom: 12,
            // Center di kantor kabupaten kudus
            center: new google.maps.LatLng(-6.8959407, 109.6394839)
          };

          map = new google.maps.Map(document.getElementById('map'), mapOptions);

        // Add a listener for the click event
        google.maps.event.addListener(map, 'click', addLatLng); //ambil koordinat dengan klik kanan
        google.maps.event.addListener(map, "click", function(event) { //saat klik kanan mengambil data koordinat latitude dan longitude
          var lat = event.latLng.lat();
          var lng = event.latLng.lng();
          $('#latitude').val(lat);
          $('#longitude').val(lng);
            //alert(lat +" dan "+lng);
          });
      }

      function clearmap() {
        setMapOnAll(null);
      }

      function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
        markers = [];
      }

      function addLatLng(event) {
        var marker = new google.maps.Marker({
          position: event.latLng,
          title: 'Simple GIS',
          map: map
        });
        markers.push(marker);
      }

      google.maps.event.addDomListener(window, 'load', initialize); 
  </script>
  </body>
</html>