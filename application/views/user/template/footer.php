<footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="single-footer-widget footer_1">
                    <a href=" index.html"> <img style="height: 200px; width: 150px"
                            src="<?php echo base_url('assets/') ?>logo.png" alt=""> </a>
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
                        <p><span> Telephon :</span> (0285) 421878</p>
                        <p><span> Email : </span>Coffe@Batang.go.id. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Ayu Putri Pratiwi</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#F96D00" />
    </svg></div>


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
<script src="<?= base_url('assets/');?>js/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvtEWZ71MgdB_u_n1p0PEh7VTKcEpM6KE&callback=initMap">
</script>


<script>
$("#pilihKec").change(function() {

    var kecamatan_id = $(this).val();
    if (kecamatan_id !== '') {
        $.ajax({

            url: "<?= base_url(); ?>user/getKelurahan",
            method: "POST",
            dataType: "json",
            data: {
                kecamatan_id: kecamatan_id
            },
            success: function(data) {
                $("#pilihKel").html(data);
            }
        });
    } else {
        $("#pilihKel").html('<option value="">--Pilih L--</option>');
    }
});

<?php if( $nav == 'home'){ ?>
var map;
var markers = [];

function initMap() {
    var uluru = {
        lat: -6.908,
        lng: 109.7326
    };
    var grayStyles = [{
            featureType: "all",
            stylers: [{
                    saturation: -70
                },
                {
                    lightness: 40
                }
            ]
        },
        {
            elementType: 'labels.text.fill',
            stylers: [{
                color: '#ccdee9'
            }]
        }
    ];
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: -6.908,
            lng: 109.7326
        },
        zoom: 12,
        styles: grayStyles,
        scrollwheel: false
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

function tmpl() {

    var nama_kecamatan = 'k';
    $.getJSON('<?= base_url() ?>user/viewmarker/' + nama_kecamatan, function(data) {
        clearmap();
        $.each(data, function(k, v) {
            var pos = {
                lat: parseFloat(v.latitude),
                lng: parseFloat(v.longitude)
            };
            var contentString =
                '<div id="content" class="card">' +
                '<img height="150px" width="300px" style="text-align:center" src="<?= base_url('upload/cafe/'); ?>' +
                v.foto + '"><br>' +
                '<div class="card"><a href="<?php echo base_url('user/list_cafe/') ?>' + v.id_cafe +
                '" class="btn btn-success" type="button">Lihat Detail</a></div>' +
                '<div id="bodyContent" class="p ll">' +
                '<div style="margin-left:30px; font-size:20px;" id="firstHeading" class="firstHeading"><b>Coffe :' +
                v.nama_cafe + '</b></div><br>' +
                '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Nama Pemilik </b> : ' +
                v.nama_pemilik + '</div>' +
                '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Kecamatan </b> : ' +
                v.nama_kecamatan + '</div>' +
                '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Kelurahan </b> : ' +
                v.nama_kelurahan + '</div>' +
                '<div style="margin-left: 30px; margin-bottom: 30px; font-size: 12px;">Kontak : <a href="https://api.whatsapp.com/send?phone=+62' +
                v.email_pemilik + '" target="_blank" >Hubungi Saya</a>'
            '</div>' +
            '</div>' +
            '</div>';
            addMarker(v.nama_pemilik, pos, v.icon, contentString);
        });
    });
};

tmpl();

$('#kecamatan').change(function() {
    var nama_kecamatan = $(this).val()
    $.getJSON('<?= base_url() ?>user/viewmarker/' + nama_kecamatan, function(data) {
        clearmap();
        $.each(data, function(k, v) {
            var pos = {
                lat: parseFloat(v.latitude),
                lng: parseFloat(v.longitude)
            };
            var contentString =
                '<div id="content" class="card">' +
                '<img height="150px" width="300px" style="text-align:center" src="<?= base_url('upload/cafe/'); ?>' +
                v.foto + '"><br>' +
                '<div class="card"><a href="<?php echo base_url('user/list_cafe/') ?>' + v
                .id_cafe + '" class="btn btn-success" type="button">Lihat Detail</a></div>' +
                '<div id="bodyContent" class="p ll">' +
                '<div style="margin-left:30px; font-size:20px;" id="firstHeading" class="firstHeading"><b><u>' +
                v.nama_cafe + '</u></b></div><br>' +
                '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Nama Pemilik </b> : ' +
                v.nama_pemilik + '</div>' +
                '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Kecamatan </b> : ' +
                v.nama_kecamatan + '</div>' +
                '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Kelurahan </b> : ' +
                v.nama_kelurahan + '</div>' +
                '<div style="margin-left: 30px; margin-bottom: 30px; font-size: 12px;">Kontak : <a href="https://api.whatsapp.com/send?phone=+62' +
                v.email_pemilik + '" target="_blank" >Hubungi Saya</a>'
            '</div>' +
            '</div>' +
            '</div>';
            addMarker(v.nama_pemilik, pos, v.icon, contentString);
        });
    });
})


function addMarker(nama, location, icon, contentString) {
    var infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 400,
    });

    var marker = new google.maps.Marker({
        position: location,
        map: map,
        title: nama,
        animation: google.maps.Animation,
        icon: '<?php echo base_url('upload/icons/3.png') ?>'
    });
    markers.push(marker);
    marker.addListener("click", () => {
        infowindow.open(map, marker);
    });
}
google.maps.event.addDomListener(window, 'load', initMap);

<?php }else if($nav == 'pengajuan'){ ?>


var map;
var markers = [];

function initialize() {
    var mapOptions = {
        zoom: 12,
        // Center di kantor kabupaten kudus
        center: new google.maps.LatLng(-6.908, 109.7326)
    };

    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    // Add a listener for the click event
    google.maps.event.addListener(map, 'click', addLatLng); //ambil koordinat dengan klik kanan
    google.maps.event.addListener(map, "click", function(
        event) { //saat klik kanan mengambil data koordinat latitude dan longitude
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
<?php } ?>

$(document).on('click', '#cari', function() {
    var nomor = $("#nomor").val();
    var nik = $("#nik").val();
    if (nomor == '' || nik == '') {
        alert('Isi nomor penyewa dan nik terlebih dahulu')
    } else {
        var url = "<?php echo base_url('user/pengajuanDetail/:nomor/:nik') ?>"
        alert(nomor)
        url = url.replace(':nomor', nomor)
        url = url.replace(':nik', nik)
        $('#cari').attr('href', url)
        alert(url)
    }

})
</script>
</body>

</html>