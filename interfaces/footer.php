</body>
<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">LUNA</h5>
        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Links</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © 2022
      <a class="white-text text-lighten-4 right" href="../Inicio/dúvidas.php">Dúvidas</a>
    </div>
  </div>
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