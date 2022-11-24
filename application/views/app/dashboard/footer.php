
    
        
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
            </ul>
            <span class="copyright ml-auto my-auto mr-2">Copyright &copy; 2022
              <a href="javascript:void(0)" rel="nofollow">Simanika</a>
            </span>
          </footer>
        </main>
      </div>
    </div>

    <?= script([
      'js/jquery-3.6.1.min.js',
      'plugin/bootstrap/js/bootstrap.bundle.min.js',
      'plugin/chartjs/Chart.min.js',
      'plugin/shards-ui/js/shards.min.js',
      'template/shards-dashboard/scripts/shards-dashboards.1.1.0.min.js',
      'plugin/DataTables/datatables.min.js',
      'plugin/sweetalert2/sweetalert2.all.min.js',
      'plugin/select2/js/select2.min.js',
      'js/main.js',
    ]); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>

    <script>
      function get_api_url() {
          return "<?php echo base_url('api/') ?>";
      }
    </script>

    <?php 

        if (isset($script) && is_file($script)) {
            include($script);
        }

    ?>

    <script>
      function change_datatable_button() {
        $('.dt-button').removeClass("dt-button");
      }
      $(document).ready(function() {
        change_datatable_button();
      })
    </script>

  </body>
</html>