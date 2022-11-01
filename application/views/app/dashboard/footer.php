
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