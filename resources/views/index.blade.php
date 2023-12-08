<!DOCTYPE html>

<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login BLOODME</title>

    
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://1.envato.market/vuexy_admin">
    
    
    <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5J3LMKC');</script>
    <!-- End Google Tag Manager -->
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../images/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css"/>
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" /> 
    <!-- Vendor -->
<link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/umd/styles/index.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css">

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
</head>

<body>

  
  <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  


  <script>
  $(document).ready(function () {
    $("#formAuthentication").submit(function (event) {
      // Evitar que el formulario se envíe normalmente
      event.preventDefault();

      // Obtener los valores de correo y contraseña
      var email = $("#email").val();
      var password = $("#password").val();

      // Hacer la solicitud a la API
      $.ajax({
        type: "POST",
        url: "https://bloodprueba.up.railway.app/api/users/",
        data: {
          email: email,
          password: password
        },
        success: function (response) {
          // Verificar la respuesta de la API
          if (response.success) {
            // Las credenciales son válidas, puedes redirigir al usuario o realizar otras acciones
            alert("Inicio de sesión exitoso");
          } else {
            // Las credenciales no son válidas, muestra un mensaje de alerta
            alert("Correo o contraseña incorrectos");
          }
        },
        error: function () {
          // Ocurrió un error al realizar la solicitud
          alert("Error al conectar con la API");
        }
      });
    });
  });
</script>


  <!-- Content -->

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Login -->
      <div class="card">
        <div class="card-body">
         <!-- Logo -->
          <div class="app-brand justify-content-center mb-4 mt-2">
              <a class="app-brand-link gap-2 d-flex flex-column align-items-center">
                  <img src="../../images/logo.png" alt="Logo" class="mb-2" width="110" height="90">
                  <span class="app-brand-text demo text-danger fw-bold mb-2">BLOODME</span>
              </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1 pt-2">Bienvenido!</h4>
          <p class="mb-4">Ingresa tus datos para continuar</p>
          <p style="display: none" id="dateIncorrect">Datos incorrectos</p>

          <form id="uniqueFormAuthentication" class="mb-3" action="https://bloodprueba.up.railway.app/api/login" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Correo Electronico</label>
              <input type="text" class="form-control" id="email" name="email-username" placeholder="Escribir correo electronico" autofocus>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Contraseña</label>
                
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer" id="eye"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
            
            <div class="mb-3">
              <button class="btn btn-danger  d-grid w-100" type="submit">INGRESAR</button>
            </div>
          </form>

          <p class="text-center">
            <span>¿No tienes una cuenta?</span>
            <a href="{{route('registrarRutas')}}">
              <span>Click aquí</span>
            </a>
          </p>

          
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

<!-- / Content -->

 

  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  
  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../assets/vendor/libs/popper/popper.js"></script>
  <script src="../../assets/vendor/js/bootstrap.js"></script>
  <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
  <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
  <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
  <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
   <script src="../../assets/vendor/js/menu.js"></script>
  
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../../assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
<script src="../../assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
<script src="../../assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>

  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>
  

  <!-- Page JS -->
  <script src="../../assets/js/pages-auth.js"></script>

  <script>
    $(document).ready(function () {
  $("#uniqueFormAuthentication").submit(function (event) {
    event.preventDefault();

    var email = $("#email").val();
    var password = $("#password").val();

    $.ajax({
      type: "POST",
      url: "https://bloodprueba.up.railway.app/api/login",
      data: {
        email: email,
        password: password
      },
      success: function (response) {

        // Verifica si la propiedad 'user' existe en la respuesta
        if (response.user) {
          window.location.href = '/admin';
        } else {
          document.getElementById('email').style.outline = '1px solid #f93a57';
          document.getElementById('password').style.outline = '1px solid #f93a57';
          document.getElementById('eye').style.border = '1px solid #f93a57';
          $(".form-label").addClass("error-label");
          document.getElementById('dateIncorrect').style.display = 'block';
        }
      },
      error: function () {
        alert("Error al conectar con la API");
      }
    });
  });
});

  </script>
  
  <style>
      .error-label{
        color: #f93a57;
      }

      #dateIncorrect{
        color: #f93a57
      }
  </style>
</body>

</html>

<!-- beautify ignore:end -->

