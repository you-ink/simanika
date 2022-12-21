
    
        
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <span class="copyright ml-auto my-auto mr-2">Copyright &copy; 2022
              <a  href="<?php echo base_url('home/') ?>" rel="nofollow">Simanika</a>
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
      'plugin/fancy-file-uploader/jquery.ui.widget.js',
      'plugin/fancy-file-uploader/jquery.fileupload.js',
      'plugin/fancy-file-uploader/jquery.iframe-transport.js',
      'plugin/fancy-file-uploader/jquery.fancy-fileupload.js',
      'js/main.js',
    ]); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>

    <script>
      function get_api_url() {
          return "<?php echo base_url('api/') ?>";
      }
      function get_api_login_value() {
          return "<?php echo get_uid() ?>";
      }
    </script>

    <?php 

        if (isset($script) && is_file($script)) {
            include($script);
        }

    ?>

    <script>
      // Change Datatable Button
      function change_datatable_button() {
        $('.dt-button').removeClass("dt-button");
      }
      $(document).ready(function() {
        change_datatable_button();
      })


      // Function For Upload File
      function upload(name, maxFiles = 1) {
        $(`#${name}`).FancyFileUpload({
          params : {
            action : 'fileuploader'
          },
          edit: false,
          maxfilesize : 10000000,
          added: function (e, data) {
            if (data.ff_info.errors.length > 0) {
              Swal.fire(
                  'Gagal Ditambahkan!',
                  'Error: '+data.ff_info.errors,
                  'error'
                )
                $(this).remove()
                delete data.ff_info
                return;
            }

            if ($(`.upload--${name}`).find('.ff_fileupload_queued').length > maxFiles) {
              Swal.fire(
                  'Gagal Ditambahkan!',
                  `Maksimal upload hanya ${maxFiles} file`,
                  'error'
                )
              $(this).remove()
              delete data.ff_info
              return;
            }

            $(`.upload--${name}`).find('.btn--upload-file').removeClass('d-none');
            $(`.upload--${name}`).find('.ff_fileupload_remove_file').attr('data-doc', name);

            // Get Base64 of File & Set Session To Save The Data
            getBase64(data.files[0], name)

            $(this).find('.ff_fileupload_start_upload').remove()
          }
        });
      }
      
      $(document).on('click', '.ff_fileupload_remove_file', function(e) {
        let doc = $(this).attr('data-doc')
        if ($(`.upload--${doc}`).find('.ff_fileupload_queued').length < 1) {
          $(`.upload--${doc}`).find('.btn--upload-file').addClass('d-none');
        }
      });

      $(document).on('click', '.btn-logout', function(e) {
        Swal.fire({
          title: 'Logout?',
          text: `Anda ingin melakukan logout!`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, logout!'
        }).then((result) => {
          if (result.isConfirmed) {
            
            cookie.remove('uid')
            cookie.remove('sesid')
            window.location.href = "<?php echo base_url() ?>"

          }
        })
      });      
    </script>

  </body>
</html>