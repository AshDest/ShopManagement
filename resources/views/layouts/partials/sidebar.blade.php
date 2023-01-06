 <div class="leftside-menu">

     <!-- LOGO -->
     <a href="index.html" class="logo text-center logo-light">
         <span class="logo-lg">
             <img src="assets/images/logo.png" alt="" height="16">
         </span>
         <span class="logo-sm">
             <img src="assets/images/logo_sm.png" alt="" height="16">
         </span>
     </a>

     <!-- LOGO -->
     <a href="index.html" class="logo text-center logo-dark">
         <span class="logo-lg">
             <img src="assets/images/logo-dark.png" alt="" height="16">
         </span>
         <span class="logo-sm">
             <img src="assets/images/logo_sm_dark.png" alt="" height="16">
         </span>
     </a>

     <div class="h-100" id="leftside-menu-container" data-simplebar>

         <!--- Sidemenu -->
         <ul class="side-nav">

             <li class="side-nav-title side-nav-item">Navigation</li>

             <li class="side-nav-item">
                 <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                     aria-controls="sidebarDashboards" class="side-nav-link">
                     <i class="uil-home-alt"></i>
                     {{-- <span class="badge bg-success float-end">4</span> --}}
                     <span> Dashboards </span>
                 </a>
             </li>


             <li class="side-nav-item">
                 <a data-bs-toggle="collapse" href="#sidebarProduits" aria-expanded="false"
                     aria-controls="sidebarProduits" class="side-nav-link">
                     <i class="uil-chart"></i>
                     <span> Produits </span>
                     <span class="menu-arrow"></span>
                 </a>
                 <div class="collapse" id="sidebarProduits">
                     <ul class="side-nav-second-level">

                         <li>
                             <a href="/categorie">Categorie Produit</a>
                         </li>
                         <li>
                             <a href="/produit">Ajouter Produits</a>
                         </li>
                         <li>
                             <a href="/">Liste Produits</a>
                         </li>
                     </ul>
                 </div>
             </li>
             <li class="side-nav-item">
                 <a data-bs-toggle="collapse" href="#sidebaraprov" aria-expanded="false" aria-controls="sidebaraprov"
                     class="side-nav-link">
                     <i class="uil-chart"></i>
                     <span> Aprovisionnement </span>
                     <span class="menu-arrow"></span>
                 </a>
                 <div class="collapse" id="sidebaraprov">
                     <ul class="side-nav-second-level">
                         <li>
                             <a href="{{ route('addapprovisionnement') }}">Ajouter</a>
                         </li>
                         <li>
                             <a href="{{ route('listapprovisionnement') }}">Approvisionnements</a>
                         </li>
                     </ul>
                 </div>
             </li>
             <li class="side-nav-item">
                 <a data-bs-toggle="collapse" href="#sidebarParametre" aria-expanded="false"
                     aria-controls="sidebarParametre" class="side-nav-link">
                     <i class="uil-chart"></i>
                     <span> Parametre </span>
                     <span class="menu-arrow"></span>
                 </a>
                 <div class="collapse" id="sidebarParametre">
                     <ul class="side-nav-second-level">

                         <li>
                             <a href="{{ route('shopinformations') }}">Parametre entreprise</a>
                         </li>
                         <li>
                             <a href="/">Compte utilisateur</a>
                         </li>
                     </ul>
                 </div>
             </li>
             <li class="side-nav-item">
                 <a data-bs-toggle="collapse" href="#sidebarRapport" aria-expanded="false"
                     aria-controls="sidebarRapport" class="side-nav-link">
                     <i class="uil-chart"></i>
                     <span> Rapport </span>
                     <span class="menu-arrow"></span>
                 </a>
                 <div class="collapse" id="sidebarRapport">
                     <ul class="side-nav-second-level">

                         <li>
                             <a href="/">Les rapport</a>
                         </li>
                     </ul>
                 </div>
             </li>

         </ul>

         <!-- Help Box -->

         <!-- end Help Box -->
         <!-- End Sidebar -->

         <div class="clearfix"></div>

     </div>
     <!-- Sidebar -left -->

 </div>
