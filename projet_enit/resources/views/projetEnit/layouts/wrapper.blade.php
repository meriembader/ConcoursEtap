<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
           href="{{route ('candidatures.list')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class=""></i>
            </div>
            <div class="sidebar-brand-text mx-3">
                Espace Administrateur
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="#">
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
                    <!-- <h6 class="collapse-header">Custom Components:</h6> -->

                    <a class="collapse-item" href="{{route('candidatures.list')}}">Liste des Candidats</a>
                    <a class="collapse-item" href="{{route('accepted.candidate')}}">Candidats retenus </a>
                    <a class="collapse-item" href="{{route('improper.candidate')}}">Candidats Non conforme</a>
                    <a class="collapse-item" href="{{route('get.last.selection')}}">Sélection finale </a>
                    {{-- <a class="collapse-item" href="{{route('accepted.conforme.candidate')}}">Deuxième Sélection </a>
                     <a class="collapse-item" href="{{route('accepted.final.candidate')}}">Troisième Sélection </a>--}}
                    <a class="collapse-item" href="{{route('rejetected.List')}}">Candidats Non retenus</a>


                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoc"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa fa-users"></i>
                <span>Historiques</span>
            </a>
            <div id="collapseTwoc" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!-- <h6 class="collapse-header">Custom Components:</h6> -->

                    <a class="collapse-item" href="{{route('historique.candidature')}}">Historique  Candidats</a>
                    <a class="collapse-item" href="{{route('get.password.history')}}">Historique  mots de passe</a>

                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">

            <a class="nav-link collapsed showModal" href="#" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fas fa fa-calendar"></i>
                <span>Fixer la date de Clôture</span>
            </a>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Ajouter la date de clôture du
                                Concours</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form name="my-form" action="{{route ('handleAdddate')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label style="color :black" class="col-md-4 col-form-label text-md-right"><b>Date
                                            de Clôture des candidatures</b> </label>
                                    <div class="col-md">
                                        <input type="date" class="form-control date_cloture" name="date_cloture"
                                               required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style="color :black" class="col-md-4 col-form-label text-md-right"><b>Date du résultat provisoire </b> </label>
                                    <div class="col-md">
                                        <input type="date" class="form-control date_cloture_2" name="date_cloture_2"
                                               required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label style="color :black" class="col-md-4 col-form-label text-md-right"><b>Date
                                            final pour publier les résultats</b> </label>
                                    <div class="col-md">
                                        <input type="date" class="form-control date_cloture_3" name="date_cloture_2"
                                               required="">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary save_dates">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#contact"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa fa-phone"></i>
                <span>Contact</span>
            </a>
            <div id="contact" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="{{route('getCantactList')}}">Listes des Contacts</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('showEmailMessage')}}">
                <i class="fas fa-envelope fa-fw"></i>
                <span>Messages</span>
            </a>
        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{route('logout')}}">
                <i class="fas fa-sign-out-alt"></i>
                <span>Se Déconnecter</span>
            </a>
        </li>



    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->

    <!-- End of Content Wrapper -->

    <!-- End of Page Wrapper -->
