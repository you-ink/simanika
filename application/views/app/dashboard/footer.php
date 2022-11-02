
    
        
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
              <a href="#" rel="nofollow">Simanika</a>
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
      'template/shards-dashboard/scripts/extras.1.1.0.min.js',
      'template/shards-dashboard/scripts/shards-dashboards.1.1.0.min.js',
      'template/shards-dashboard/scripts/app/app-blog-overview.1.1.0.js',
    ]); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>

    <?php 

        if (isset($script) && is_file($script)) {
            include($script);
        }

    ?>

  </body>
</html>