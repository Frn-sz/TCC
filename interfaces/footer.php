
</body>
<footer class="page-footer grey darken-2">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Footer Content</h5>
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
      © 2014 Copyright Text
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
    </div>
  </div>
</footer>


<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script>
   $(document).ready(function(){
    $('select').formSelect();
  });
 $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
        
  </script>
  <script>
  var clicked = 0;

$(".toggle-password").click(function (e) {
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

let senha = document.getElementById('senha');
let senhaC = document.getElementById('repetirsenha');

function validarSenha() {
  if (senha.value != senhaC.value) {
    senhaC.setCustomValidity(" ");
    senhaC.reportValidity();
    return false;
    senhaC.addEventListener('input', validarSenha);
senha.addEventListener('blur', validarSenha);
  } else {
    senhaC.setCustomValidity("");
    return true;

  }

}

// verificar também quando o campo for modificado, para que a mensagem suma quando as senhas forem iguais
senhaC.addEventListener('input', validarSenha);
senha.addEventListener('blur', validarSenha);
  
</script>




<script>
 $(document).ready(function(){
    $('.modal').modal();
  });
</script>


</html>