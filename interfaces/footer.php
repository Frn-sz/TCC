</body>
<footer class="page-footer">

</footer>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script src="../OwlCarousel/dist/owl.carousel.js"></script>
<script>
  $(document).ready(function() {
    $('select').formSelect();
  });
  $(document).ready(function() {
    $('.sidenav').sidenav();
  });
  $(document).ready(function() {
    $('.materialboxed').materialbox();
  });
</script>
<script>
  var clicked = 0;

  $(".toggle-password").click(function(e) {
    e.preventDefault();

    $(this).toggleClass("toggle-password");
    if (clicked == 0) {
      $(this).html('<span class="material-icons">visibility_off</span >');
      clicked = 1;
    } else {
      $(this).html('<span class="material-icons">visibility</span >');
      clicked = 0;
    }

    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
</script>


<script>
  $(document).ready(function() {
    $('.modal').modal();
  });
</script>
<script>
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 10) {
      $(".transparent").addClass("menu");
    } else {
      $(".transparent").removeClass("menu");
    }
  });
</script>
<script type="text/javascript">
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    items: 1,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsiveClass: true,
    autoWidth: true,
    loop: true,
    autoHeight: true,
    autoHeightClass: 'owl-height'

  });
</script>

</html>