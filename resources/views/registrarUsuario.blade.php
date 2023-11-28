<!DOCTYPE html>

<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Registar Nuevo Usuario</title>

    
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
    
</head>

<body>

  
  <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  




  <script>
    function mostrarErrorLetras(id, mensaje) {
        var mensajeErrorLetras = document.getElementById(id);
        if (mensajeErrorLetras) {
            mensajeErrorLetras.textContent = mensaje;
        }
    }

    function validarSoloLetras(event, campoInput) {
        var charCode = event.which || event.keyCode;
        var mensajeErrorId = 'mensajeErrorLetras' + campoInput.id.charAt(4);
        if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode !== 32) {
            mostrarErrorLetras(mensajeErrorId, 'Solo se permiten letras (sin espacios, números o caracteres especiales).');
            return false;
        }
        mostrarErrorLetras(mensajeErrorId, '');
        return true;
    }

    function validarCurp() {
        var curpInput = document.getElementById('add-curp');
        var mensajeErrorCurp = document.getElementById('mensajeErrorCurp');
        var regexCurp = /^[A-Za-z0-9]+$/;

        if (curpInput.value.length !== 18 || !regexCurp.test(curpInput.value)) {
            mensajeErrorCurp.innerText = 'El CURP debe tener exactamente 18 caracteres y solo contener letras y números sin acentos.';
            curpInput.classList.add('is-invalid');
            return false;
        } else {
            mensajeErrorCurp.innerText = '';
            curpInput.classList.remove('is-invalid');
            return true;
        }
    }

    function validarCorreoElectronico() {
        var inputCorreo = document.getElementById('add-correoElectronico');
        var mensajeErrorCorreo = document.getElementById('mensajeErrorCorreo');
        var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!regexCorreo.test(inputCorreo.value)) {
            mensajeErrorCorreo.textContent = 'Por favor, ingresa un correo electrónico válido.';
            inputCorreo.classList.add('is-invalid');
            return false;
        } else {
            mensajeErrorCorreo.textContent = '';
            inputCorreo.classList.remove('is-invalid');
            return true;
        }
    }

    function validarContrasena() {
        var contrasenaInput = document.getElementById('add-contrasena');
        var mensajeErrorContrasena = document.getElementById('mensajeErrorContrasena');

        if (contrasenaInput.value.length < 6 || contrasenaInput.value.length > 15) {
            mensajeErrorContrasena.textContent = 'La contraseña debe tener entre 6 y 15 caracteres.';
            contrasenaInput.classList.add('is-invalid');
            return false;
        } else {
            mensajeErrorContrasena.textContent = '';
            contrasenaInput.classList.remove('is-invalid');
            return true;
        }
    }

    function validarFechaNacimiento() {
    
        var fechaInput = document.getElementById('html5-date-input');
        var mensajeErrorFecha = document.getElementById('mensajeErrorFecha');
        var fechaArray = fechaInput.value.split('-');
        if (fechaArray.length === 3 && fechaArray[0].length > 4) {
            fechaArray[0] = fechaArray[0].substring(0, 4);
            fechaInput.value = fechaArray.join('-');
        }

        var fechaSeleccionada = new Date(fechaInput.value);
        var fechaMinima = new Date('1900-01-01');
        var fechaMaxima = new Date('2023-12-31');

        if (fechaSeleccionada < fechaMinima || fechaSeleccionada > fechaMaxima) {
            mensajeErrorFecha.innerText = 'Por favor, ingresa una fecha entre 1900-01-01 y 2023-12-31.';
            fechaInput.classList.add('is-invalid');
            return false;
        } else {
            mensajeErrorFecha.innerText = '';
            fechaInput.classList.remove('is-invalid');
            return true;
        }
    }

    function verificarCampos() {
        var nombres = document.getElementById('add-Nombres').value;
        var apellidos = document.getElementById('add-Apellidos').value;
        var correoElectronico = document.getElementById('add-correoElectronico').value;
        var contrasena = document.getElementById('add-contrasena').value;
        var tipoSangre = document.getElementById('add-tipoSangre').value;
        var curp = document.getElementById('add-curp').value;
        var fechaNacimiento = document.getElementById('html5-date-input').value;
        var genero = document.getElementById('add-genero').value;
        var donador = document.getElementById('add-donador').value;

        // Validar todos los campos antes de enviar la solicitud a la API
        if (
            validarSoloLetras({ keyCode: 0 }, document.getElementById('add-Nombres')) &&
            validarSoloLetras({ keyCode: 0 }, document.getElementById('add-Apellidos')) &&
            validarCorreoElectronico() &&
            validarContrasena() &&
            validarCurp() &&
            validarFechaNacimiento()
        ) {
            var donadorValue = donador === 'Si' ? 1 : 0;

            var userData = {
                name: nombres,
                last_name: apellidos,
                email: correoElectronico,
                password: contrasena,
                blood_type: tipoSangre,
                curp: curp,
                birthdate: fechaNacimiento,
                gender: genero,
                donator: donadorValue
            };

            // Realizar la solicitud POST a la API
            fetch('http://127.0.0.1:8000/api/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(userData)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al agregar el usuario. Código de estado: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                // La respuesta exitosa del servidor
                console.log('Respuesta del servidor:', data);

                var offcanvasAddUser = new bootstrap.Offcanvas(document.getElementById('offcanvasAddUser'));
                offcanvasAddUser.hide();

                setTimeout(function () {
                    alert('Usuario creado exitosamente.');

                    // Restablecer valores de los campos a blanco
                    document.getElementById('add-Nombres').value = '';
                    document.getElementById('add-Apellidos').value = '';
                    document.getElementById('add-correoElectronico').value = '';
                    document.getElementById('add-contrasena').value = '';
                    document.getElementById('add-tipoSangre').value = '';
                    document.getElementById('add-curp').value = '';
                    document.getElementById('html5-date-input').value = '';
                    document.getElementById('add-genero').value = '';
                    document.getElementById('add-donador').value = '';

                }, 300);
            })
            .catch(error => {
                // Manejar errores en la solicitud
                console.error('Error en la solicitud:', error);
                alert('Error al agregar el usuario.');

                // Verificar si hay una respuesta del servidor
                if (error && error.response && error.response.text) {
                    // Intenta obtener más información sobre la respuesta
                    error.response.text().then(text => {
                        console.error('Contenido de la respuesta:', text);
                    });
                }
            });
        }
    }
</script>

  <!-- ------------------------------------------Content ------------------------------------------------------------>

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center mb-4 mt-2">
              <a href="index.html" class="app-brand-link gap-2 d-flex flex-column align-items-center">
                  <img src="../../images/logo.png" alt="Logo" class="mb-2" width="110" height="90">
                  <span class="app-brand-text demo text-danger fw-bold mb-2">BLOODME</span>
              </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-1 pt-2">Cada gota cuenta</h4>
          <p class="mb-4">Regístrate para donar y contribuir</p>

          <form id="formAuthentication" class="mb-3" action="index.html" method="POST">


          <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Usuario</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
      <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">


      <div class="mb-3">
    <label class="form-label" for="add-Nombres">Nombres</label>
    <input type="text" id="add-Nombres" class="form-control" placeholder="Escribir Nombres" aria-label="Nombre Completo" onkeypress="return validarSoloLetras(event, this)" />
    <div id="mensajeErrorLetrasNombres" style="color: red;"></div>
</div>

<div class="mb-3">
    <label class="form-label" for="add-Apellidos">Apellidos</label>
    <input type="text" id="add-Apellidos" class="form-control" placeholder="Escribir Apellidos" aria-label="Apellido Completo" onkeypress="return validarSoloLetras(event, this)" />
    <div id="mensajeErrorLetrasApellidos" style="color: red;"></div>
</div>

        <div class="mb-3">
          <label class="form-label" for="add-correoElectronico">Correo Electrónico</label>
          <input type="text" id="add-correoElectronico" class="form-control" placeholder="Escribir Correo Electrónico" aria-label="john.doe@example.com" onblur="validarCorreoElectronico()" />
          <div id="mensajeErrorCorreo" style="color: red;"></div>
      </div>

      <div class="mb-3">
      <label class="form-label" for="add-contrasena">Contraseña</label>
      <input type="text" id="add-contrasena" class="form-control" placeholder="Escribir Contraseña" aria-label="Contraseña" onblur="validarContrasena()" />
      <div id="mensajeErrorContrasena" style="color: red;"></div>
     </div>

        <div class="mb-3">
    <label class="form-label" for="add-fechaNacimiento">Fecha de Nacimiento</label>
    <div class="col-md-10">
        <input class="form-control" type="date" value="" id="html5-date-input" oninput="validarFechaNacimiento()" min='1900-01-01' max='2023-12-31' />
        <div id="mensajeErrorFecha" style="color: red;"></div>
    </div>
</div>

        <div class="mb-3">
          <label class="form-label" for="add-genero">Género</label>
          <select id="add-genero" class="form-select">
            <option selected disabled value="">Opciones...</option>
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
          </select>
        </div>

        
          <div class="mb-3">
              <label class="form-label" for="add-curp">CURP</label>
              <input type="text" id="add-curp" class="form-control" placeholder="Escribir CURP" aria-label="CURP" onblur="validarCurp()"/>
              <div id="mensajeErrorCurp" style="color: red;"></div>              
          </div>


        <div class="mb-3">
          <label class="form-label" for="add-tipoSangre">Tipo de Sangre</label>
          <select id="add-tipoSangre" class="form-select">
            <option selected disabled value="">Opciones...</option>
            <option value="A+">A+</option>
            <option value="O+">O+</option>
            <option value="B+">B+</option>
            <option value="AB+">AB+</option>
            <option value="A-">A-</option>
            <option value="O-">O-</option>
            <option value="B-">B-</option>
            <option value="AB-">AB-</option>
          </select>
        </div>

        <div class="mb-3">
                <label class="form-label" for="add-donador">Donador</label>
                <select id="add-donador" class="form-select">
                    <option selected disabled value="">Opciones...</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>

           
            <div class="mb-3">
            <button class="btn btn-danger d-grid w-100 custom-button" onclick="verificarCampos(event)">REGISTRARSE</button>

            </div>


          </form>

          <p class="text-center">
            <span>Ya tienes una cuenta?</span>
            <a href="{{route('loginHome')}}">
              <span>Inicia sesión en su lugar</span>
            </a>
          </p>

          
        </div>
      </div>
      <!-- Register Card -->
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
  
</body>

</html>

<!-- beautify ignore:end -->

