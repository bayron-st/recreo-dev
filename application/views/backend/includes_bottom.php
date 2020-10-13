<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css" rel="stylesheet" />
<link href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" />

<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>


<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.45/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.45/css/bootstrap-datetimepicker.min.css" />

<link rel="stylesheet" href="<?php echo base_url('assets/js/daterangepicker/daterangepicker-bs3.css');?>">

<script src="<?php echo base_url('assets/js/bootstrap-timepicker.min.js');?>"></script>


<link rel="stylesheet" href="<?php echo base_url('assets/js/datatables/responsive/css/datatables.responsive.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/js/select2/select2-bootstrap.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/js/select2/select2.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/js/selectboxit/jquery.selectBoxIt.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/colores.css');?>">
<!-- fecha rangos -->

<script src="<?php echo base_url('assets/js/daterangepicker/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/daterangepicker/daterangepicker.js');?>"></script>




	<!-- Bottom Scripts -->
<script src="<?php echo base_url('assets/js/gsap/main-gsap.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js');?>"></script>


<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
<script src="<?php echo base_url('assets/js/joinable.js');?>"></script>
<script src="<?php echo base_url('assets/js/resizeable.js');?>"></script>
<script src="<?php echo base_url('assets/js/neon-api.js');?>"></script>
<script src="<?php echo base_url('assets/js/toastr.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/fullcalendar/fullcalendar.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
<script src="<?php echo base_url('assets/js/fileinput.js');?>"></script>

<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/datatables/TableTools.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.js');?>"></script>
<script src="<?php echo base_url('assets/js/datatables/jquery.dataTables.columnFilter.js');?>"></script>
<script src="<?php echo base_url('assets/js/datatables/lodash.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/datatables/responsive/js/datatables.responsive.js');?>"></script>
<script src="<?php echo base_url('assets/js/select2/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/selectboxit/jquery.selectBoxIt.min.js');?>"></script>


<script src="<?php echo base_url('assets/js/neon-calendar.js');?>"></script>
<script src="<?php echo base_url('assets/js/neon-chat.js');?>"></script>
<script src="<?php echo base_url('assets/js/neon-custom.js');?>"></script>
<script src="<?php echo base_url('assets/js/neon-demo.js');?>"></script>

<script src="<?php echo base_url('assets/js/wysihtml5/wysihtml5-0.4.0pre.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/wysihtml5/bootstrap-wysihtml5.js');?>"></script>





<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != ""):?>

<script type="text/javascript">
	toastr.success('<?php echo $this->session->flashdata("flash_message");?>');
</script>

<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>

	<script>
															 swal.fire({
																   type: 'error',
																	 title: 'Oops...',
																	 text: "<?php echo $this->session->flashdata('error_message'); ?>",
																	 timer: 10000,
																	 position: 'center',
																	 showConfirmButton: false,
																	 type: 'error'
															 });

													 </script>

<?php endif;?>




<!---  DATA TABLE EXPORT CONFIGURATIONS -->
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		var datatable = $("#table_export").dataTable();

		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});

</script>


<script type="text/javascript">
		function format(input)
		{
		var num = input.value.replace(/\./g,'');
		if(!isNaN(num)){
		num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
		num = num.split('').reverse().join('').replace(/^[\.]/,'');
		input.value = num;
		}

		else{ alert('Solo se permiten numeros');
		input.value = input.value.replace(/[^\d\.]*/g,'');
		}
		}
</script>
