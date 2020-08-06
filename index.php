<?php include 'inc/header.php'; ?>
<!-- Hero -->
        <section id="slider" class="hero p-0 odd featured left">
            <div class="swiper-container no-slider animation slider-h-100 alt">
                <div class="swiper-wrapper">
                	<style type="text/css">
                		@media only screen and (max-width: 600px) {
                			#her{
                				visibility: hidden;
                			}
                		}
                	</style>
                    <!-- Item 1 -->
                    <div class="swiper-slide slide-center">
                        <img data-aos="zoom-out-up" data-aos-delay="800"  src="assets/images/hero2.png" id="her" class="hero-image" alt="Hero Image">
                        <div class="slide-content row">
                            <div class="col-12 d-flex inner">
                                <div class="left align-self-center text-center text-md-left">
                                    <h2 class="featured">Any<b style="color: #5900ff; text-transform: capitalize;">C</b>rypt <b style="color: #5900ff; text-transform: capitalize;">(<i class="icon-lock"></i>)</b></h2>
                                    <p data-aos="zoom-out-up" data-aos-delay="800" class="description">Collection of Smart tools which are used to increase the vulnerability of the User's Uploaded Files.</p>
                                    <a href="#services" data-aos="zoom-out-up" data-aos-delay="1200" class="smooth-anchor ml-auto mr-auto ml-md-0 mt-4 btn dark-button"></i><i class="icon-key"></i>GET STARTED</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

 <!-- Services -->
        <section id="services" class="section-4 odd offers featured left">
            <div class="container">
                <div class="row intro">
                    <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                        <h2 class="featured">Our Products</h2>
                        <p>Collection of Applications provided under AnyCrypt platform</p>
                    </div>
                    <div class="col-12 col-md-3 align-self-end">
                        <a data-toggle="modal" data-target="#search" href="#" class="btn mx-auto mr-md-0 ml-md-auto dark-button"><i class="icon-magnifier"></i>Search</a>
                    </div>
                </div>
                <div class="row justify-content-center text-center items">
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card featured">
                            <i class="icon icon-lock"></i>
                            <h4>File Encryption</h4>
                            <p>AES,DES,TripleDES</p>
                            <a href="#" data-toggle="modal" data-target="#encrypt"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card">
                            <i class="icon icon-key"></i>
                            <h4>File Decryption</h4>
                            <p>AES,DES,TripleDES</p>
                            <a href="#" data-toggle="modal" data-target="#decrypt"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                     <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card">
                            <i class="icon icon-link"></i>
                            <h4>Temporary Links</h4>
                            <p>Self Destruction File Sharing</p>
                            <a data-toggle="modal" data-target="#links" href="#"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card">
                            <i class="icon icon-location-pin"></i>
                            <h4>File Tracking</h4>
                            <p>Last Utilized / Decrypted location </p>
                            <a data-toggle="modal" data-target="#more" href="#"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card">
                            <i class="icon icon-folder-alt"></i>
                            <h4>Analyse File</h4>
                            <p>Encryption and other details</p>
                            <a data-toggle="modal" data-target="#more" href="#"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 item">
                        <div class="card featured">
                        	
                            <i class="icon icon-picture"></i>
                            <h4>Hide<i style="color: #5900ff;">ON</i></h4>
                            <p>Hide your Message in any Image</p>
                            <a data-toggle="modal" data-target="#hideon" href="#"><i class="btn-icon icon-arrow-right-circle"></i></a>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </section>

<?php include 'inc/footer.php'; ?>