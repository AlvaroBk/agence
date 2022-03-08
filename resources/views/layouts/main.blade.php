<!DOCTYPE html>
<html lang="en">
    
    <head>
         <!-- Required meta tags -->
         <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dashboard</title>
        
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">

        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
        <link rel="stylesheet" href="{{ asset('css/tablestatus.css') }}">
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
        
    </head>
    <body id="body">
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex justify-content-center">
                    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
                        <a class="navbar-brand brand-logo" href="/dashboard"><img src="" alt="logo"/></a>
                        <a class="navbar-brand brand-logo-mini" href="/dashboard"><img src=""/></a>
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                            <span class="mdi mdi-sort-variant"></span>
                        </button>
                    </div>  
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    Agence
                    <ul class="navbar-nav navbar-nav-right">  
                        <li class="nav-item dropdown mr-4">
                            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-bell mx-0"></i>
                                <span class="count"></span>
                            </a>
                            <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                                <p class="mb-0 font-weight-normal float-left dropdown-header">Notificações</p>
                                <a class="dropdown-item">
                                    <div class="item-thumbnail">
                                        <div class="item-icon bg-success">
                                            <i class="mdi mdi-information mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="font-weight-normal">Erros da Aplicação</h6>
                                        <p class="font-weight-light small-text mb-0 text-muted">
                                            Just now
                                        </p>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="item-thumbnail">
                                        <div class="item-icon bg-info">
                                            <i class="mdi mdi-account-box mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h6 class="font-weight-normal">Registo de novos Usuários</h6>
                                        <p class="font-weight-light small-text mb-0 text-muted">
                                            2 days ago
                                        </p>
                                    </div>
                                </a>
                            </div> -->
                        </li>
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                <span class="nav-profile-name"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item">
                                    <i class="mdi mdi-settings text-primary"></i>
                                    Definições
                                </a>
                                <a class="dropdown-item" href="">
                                    <i class="mdi mdi-logout text-primary"></i>
                                    Logout
                                </a>
                            </div>
                            <!-- <div class="nav-item nav-profile dropdown"><a href=""><span class="nav-profile-name">PT/EN</span></a></div> -->
                            <div class="nav-item nav-profile dropdown"><a class="m-20" href="" style="color: <?php echo session('color')  ;?>; font-weight: bold;margin: 5px;"><span class="nav-profile-name" style="color: #E21E2A; font-weight: bold;margin: 5px;" >EN</span><img src="/images/flag_eng.png" alt="logo"/></a><p style="color: #E21E2A; font-weight: bold; font-size:20px;"  >|</p><a href="" style="color: #E21E2A; font-weight: bold;margin: 5px;"><span class="nav-profile-name" style="color: #E21E2A; font-weight: bold; margin: 5px;">PT</span><img src="/images/flag_por.png" alt="logo"/></a></div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                     data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
        <!-- partial -->
            <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">
                                <i class="mdi mdi-home menu-icon" style="color: #000000;"></i>
                                <span class="menu-title" style="color: #000000;">Painel de Controle</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- partial -->
                <div class="main-panel">
                    @yield('main')  

                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©️ BCX 2021</span>
                        </div>
                    </footer>
                <!-- partial -->
                </div>
            <!-- main-panel ends -->
            </div>
        <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
       
        
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="{{ asset('js/off-canvas.js') }}"></script>
        <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('js/template.js') }}"></script>
        <!-- Custom js for this page-->
    </body>
</html>