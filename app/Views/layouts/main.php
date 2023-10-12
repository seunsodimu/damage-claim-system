<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Damage Claim System<?= (!empty($title)) ? " | ".$title :"" ?> </title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?= base_url('assets') ?>/images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="<?= base_url('assets') ?>/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="<?= base_url('assets') ?>/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="<?= base_url('assets') ?>/css/responsive.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
      <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
   </head>
   <body>
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="index.html">
               <div class="iq-light-logo">
                  
               </div>
               <div class="iq-dark-logo">
                  
               </div>
               <span>Damage Claim System</span>
               </a>
               <div class="iq-menu-bt-sidebar">
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                        <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <!-- <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Dashboard</span></li> -->
                     <li>
                        <a href="<?= base_url('dashboard') ?>" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard </span></a>
                     </li>
                     <li>
                        <a href="<?= base_url('claims') ?>" class="iq-waves-effect"><i class="ri-article-line"></i><span>Claims </span></a>
                     </li>
                     <li>
                        <a href="<?= base_url('admin/users') ?>" class="iq-waves-effect"><i class="ri-user-star-line"></i><span>Users </span></a>
                     </li>
                     <li>
                        <a href="<?= base_url('logout') ?>" class="iq-waves-effect"><i class="ri-logout-box-fill"></i><span>Logout </span></a>
                     </li>
                     
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="navbar-left">
                     <div class="iq-search-bar d-none d-md-block">
                        <form action="#" class="searchbox">
                           <!-- <input type="text" class="text search-input" placeholder="Type here to search..."> 
                           <a class="search-link" href="#"><i class="ri-search-line"></i></a>-->
                           
                        </form>
                     </div>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                        <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                     </div>
                  </div>
                  
                  <ul class="navbar-list">
                     <li>
                        <a href="#" class="d-flex align-items-center">
                       
                        </a>
                        
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         <?= $this->renderSection("body") ?>
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
      <footer class="iq-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <ul class="list-inline mb-0">
                     
                  </ul>
               </div>
               <div class="col-lg-6 text-right">
                  Developed and managed by <a href="https://www.manzant.com">Manzant Systems</a> for <a href="https://www.dawsonlogistics.com">Dawson Logistics</a> 2023.
               </div>
            </div>
         </div>
      </footer>

<!-- jQuery library -->

      <!-- Footer END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <!-- <script src="<?= base_url('assets') ?>/js/jquery.min.js"></script> -->
<!-- jQuery library -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       <!-- Rtl and Darkmode -->
       <script src="<?= base_url('assets') ?>/js/rtl.js"></script>
       <script src="<?= base_url('assets') ?>/js/customizer.js"></script>
      <script src="<?= base_url('assets') ?>/js/popper.min.js"></script>
      <script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="<?= base_url('assets') ?>/js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="<?= base_url('assets') ?>/js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="<?= base_url('assets') ?>/js/waypoints.min.js"></script>
      <script src="<?= base_url('assets') ?>/js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="<?= base_url('assets') ?>/js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="<?= base_url('assets') ?>/js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="<?= base_url('assets') ?>/js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="<?= base_url('assets') ?>/js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="<?= base_url('assets') ?>/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="<?= base_url('assets') ?>/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="<?= base_url('assets') ?>/js/smooth-scrollbar.js"></script>
      <!-- lottie JavaScript -->
      <script src="<?= base_url('assets') ?>/js/lottie.js"></script>
      <!-- am core JavaScript -->
      <script src="<?= base_url('assets') ?>/js/core.js"></script>
      <!-- am charts JavaScript -->
      <script src="<?= base_url('assets') ?>/js/charts.js"></script>
      <!-- am animated JavaScript -->
      <script src="<?= base_url('assets') ?>/js/animated.js"></script>
      <!-- am kelly JavaScript -->
      <script src="<?= base_url('assets') ?>/js/kelly.js"></script>
      <!-- Flatpicker Js -->
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
      <!-- Chart Custom JavaScript -->
      <script src="<?= base_url('assets') ?>/js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="<?= base_url('assets') ?>/js/custom.js"></script>

      <script>
$(document).ready(function(){
   //initialize claimTable datatable with search and pagination and sorting
   $('#claimsTable').DataTable({
      "paging": true,
      "ordering": true,
      "info": true,
      "searching": true,
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      "iDisplayLength": 100
   }); 
            var password=document.getElementById("password");

function genPassword() {
   var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   var passwordLength = 12;
   var password = "";
for (var i = 0; i <= passwordLength; i++) {
  var randomNumber = Math.floor(Math.random() * chars.length);
  password += chars.substring(randomNumber, randomNumber +1);
 }
      document.getElementById("pass").type = "text";
       document.getElementById("rpass").type = "text";
       document.getElementById("pass").value = password;
       document.getElementById("rpass").value = password;
}

function copyPassword() {
 var copyText = document.getElementById("pass");
 copyText.select();
 document.execCommand("copy");  
}
   $(".rmv-user").click(function(){
      var user_id = $(this).attr('data-usid');console.log(user_id);
      //confirm if user wants to delete
      var confirmDelete = confirm("Are you sure you want to delete this user?");
      if (confirmDelete) {
         $.ajax({
            url: "<?= base_url('admin/users/delete') ?>",
            type: "POST",
            data: {user_id: user_id},
            success: function(data){
               alert("User deleted successfully");
                  window.location.href = "<?= base_url('admin/users') ?>";
            }
         });
      }
   });
});
      </script>
     
   </body>
</html>