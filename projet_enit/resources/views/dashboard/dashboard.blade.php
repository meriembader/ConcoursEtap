<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ENIT</title>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('dashboard/css/all.min.css') }}" rel="stylesheet"
          type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class=""></i>
            </div>
            <div class="sidebar-brand-text mx-3">ENIT</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tableau de bord</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa fa-users"></i>
                <span>Candidatures</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                
                    <a class="collapse-item" href="{{url('/portal/candidatures/list')}}">Liste des Candidats</a>
                    <a class="collapse-item" href="">Candidats Acceptés </a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa fa-briefcase"></i>
                <span>Postes</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                   
                    <a class="collapse-item" href="">Ajouter les Postes</a>
                    <a class="collapse-item" href="">Listes des Postes</a>

                </div>
            </div>
        </li>
                <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsenotes"
               aria-expanded="true" aria-controls="collapsenotes">
                <i class="fas fa fa-briefcase"></i>
                <span>Notes</span>
            </a>
            <div id="collapsenotes" class="collapse" aria-labelledby="headingnotes"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                    <a class="collapse-item" href="">Ajouter les notes</a>

                </div>
            </div>
        </li>


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->

    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<!-- Bootstrap core JavaScript-->
<script src="{{ URL::asset('dashboard/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('dashboard/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL::asset('dashboard/js/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ URL::asset('dashboard/js/sb-admin-2.min.js')}}"></script>


</body>

</html>
