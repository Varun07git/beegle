</div>
 <!-- jQuery CDN - Slim version (=without AJAX) -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <!-- Bootstrap js -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

 <script type="text/javascript">
     $(document).ready(function() {
         $('#sidebarCollapse').on('click', function() {
             $('#sidebar').toggleClass('active');
         });
     });
     // Request Demo Form Modal 
     function showModal() {
         document.querySelector('.overlay').classList.add('showoverlay');
         document.querySelector('.requestDemoForm').classList.add('showrequestDemoForm');
     }

     function closeModal() {
         document.querySelector('.overlay').classList.remove('showoverlay');
         document.querySelector('.requestDemoForm').classList.remove('showrequestDemoForm');
     }
     //  schedule project form modal
     function showModal2() {
         document.querySelector('.overlay').classList.add('showoverlay');
         document.querySelector('.scheduleProjectForm').classList.add('showscheduleProjectForm');
     }

     function closeModal2() {
         document.querySelector('.overlay').classList.remove('showoverlay');
         document.querySelector('.scheduleProjectForm').classList.remove('showscheduleProjectForm');
     }
     //  Request Quote Form modal
     function showModal3() {
         document.querySelector('.overlay').classList.add('showoverlay');
         document.querySelector('.requestQuoteForm').classList.add('showrequestQuoteForm');
     }

     function closeModal3() {
         document.querySelector('.overlay').classList.remove('showoverlay');
         document.querySelector('.requestQuoteForm').classList.remove('showrequestQuoteForm');
     }
 </script>
 <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function() {
         $("#mytable").DataTable();
     });
 </script>
 <script>
     function print_() {
         window.print();
     }
 </script>

</body>

 </html>