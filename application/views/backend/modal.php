<script type="text/javascript">
function showAjaxModal(url)
{
// SHOWING AJAX PRELOADER IMAGE
jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px; "><img src="assets/images/preloader.gif" /></div>');

// LOADING THE AJAX MODAL
jQuery('#modal_ajax').modal('show', {backdrop: 'true'});

// SHOW AJAX RESPONSE ON REQUEST SUCCESS
$.ajax({
  url: url,
  success: function(response)
  {
    jQuery('#modal_ajax .modal-body').html(response);
  }
});
}
</script>

<!-- (Ajax Modal)-->
<div class="modal fade" id="modal_ajax">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo $system_name;?></h4>
            </div>

            <div class="modal-body" style="height:500px; overflow:auto;">



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




    <script type="text/javascript">
	function confirm_modal(delete_url)
	{

    document.getElementById('delete_link').setAttribute('href' , delete_url);

    var url = delete_url;
    swal.fire({
      title: 'Quieres eliminar el registro de:'+nombre+'?',
      text: "El registro será eliminado permanentemete",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si',
      cancelButtonText: 'No',
      },
      function(isConfirm) {
        if (isConfirm) {
          swal.fire("Eliminado!", "Su cliente ha sido eliminado!", "success");
          window.location.replace(delete_url);
        } else {
          swal.fire("Cancelado", "Su cliente está a salvo! :)", "error");
        }
      })
  }




  $(function() {
      function reposition() {
          var modal = $(this),
              dialog = modal.find('.modal-dialog');
          modal.css('display', 'block');

          // Dividing by two centers the modal exactly, but dividing by three
          // or four works better for larger screens.
          dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2.5));
      }
      // Reposition when a modal is shown
      $('.modal').on('show.bs.modal', reposition);
      // Reposition when the window is resized
      $(window).on('resize', function() {
          $('.modal:visible').each(reposition);
      });
  });

	</script>

    <!-- (Normal Modal)-->
    <div class="modal" id="modal-4">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link"><?php echo get_phrase('delete');?></a>
                    <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo get_phrase('cancel');?></button>
                </div>
            </div>
        </div>
    </div>



  <?php //sdjnsjdn jsdn snd sdn  ?>




      <script type="text/javascript">
  	function confirm_enviar(delete_url)
  	{
  		jQuery('#modal-5').modal('show', {backdrop: 'static'});
  		document.getElementById('delete_links').setAttribute('href' , delete_url);


  	}




    $(function() {
        function reposition() {
            var modal = $(this),
                dialog = modal.find('.modal-dialog');
            modal.css('display', 'block');

            // Dividing by two centers the modal exactly, but dividing by three
            // or four works better for larger screens.
            dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2.5));
        }
        // Reposition when a modal is shown
        $('.modal').on('show.bs.modal', reposition);
        // Reposition when the window is resized
        $(window).on('resize', function() {
            $('.modal:visible').each(reposition);
        });
    });

  	</script>

      <!-- (Normal Modal)-->
      <div class="modal" id="modal-5">
          <div class="modal-dialog">
              <div class="modal-content">

                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" style="text-align:center;">Estas seguro de mover el cliente al modulo pendiente de documentos ?</h4>
                  </div>


                  <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                      <a href="#" class="btn btn-danger" id="delete_links"><?php echo 'Mover'?></a>
                      <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'Cancelar'?></button>
                  </div>
              </div>
          </div>
      </div>


      <?php //enviar ENVIARNOCONTESTOLLAMADAS  ?>




          <script type="text/javascript">
        function confirm_enviar1(delete_url)
        {
          jQuery('#modal-6').modal('show', {backdrop: 'static'});
          document.getElementById('delete_links1').setAttribute('href' , delete_url);


        }




        $(function() {
            function reposition() {
                var modal = $(this),
                    dialog = modal.find('.modal-dialog');
                modal.css('display', 'block');

                // Dividing by two centers the modal exactly, but dividing by three
                // or four works better for larger screens.
                dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2.5));
            }
            // Reposition when a modal is shown
            $('.modal').on('show.bs.modal', reposition);
            // Reposition when the window is resized
            $(window).on('resize', function() {
                $('.modal:visible').each(reposition);
            });
        });

        </script>

          <!-- (Normal Modal)-->
          <div class="modal" id="modal-6">
              <div class="modal-dialog">
                  <div class="modal-content">

                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" style="text-align:center;">Estas seguro de mover el cliente al modulo otros ?</h4>
                      </div>


                      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                          <a href="#" class="btn btn-danger" id="delete_links1"><?php echo 'Mover'?></a>
                          <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'Cancelar'?></button>
                      </div>
                  </div>
              </div>
          </div>


          <?php //enviar ENVIARCAPTACION  ?>




              <script type="text/javascript">
            function confirm_enviar2(delete_url)
            {
              jQuery('#modal-7').modal('show', {backdrop: 'static'});
              document.getElementById('delete_links2').setAttribute('href' , delete_url);


            }




            $(function() {
                function reposition() {
                    var modal = $(this),
                        dialog = modal.find('.modal-dialog');
                    modal.css('display', 'block');

                    // Dividing by two centers the modal exactly, but dividing by three
                    // or four works better for larger screens.
                    dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
                }
                // Reposition when a modal is shown
                $('.modal').on('show.bs.modal', reposition);
                // Reposition when the window is resized
                $(window).on('resize', function() {
                    $('.modal:visible').each(reposition);
                });
            });

            </script>

              <!-- (Normal Modal)-->
              <div class="modal" id="modal-7">
                  <div class="modal-dialog">
                      <div class="modal-content">

                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" style="text-align:center;">Estas seguro de mover el cliente al modulo captacion o comprare de contado ?</h4>
                          </div>


                          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                              <a href="#" class="btn btn-danger" id="delete_links2"><?php echo 'Mover'?></a>
                              <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'Cancelar'?></button>
                          </div>
                      </div>
                  </div>
              </div>




              <script type="text/javascript">
            function confirm_enviar3(delete_url)
            {
              jQuery('#modal-8').modal('show', {backdrop: 'static'});
              document.getElementById('delete_links3').setAttribute('href' , delete_url);


            }




            $(function() {
                function reposition() {
                    var modal = $(this),
                        dialog = modal.find('.modal-dialog');
                    modal.css('display', 'block');

                    // Dividing by two centers the modal exactly, but dividing by three
                    // or four works better for larger screens.
                    dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2.5));
                }
                // Reposition when a modal is shown
                $('.modal').on('show.bs.modal', reposition);
                // Reposition when the window is resized
                $(window).on('resize', function() {
                    $('.modal:visible').each(reposition);
                });
            });

            </script>

              <!-- (Normal Modal)-->
              <div class="modal" id="modal-8">
                  <div class="modal-dialog">
                      <div class="modal-content">

                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" style="text-align:center;">Estas seguro de mover el cliente al Modulo Agenda Conpra de Contado ?</h4>
                          </div>


                          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                              <a href="#" class="btn btn-danger" id="delete_links3"><?php echo 'Mover'?></a>
                              <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'Cancelar'?></button>
                          </div>
                      </div>
                  </div>
              </div>




              <script type="text/javascript">
            function confirm_enviar4(delete_url)
            {
              jQuery('#modal-9').modal('show', {backdrop: 'static'});
              document.getElementById('delete_links4').setAttribute('href' , delete_url);


            }


            $(function() {
                function reposition() {
                    var modal = $(this),
                        dialog = modal.find('.modal-dialog');
                    modal.css('display', 'block');

                    // Dividing by two centers the modal exactly, but dividing by three
                    // or four works better for larger screens.
                    dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2.5));
                }
                // Reposition when a modal is shown
                $('.modal').on('show.bs.modal', reposition);
                // Reposition when the window is resized
                $(window).on('resize', function() {
                    $('.modal:visible').each(reposition);
                });
            });

            </script>

              <!-- (Normal Modal)-->
              <div class="modal" id="modal-9">
                  <div class="modal-dialog">
                      <div class="modal-content">

                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" style="text-align:center;">Estas seguro de mover el cliente al Modulo Agenda Conpra de Contado ?</h4>
                          </div>


                          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                              <a href="#" class="btn btn-danger" id="delete_links4"><?php echo 'Mover'?></a>
                              <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'Cancelar'?></button>
                          </div>
                      </div>
                  </div>
              </div>
