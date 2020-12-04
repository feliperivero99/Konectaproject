@include('Common.headeradmin')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        @include('Menus.menuadmin')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$name}} </span>
                                <img class="img-profile rounded-circle"
                                    src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Crear Usuarios </h1>

                    </div>


                </div>
                <!-- /.container-fluid -->

                <div class="container">

                    <!-- Outer Row -->
                    <div class="row justify-content-center">

                        <div class="col-xl-10 col-lg-12 col-md-9">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Crear Nuevo Usuario</h1>
                                                </div>
                                                <form id="userForm" class="user" method="post" action="">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="documento" name="documento"
                                                            placeholder="Ingrese el N° Documento..."
                                                            value="{{!empty($user)? !empty($user->documento)? $user->documento : '' : ''}}">
                                                        <h5 id="docucheck" style="color: red;">
                                                            **Por favor ingresa el N° documento
                                                        </h5>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="username" name="username"
                                                            placeholder="Ingrese el username..."
                                                            value="{{!empty($user)? !empty($user->username)? $user->username : '' : ''}}">
                                                        <h5 id="userncheck" style="color: red;">
                                                            **Por favor ingresa el username
                                                        </h5>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="Nombres" name="Nombres"
                                                            placeholder="Ingrese  Los nombres..."
                                                            value="{{!empty($user)? !empty($user->Nombres)? $user->Nombres : '' : ''}}">
                                                        <h5 id="namencheck" style="color: red;">
                                                            **Por favor ingresa los nombres del usuario
                                                        </h5>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="Apellidos" name="Apellidos"
                                                            placeholder="Ingrese  Los Apellidos..."
                                                            value="{{!empty($user)? !empty($user->Apellidos)? $user->Apellidos : '' : ''}}">
                                                        <h5 id="apecheck" style="color: red;">
                                                            **Por favor ingresa los apellidos del usuario
                                                        </h5>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-user"
                                                            id="email" name="email" aria-describedby="emailHelp"
                                                            placeholder="Ingrese el correo del usuario"
                                                            value="{{!empty($user)? !empty($user->email)? $user->email : '' : ''}}">
                                                        <h5 id="emailcheck" style="color: red;">
                                                            **Por favor ingresa el email del usuario
                                                        </h5>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-user"
                                                            id="password" name="password"
                                                            placeholder="Ingrese la contraseña del usuario">
                                                        <h5 id="passwordcheck" style="color: red;">
                                                            **Por favor ingresa la contraseña
                                                        </h5>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-user"
                                                            id="confirpassword"
                                                            placeholder="Ingrese la confirmación de la  contraseña">
                                                        <h5 id="confirpasswordcheck" style="color: red;">
                                                            **Por favor ingresa la confirmación de la contraseña
                                                        </h5>
                                                    </div>

                                                    <div class="form-group">

                                                        <select class="form-control" id="rol" name="rol">
                                                            <option value="0" selected>Seleccionar rol</option>
                                                            <option value="A" @if( empty($user)==false && $user->rol ==
                                                                "A") selected @endif >Administrador</option>
                                                            <option value="V" @if( empty($user)==false && $user->rol ==
                                                                "V") selected @endif>Vendedor</option>
                                                        </select>

                                                        <h5 id="rolwordcheck" style="color: red;">
                                                            **Por favor selecciona el rol del usuario
                                                        </h5>
                                                    </div>

                                                    <h5 id="confirequlcheck" style="color: red;">
                                                        **Las contraseñas no son iguales
                                                    </h5>

                                                    <h5 id="confirequlcheck2" style="color: red;">
                                                        **Si va a cambiar las contraseñas, ambos campos deben estar
                                                        llenos y la contraseñas coincidir
                                                    </h5>


                                                    <input type="submit" id="submitbtn" value="Guardar"
                                                        class="btn btn-primary btn-user btn-block">
                                                    <br />
                                                    <br />
                                                    <a class="btn btn-secondary btn-user btn-block"
                                                        href="{{route('usuarios')}}">
                                                        Cancelar
                                                    </a>

                                                    <input type="hidden" id="iduser" name="iduser"
                                                        value="{{!empty($user)? !empty($user->id)? $user->id : '' : ''}}">
                                                    <input type="hidden" id="token" name="token" value="3487">
                                                </form>
                                                <hr>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Desea salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Si desea cerrar sesión haga click en el boton salir del modal.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>


    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>




    {!! $js !!}

</body>

</html>