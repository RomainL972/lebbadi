<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    />

    <title>My personal website - lebbadi.fr</title>
<!--
Reflux Template
https://templatemo.com/tm-531-reflux
-->
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-style.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/lightbox.css" />
  </head>

  <body>
    <div id="page-wraper">
      <!-- Sidebar Menu -->
      <div class="responsive-nav">
        <i class="fa fa-bars" id="menu-toggle"></i>
        <div id="menu" class="menu">
          <i class="fa fa-times" id="menu-close"></i>
          <div class="container">
            <div class="image">
              <a href="#"><img src="assets/images/author-image.png" alt="" /></a>
            </div>
            <div class="author-content">
              <h4>Romain Lebbadi-Breteau</h4>
              <span>Computer Engineering Student</span>
            </div>
            <nav class="main-nav" role="navigation">
              <ul class="main-menu">
                <li><a href="#section1">About Me</a></li>
                <li><a href="#section2">What I’m good at</a></li>
                <li><a href="#section3">My Work</a></li>
                <li><a href="#section4">Contact Me</a></li>
              </ul>
            </nav>
            <div class="social-network">
              <ul class="social-icons">
                <li>
                  <a href="https://www.github.com/RomainL972" target="_blank">
                      <i class="fa fa-github"></i>
                  </a>
                </li>
                <li>
                  <a href="https://www.facebook.com/romain.lebbadibreteau.56/" target="_blank">
                      <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="https://stackoverflow.com/users/9561783/romain-l" target="_blank">
                      <i class="fa fa-stack-overflow"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="copyright-text">
              <p>Copyright 2021 Romain Lebbadi-Breteau</p>
            </div>
          </div>
        </div>
      </div>

      <section class="section about-me" data-section="section1">
        <div class="container">
	  <div class="section-heading">
<?php
if (!empty($_SESSION["msg"])) {
	echo "<div class=\"alert alert-primary\" role=\"alert\">${_SESSION["msg"]}</div>";
	$_SESSION["msg"] = NULL;
}
?>
            <h2>About Me</h2>
            <div class="line-dec"></div>
            <span
              >Hello, welcome to my personal website.
              By the way, <strong>Linux &gt; Windows</strong>.</span
            >
          </div>
          <?php /*
          <!-- <div class="left-image-post">
            <div class="row">
              <div class="col-md-6">
                <div class="left-image">
                  <img src="assets/images/left-image.jpg" alt="" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="right-text">
                  <h4>Reflux HTML CSS Template</h4>
                  <p>
                    Donec tristique feugiat lacus, at sollicitudin nunc euismod
                    sed. Mauris viverra, erat non sagittis gravida, elit dui
                    mollis ante, sit amet eleifend purus ligula eget eros. Sed
                    tincidunt quam vitae neque pharetra dignissim eget ut
                    libero.
                  </p>
                  <div class="white-button">
                    <a href="#">Read More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="right-image-post">
            <div class="row">
              <div class="col-md-6">
                <div class="left-text">
                  <h4>Sed sagittis rhoncus velit</h4>
                  <p>
                    Pellentesque habitant morbi tristique senectus et netus et
                    malesuada fames ac turpis egestas. Vestibulum fermentum
                    eleifend nibh, vitae sodales elit finibus pretium.
                    Suspendisse potenti. Ut sollicitudin risus a sollicitudin
                    semper.
                  </p>
                  <div class="white-button">
                    <a href="#">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="right-image">
                  <img src="assets/images/right-image.jpg" alt="" />
                </div>
              </div>
            </div>
        </div> --> */ ?>
        </div>
      </section>

      <section class="section my-services" data-section="section2">
        <div class="container">
          <div class="section-heading">
            <h2>What I’m good at?</h2>
            <div class="line-dec"></div>
            <span
              >I'm good at programming, and web app development.</span
            >
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="service-item">
                <div class="first-service-icon service-icon"></div>
                <h4>HTML5 &amp; CSS3</h4>
                <p>
                  I know these, and I can make websites with them if you want.
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="service-item">
                <div class="second-service-icon service-icon"></div>
                <h4>C++</h4>
                <p>
                  I'm good at C++, I can make algorithms.
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="service-item">
                <div class="third-service-icon service-icon"></div>
                <h4>Linux</h4>
                <p>
                  I know system administration, Linux, bash scripts...
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="service-item">
                <div class="fourth-service-icon service-icon"></div>
                <h4>Python</h4>
                <p>
                  Even though it sucks, I'm quite good at Python too.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section my-work" data-section="section3">
        <div class="container">
          <div class="section-heading">
            <h2>My Work</h2>
            <div class="line-dec"></div>
            <span
              >I've done many things.</span
            >
	    <p>Examples :</p>
	    <ul>
		    <li><a href="//kreyolgym.fr">Kréyol Gym website</a></li>
	    </ul>
          </div>
          <?php /* <div class="row">
            <div class="isotope-wrapper">
              <form class="isotope-toolbar">
                <label
                  ><input
                    type="radio"
                    data-type="*"
                    checked=""
                    name="isotope-filter"
                  />
                  <span>all</span></label
                >
                <label
                  ><input
                    type="radio"
                    data-type="people"
                    name="isotope-filter"
                  />
                  <span>people</span></label
                >
                <label
                  ><input
                    type="radio"
                    data-type="nature"
                    name="isotope-filter"
                  />
                  <span>nature</span></label
                >
                <label
                  ><input
                    type="radio"
                    data-type="animals"
                    name="isotope-filter"
                  />
                  <span>animals</span></label
                >
              </form>
              <div class="isotope-box">
                <div class="isotope-item" data-type="nature">
                  <figure class="snip1321">
                    <img
                      src="assets/images/portfolio-01.jpg"
                      alt="sq-sample26"
                    />
                    <figcaption>
                      <a
                        href="assets/images/portfolio-01.jpg"
                        data-lightbox="image-1"
                        data-title="Caption"
                        ><i class="fa fa-search"></i
                      ></a>
                      <h4>First Title</h4>
                      <span>free to use our template</span>
                    </figcaption>
                  </figure>
                </div>

                <div class="isotope-item" data-type="people">
                  <figure class="snip1321">
                    <img
                      src="assets/images/portfolio-02.jpg"
                      alt="sq-sample26"
                    />
                    <figcaption>
                      <a
                        href="assets/images/portfolio-02.jpg"
                        data-lightbox="image-1"
                        data-title="Caption"
                        ><i class="fa fa-search"></i
                      ></a>
                      <h4>Second Title</h4>
                      <span>please tell your friends</span>
                    </figcaption>
                  </figure>
                </div>

                <div class="isotope-item" data-type="animals">
                  <figure class="snip1321">
                    <img
                      src="assets/images/portfolio-03.jpg"
                      alt="sq-sample26"
                    />
                    <figcaption>
                      <a
                        href="assets/images/portfolio-03.jpg"
                        data-lightbox="image-1"
                        data-title="Caption"
                        ><i class="fa fa-search"></i
                      ></a>
                      <h4>Item Third</h4>
                      <span>customize anything</span>
                    </figcaption>
                  </figure>
                </div>

                <div class="isotope-item" data-type="people">
                  <figure class="snip1321">
                    <img
                      src="assets/images/portfolio-04.jpg"
                      alt="sq-sample26"
                    />
                    <figcaption>
                      <a
                        href="assets/images/portfolio-04.jpg"
                        data-lightbox="image-1"
                        data-title="Caption"
                        ><i class="fa fa-search"></i
                      ></a>
                      <h4>Item Fourth</h4>
                      <span>Re-distribution not allowed</span>
                    </figcaption>
                  </figure>
                </div>

                <div class="isotope-item" data-type="nature">
                  <figure class="snip1321">
                    <img
                      src="assets/images/portfolio-05.jpg"
                      alt="sq-sample26"
                    />
                    <figcaption>
                      <a
                        href="assets/images/portfolio-05.jpg"
                        data-lightbox="image-1"
                        data-title="Caption"
                        ><i class="fa fa-search"></i
                      ></a>
                      <h4>Fifth Awesome</h4>
                      <span>Ut sollicitudin risus</span>
                    </figcaption>
                  </figure>
                </div>

                <div class="isotope-item" data-type="animals">
                  <figure class="snip1321">
                    <img
                      src="assets/images/portfolio-06.jpg"
                      alt="sq-sample26"
                    />
                    <figcaption>
                      <a
                        href="assets/images/portfolio-06.jpg"
                        data-lightbox="image-1"
                        data-title="Caption"
                        ><i class="fa fa-search"></i
                      ></a>
                      <h4>Awesome Sixth</h4>
                      <span>Donec eget massa ante</span>
                    </figcaption>
                  </figure>
                </div>
              </div>
            </div>
          </div> */ ?>
        </div>
      </section>

      <section class="section contact-me" data-section="section4">
        <div class="container">
          <div class="section-heading">
            <h2>Contact Me</h2>
            <div class="line-dec"></div>
            <span
              >You may contact me by filling this form.</span
            >
          </div>
          <div class="row">
            <div class="right-content">
              <div class="container">
                <form id="contact" action="contact.php" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <fieldset>
                        <input
                          name="name"
                          type="text"
                          class="form-control"
                          id="name"
                          placeholder="Your name..."
                          required=""
                        />
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <input
                          name="email"
                          type="text"
                          class="form-control"
                          id="email"
                          placeholder="Your email..."
                          required=""
                        />
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <input
                          name="subject"
                          type="text"
                          class="form-control"
                          id="subject"
                          placeholder="Subject..."
                          required=""
                        />
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <textarea
                          name="message"
                          rows="6"
                          class="form-control"
                          id="message"
                          placeholder="Your message..."
                          required=""
                        ></textarea>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <div class="h-captcha" data-sitekey="f08fe231-3382-4efb-a8b4-602ee753b362"></div>
                        <button type="submit" id="form-submit" class="button">
                          Send Message
                        </button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Scripts -->
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
      //according to loftblog tut
      $(".main-menu li:first").addClass("active");

      var showSection = function showSection(section, isAnimate) {
        var direction = section.replace(/#/, ""),
          reqSection = $(".section").filter(
            '[data-section="' + direction + '"]'
          ),
          reqSectionPos = reqSection.offset().top - 0;

        if (isAnimate) {
          $("body, html").animate(
            {
              scrollTop: reqSectionPos
            },
            800
          );
        } else {
          $("body, html").scrollTop(reqSectionPos);
        }
      };

      var checkSection = function checkSection() {
        $(".section").each(function() {
          var $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
          if (topEdge < wScroll && bottomEdge > wScroll) {
            var currentId = $this.data("section"),
              reqLink = $("a").filter("[href*=\\#" + currentId + "]");
            reqLink
              .closest("li")
              .addClass("active")
              .siblings()
              .removeClass("active");
          }
        });
      };

      $(".main-menu").on("click", "a", function(e) {
        e.preventDefault();
        showSection($(this).attr("href"), true);
      });

      $(window).scroll(function() {
        checkSection();
      });
    </script>
  </body>
</html>
