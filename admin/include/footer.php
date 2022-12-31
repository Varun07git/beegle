 <!-- jQuery CDN - Slim version (=without AJAX) -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <!-- Bootstrap js -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 <!-- SIDE BAR js starts-->
 <script type="text/javascript">
     let arrow = document.querySelectorAll(".arrow");
     for (var i = 0; i < arrow.length; i++) {
         arrow[i].addEventListener("click", (e) => {
             let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
             arrowParent.classList.toggle("showMenu");
         });
     }

     let sidebar = document.querySelector(".sidebar");
     let sidebarBtn = document.querySelector(".bx-menu");
     console.log(sidebarBtn);
     sidebarBtn.addEventListener("click", () => {
         sidebar.classList.toggle("close");
     });
 </script>
 <!-- SIDE Bar js ends -->
 <!-- table -->
 <script src='//code.jquery.com/jquery-1.12.3.js'></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
 <script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
 <script src='//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js'></script>
 <script src='//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
 <script src='//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
 <script src='//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.js"></script> -->
 <script type="text/javascript">
     $(document).ready(function() {
         $("#mytable").DataTable(
            {
             dom: 'Bfrtip',
             buttons: [
                  'excel', 'pdf', 'print'
             ]
         }
         );
     });
    //  setting sidebar js 
    
 </script>

 </body>

 </html>