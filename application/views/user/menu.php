   <section class="home-slider owl-carousel">

       <div class="slider-item" style="background-image: url(<?= base_url('assets/') ?>images/bg_3.jpg);"
           data-stellar-background-ratio="0.5">
           <div class="overlay"></div>
           <div class="container">
               <div class="row slider-text justify-content-center align-items-center">

                   <div class="col-md-7 col-sm-12 text-center ftco-animate">
                       <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                       <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span>
                       </p>
                   </div>

               </div>
           </div>
       </div>
   </section>

   <section class="ftco-intro">
       <div class="container-wrap">
           <div class="wrap d-md-flex align-items-xl-end">
               <div class="info">
                   <div class="row no-gutters">
                       <div class="col-md-4 d-flex ftco-animate">
                           <div class="icon"><span class="icon-phone"></span></div>
                           <div class="text">
                               <h3>000 (123) 456 7890</h3>
                               <p>A small river named Duden flows by their place and supplies.</p>
                           </div>
                       </div>
                       <div class="col-md-4 d-flex ftco-animate">
                           <div class="icon"><span class="icon-my_location"></span></div>
                           <div class="text">
                               <h3>198 West 21th Street</h3>
                               <p> 203 Fake St. Mountain View, San Francisco, California, USA</p>
                           </div>
                       </div>
                       <div class="col-md-4 d-flex ftco-animate">
                           <div class="icon"><span class="icon-clock-o"></span></div>
                           <div class="text">
                               <h3>Open Monday-Friday</h3>
                               <p>8:00am - 9:00pm</p>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="book p-4">
                   <h3>Book a Table</h3>
                   <form action="#" class="appointment-form">
                       <div class="d-md-flex">
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder="First Name">
                           </div>
                           <div class="form-group ml-md-4">
                               <input type="text" class="form-control" placeholder="Last Name">
                           </div>
                       </div>
                       <div class="d-md-flex">
                           <div class="form-group">
                               <div class="input-wrap">
                                   <div class="icon"><span class="ion-md-calendar"></span></div>
                                   <input type="text" class="form-control appointment_date" placeholder="Date">
                               </div>
                           </div>
                           <div class="form-group ml-md-4">
                               <div class="input-wrap">
                                   <div class="icon"><span class="ion-ios-clock"></span></div>
                                   <input type="text" class="form-control appointment_time" placeholder="Time">
                               </div>
                           </div>
                           <div class="form-group ml-md-4">
                               <input type="text" class="form-control" placeholder="Phone">
                           </div>
                       </div>
                       <div class="d-md-flex">
                           <div class="form-group">
                               <textarea name="" id="" cols="30" rows="2" class="form-control"
                                   placeholder="Message"></textarea>
                           </div>
                           <div class="form-group ml-md-4">
                               <input type="submit" value="Appointment" class="btn btn-white py-3 px-4">
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>

   <section class="ftco-section">
       <div class="container">
           <div class="row">
               <div class="row">
                   <h3 class="mb-5 heading-pricing ftco-animate">Menu</h3>
                   <?php
            
                    foreach ($menu as $key => $value) {
                 
                        $id_menu = $value->id_cafe;
                    ?>
                   <div class="pricing-entry d-flex ftco-animate">
                       <a href="<?= base_url() ?>user/detail_menu">
                           <div class="img"
                               style="background-image: url(<?= base_url('upload/') ?>menu/<?php echo $value->foto_menu ?>">
                           </div>
                       </a>
                       <div class="desc pl-3">
                           <div class="d-flex text align-items-center">
                               <h3><span><?= $value->nama_menu ?></span></h3>
                               <span class="price"><?= $value->harga ?></span>
                           </div>
                           <div class="d-block">
                               <p><?= $value->detail ?></p>
                           </div>
                       </div>
                   </div>
                   <?php  } ?>
               </div>
           </div>
           <section class="ftco-section">
               <div class="container">
                   <div class="row">
                       <div class="col-md-8 ftco-animate">




                           <div class="pt-5 mt-5">
                               <h4><?php echo $jumlah['jumlah_koment'] ?> Comments</h4>

                               <?php foreach ($koment as $key => $value) {
                                    # code...
                                    $id_komentar = $value->id_cafe;
                                ?>
                               <ul class="comment-list">
                                   <li class="comment">
                                       <div class="vcard bio">
                                           <img src="<?=base_url('upload/menu/profile.jpg') ?>" alt="Image placeholder">
                                       </div>
                                       <div class="comment-body">
                                           <h3> <?php echo $value->email_komentar ?> </h3>
                                           <div class=" meta"><?php echo $value->komen ?></p>
                                               <p><a href="#" class="reply">Reply</a></p>
                                           </div>
                                   </li>

                               </ul>
                               <?php } ?>
                               <!-- END comment-list -->


                               <div class="comment-form-wrap pt-5">
                                   <h3 class="mb-5">Leave a comment</h3>
                                   <form method="POST" class="form-contact comment_form"
                                       action="<?php echo base_url('user/koment/'. $id_komentar)?>">
                                       <div class="form-group">
                                           <label for="name">Name *</label>
                                           <input type="text" class="form-control" id="name" name="nama">
                                       </div>
                                       <div class=" form-group">
                                           <label for="email">Email *</label>
                                           <input type="email" class="form-control" id="email" name="email">
                                       </div>
                                       <div class=" form-group">
                                           <label for="message">Message</label>
                                           <textarea name="komentar" id="komentar" cols="30" rows="10"
                                               class="form-control"></textarea>
                                       </div>
                                       <div class="form-group">
                                           <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                       </div>

                                   </form>
                               </div>

                           </div>

                       </div> <!-- .col-md-8 -->

                   </div>
               </div>
           </section> <!-- .section -->
       </div>
   </section>