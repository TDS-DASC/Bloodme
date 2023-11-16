<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <!-- Meta y títulos -->
    <meta charset="utf-8" />
    <title>Login Perron Jorge Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        body {
            background-color: #eff6ff;
        }
    </style>

    <!-- Main HTML partial -->
    <link href="css/colores.css" rel="stylesheet" type="text/css" />
    
    <!-- Layout config Js -->
    <script src="resources/assets/js/layout.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS -->
    <link href="resources/assets/icons.csss" rel="stylesheet" type="text/css" />
    <!-- App CSS-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/images/logo.png">
</head>

<body>

    <div class="auth-page-wrapper pt-5">
        

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
               
                <!-- AQUI EMPIEZA EL CODIGO DEL LOGIN -->
                <div class="row justify-content-center">
                    <div class="col-md-4 me-5">
                        <img src="{{ asset('images/logo.png') }}" class="w-100" alt="No se pudo cargar el logo">     
                        <h1 class="text-center text-danger">BLOODME</h1>
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-5 mt-5">
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-danger">BIENVENIDO A BLOODME!</h5>
                                    <p class="text-muted">Iniciar sesión para continuar</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="index.html">

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Usuario</label>
                                            <input type="text" class="form-control" id="username" placeholder="Ingresar usuario">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Contraseña</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" placeholder="Ingresar contraseña" id="password-input">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Recordar cuenta</label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-danger w-100 boton-rojo" type="submit">INICIAR SESIÓN</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        <div class="mt-4 text-center">
                            <p class="mb-5">¿Quieres crear una cuenta? <a href="auth-signup-basic.html" class="fw-semibold text-danger text-decoration-underline"> Registrate aquí</a></p>
                        </div>

                        <!-- footer -->
                        <footer class="footer">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <p class="mb-0 text-muted">&copy;
                                                <script>document.write(new Date().getFullYear())</script> Proyecto Bloodme<i class="mdi mdi-heart text-danger"></i>    <!-- centrarlo debajo del login (ARREGLAR) -->
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
        <!-- end Footer -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- Vendor scripts HTML partial -->

    <!-- Bootstrap JS -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Simplebar JS -->
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <!-- Waves JS -->
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <!-- Feather Icons JS -->
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- Lord Icon JS -->
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <!-- Other custom scripts -->
    <script src="assets/js/plugins.js"></script>
    <!-- Particles JS -->
    <script src="assets/libs/particles.js/particles.js"></script>
    <!-- Particles App JS -->
    <script src="assets/js/pages/particles.app.js"></script>
</body>

</html>
