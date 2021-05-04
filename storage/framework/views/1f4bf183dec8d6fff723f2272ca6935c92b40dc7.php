<!DOCTYPE html>
<html lang="en-us">

<head>
   <?php echo $__env->make('layout.partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <div class="loader">
        <div class="loading"></div>
    </div>
    <?php echo $__env->make('layout.partial.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <?php echo $__env->yieldContent('menuoption'); ?>
   
  
   
    <!--
    
    <section id="services" class="page">
        <div class="container">
            <div class="content text-center">
                <div class="heading">
                    <h2 class="mt-0 mb-4">What we love doing.</h2>
                    <div class="border"></div>
                    <p class="mt-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, alias enim placeat earum quos ab.</p>
                </div>
                <div class="row">
                    <div class="col-sm-4 service animated hiding" data-animation="fadeInUp" data-delay="300">
                        <i class="fa fa-globe fa-5x"></i>
                        <h3 class="mt-5 mb-4"><a href="#">Web Design</a></h3>
                        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                    </div>
                    <div class="col-sm-4 service animated hiding" data-animation="fadeInUp" data-delay="600">
                        <i class="fa fa-cloud fa-5x"></i>
                        <h3 class="mt-5 mb-4"><a href="#">Web Development</a></h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lau dantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta.</p>
                    </div>
                    <div class="col-sm-4 service animated hiding" data-animation="fadeInUp" data-delay="900">
                        <i class="fa fa-mobile fa-5x"></i>
                        <h3 class="mt-5 mb-4"><a href="#">Mobile Development</a></h3>
                        <p>Aliquam aliquet, est a ullamcorper condimentum, tellus nulla fringilla elit, a iaculis nulla turpis sed wisi. Fusce volutpat. Etiam sodales ante id nunc. Proin ornare dignissim lacus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="work" class="page">
        <div class="container">
            <div class="content text-center">
                <div class="heading">
                    <h2 class="mt-0 mb-4">This is how we do it.</h2>
                    <div class="border"></div>
                    <p class="mt-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, alias enim placeat earum quos ab.</p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="portfolio">
                            <ul class="filters list-inline">
                                <li class="list-inline-item">
                                    <a class="active" data-filter="*" href="#">All</a>
                                </li>
                                <li class="list-inline-item">
                                    <a data-filter=".photography" href="#">Photography</a>
                                </li>
                                <li class="list-inline-item">
                                    <a data-filter=".branding" href="#">Branding</a>
                                </li>
                                <li class="list-inline-item">
                                    <a data-filter=".web" href="#">Web</a>
                                </li>
                            </ul>
                            <ul class="items list-unstyled clearfix animated hiding mb-0" data-animation="fadeInRight">
                                <li class="item branding">
                                    <a href="work.html" data-gall="work" data-vbtype="ajax">
                                        <img src="" alt="">
                                        <div class="overlay">
                                            <span>Etiam porta</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="item photography">
                                    <a href="work.html" data-gall="work" data-vbtype="ajax">
                                    <img src="" alt="">
                                        <div class="overlay">
                                            <span>Lorem ipsum</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="item branding">
                                    <a href="work.html" data-gall="work" data-vbtype="ajax">
                                        <img src="" alt="">
                                        <div class="overlay">
                                            <span>Vivamus quis</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="item photography">
                                    <a href="work.html" data-gall="work" data-vbtype="ajax">
                                        <img src="" alt="">
                                        <div class="overlay">
                                            <span>Donec ac tellus</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="item photography">
                                    <a href="work.html" data-gall="work" data-vbtype="ajax">
                                        <img src="" alt="">
                                        <div class="overlay">
                                            <span>Etiam volutpat</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="item web">
                                    <a href="work.html" data-gall="work" data-vbtype="ajax">
                                        <img src="  " alt="">
                                        <div class="overlay">
                                            <span>Donec congue </span>
                                        </div>
                                    </a>
                                </li>
                                <li class="item photography">
                                    <a href="work.html" data-gall="work" data-vbtype="ajax">
                                        <img src="  " alt="">
                                        <div class="overlay">
                                            <span>Nullam a ullamcorper diam</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="item web">
                                    <a href="work.html" data-gall="work" data-vbtype="ajax">
                                        <img src=" " alt="">
                                        <div class="overlay">
                                            <span>Etiam consequat</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="clients" class="page">
        <div class="container">
            <div class="content text-center">
                <div class="row">
                    <div class="col-sm-12 animated hiding" data-animation="fadeInDown">
                        <div id="testimonials" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#testimonials" data-slide-to="0" class="active"></li>
                                <li data-target="#testimonials" data-slide-to="1" class=""></li>
                                <li data-target="#testimonials" data-slide-to="2" class=""></li>
                                <li data-target="#testimonials" data-slide-to="3" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active flex-column">
                                    <p class="quote mb-4">Quisque convallis diam ligula, ac accumsan eros pretium vel. Curabitur convallis nibh sit amet iaculis ornare. Integer blandit quis diam sed tincidunt.</p>
                                    <p class="client mb-5">John Doe / CEO</p>
                                </div>
                                <div class="carousel-item flex-column">
                                    <p class="quote mb-4">Vestibulum volutpat accumsan sem non eleifend. Vivamus pretium nisi semper sapien eleifend, vel lacinia lacus sodales. Morbi bibendum purus at leo laoreet, vel ultricies orci viverra.</p>
                                    <p class="client mb-5">Jorginho Jian / Developer</p>
                                </div>
                                <div class="carousel-item flex-column">
                                    <p class="quote mb-4">Curabitur in nulla et lorem varius convallis. Morbi bibendum purus at leo laoreet, vel ultricies orci viverra. Duis quis accumsan urna. Nulla faucibus mauris elit, vitae tristique nisi sollicitudin ut.</p>
                                    <p class="client mb-5">Gandalf Kadir / Web Designer</p>
                                </div>
                                <div class="carousel-item flex-column">
                                    <p class="quote mb-4">Nullam vel tempor quam, id dictum eros. Nam augue sem, aliquam ac mauris in, pharetra convallis quam. Nulla faucibus mauris elit, vitae tristique nisi sollicitudin ut. Vivamus pretium nisi semper sapien eleifend.</p>
                                    <p class="client mb-5">Homeros Yehudi / QA Engineer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="page">
        <div class="container">
            <div class="content text-center">
                <div class="heading">
                    <h2 class="mt-0 mb-4">About Us.</h2>
                    <div class="border"></div>
                    <p class="mt-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor.</p>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 teammate animated hiding" data-animation="fadeInLeft" data-delay="600">
                        <div class="profile-photo">
                            <img class="img-fluid" src="img/team/1.jpg" alt="">
                        </div>
                        <div class="bio mt-4">
                            <h5 class="mb-1">John Doe</h5>
                            <p>Web Developer</p>
                            <div class="border mt-4 mb-4"></div>
                            <p>Lorem ipsum dolor sit, consetetur sadipscing elitr, diam nonumy eirmod tempor invidunt ut labore.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="http://www.facebook.com" title="Facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="http://www.twitter.com" title="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="http://www.linkedin.com" title="LinkedIn">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="http://www.github.com" title="GitHub">
                                        <i class="fa fa-github"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 teammate animated hiding" data-animation="fadeInUp" data-delay="300">
                        <div class="profile-photo">
                            <img class="img-fluid" src="img/team/2.jpg" alt="">
                        </div>
                        <div class="bio mt-4">
                            <h5 class="mb-1">Clarinda Gratia</h5>
                            <p>Designer</p>
                            <div class="border mt-4 mb-4"></div>
                            <p>Lorem ipsum dolor sit, consetetur sadipscing elitr, diam nonumy eirmod tempor invidunt ut labore.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="http://www.dribbble.com" title="Dribbble">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="http://www.pinterest.com" title="Pinterest">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="http://www.instagram.com" title="Instagram">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 teammate animated hiding" data-animation="fadeInUp" data-delay="300">
                        <div class="profile-photo">
                            <img class="img-fluid" src="" alt="">
                        </div>
                        <div class="bio mt-4">
                            <h5 class="mb-1">Mandeep Eimear</h5>
                            <p>Mobile Developer</p>
                            <div class="border mt-4 mb-4"></div>
                            <p>Lorem ipsum dolor sit, consetetur sadipscing elitr, diam nonumy eirmod tempor invidunt ut labore.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="http://www.twitter.com" title="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="http://developer.android.com/index.html" title="Android Developers">
                                        <i class="fa fa-android"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="http://www.stackoverflow.com" title="Stack Overflow">
                                        <i class="fa fa-stack-overflow"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 teammate animated hiding" data-animation="fadeInRight" data-delay="600">
                        <div class="profile-photo">
                            <img class="img-fluid" src="" alt="">
                        </div>
                        <div class="bio mt-4">
                            <h5 class="mb-1">Wigstan Fergus</h5>
                            <p>QA Engineer</p>
                            <div class="border mt-4 mb-4"></div>
                            <p>Lorem ipsum dolor sit, consetetur sadipscing elitr, diam nonumy eirmod tempor invidunt ut labore.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="http://www.plus.google.com" title="Google+">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="http://www.trello.com" title="Trello">
                                        <i class="fa fa-trello"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="mailto:john.doe@mail.com" title="Email">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="page overlay">
        <div class="container">
            <div class="content cover text-center">
                <div class="heading">
                    <h2 class="mt-0 mb-4">Getting in touch.</h2>
                    <div class="border"></div>
                    <p class="mt-4 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="row">
                    <div class="col-sm-4 animated hiding" data-animation="fadeInRight" data-delay="600">
                        <i class="fa fa-map-marker fa-3x"></i>
                        <a href="#">Mostar, Bosnia and Herzegovina</a>
                    </div>
                    <div class="col-sm-4 animated hiding" data-animation="fadeInDown" data-delay="300">
                        <i class="fa fa-phone fa-3x"></i>
                        <a href="tel:9876543210">(987) 654-3210</a>
                    </div>
                    <div class="col-sm-4 animated hiding" data-animation="fadeInLeft" data-delay="600">
                        <i class="fa fa-envelope fa-3x"></i>
                        <a href="mailto:john.doe@mail.com">john.doe@mail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    }}
-->
<footer id="footer">
    Created by <a href="#">swiftci</a><i class="fa fa-copyright" aria-hidden="true">2021</i>

</footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.4/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.3/imagesloaded.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-one-page-nav/3.0.0/jquery.nav.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.appear/0.3.3/jquery.appear.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.8.2/venobox.min.js"></script>
    <script src=" <?php echo e(asset('home/js/script.js?v=1.0')); ?>"></script>
    <!-- Google Analytics: change UA-25089888-9 to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-25089888-9');ga('send','pageview');
    </script>
    <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
</body>

</html>
<?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/layout/homeLayout.blade.php ENDPATH**/ ?>