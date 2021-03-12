// Smooth Scroll
//- ----------------------------------------------

// Select all links with hashes
$('a[href*="#"]')
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function (event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate(
          {
            scrollTop: target.offset().top
          },
          1000
        );
      }
    }
  });

//  Form validation
// disables form submissions if there are invalid fields
(function () {
  'use strict';
  window.addEventListener(
    'load',
    function () {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener(
          'submit',
          function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          },
          false
        );
      });
    },
    false
  );
})();

$('.toggle-password').click(function () {
  $(this).toggleClass('bx bs-hide');
  var input = $($(this).attr('toggle'));
  if (input.attr('type') == 'password') {
    input.attr('type', 'text');
    $(this).removeClass('bx bs-hide');
    $(this).addClass('bx bxs-hide');
  } else {
    input.attr('type', 'password');
    $(this).removeClass('bx bxs-hide');
    $(this).addClass('bx bx-hide');
  }
});

// Create GSAP Instance
//- ----------------------------------------------
var tl = gsap.timeline({ defaults: { duration: 1 } });

tl.from('nav', { y: -50, opacity: 0 }, '-=.1') // Fade Down
  .from('.stagger-brand', { y: 50, opacity: 0, stagger: 0.7 }, '-=.3') // Fade Up
  .from('.stagger-sub', { y: 50, opacity: 0, stagger: 0.7 }, '-=.3') // Fade Up
  .from('.stagger-cta', { y: 50, opacity: 0, stagger: 0.7 }, '-=.3') // Fade Up
  .from('.stagger-image', { scaleX: 0.8, scaleY: 0.8, opacity: 0 }, '-=1'); // Zoom In with Delay
