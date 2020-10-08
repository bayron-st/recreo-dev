
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">


           <table class="table table-bordered datatable" id="table_export">
                <thead>
                    <tr>
                        <th>#</th>


                        <th><div><?php echo 'Pais'; ?></div></th>
                        <th><div><?php echo 'NIT'; ?></div></th>
                        <th><div><?php echo 'Nombre'; ?></div></th>
                        <th><div><?php echo 'Direccion'; ?></div></th>
                        <th><div><?php echo 'Telefono'; ?></div></th>


                        <th><div><?php echo 'Accion'; ?></div></th>

                    </tr>
                </thead>
                <tbody>

                  <?php


                 $participantes	= $this->db->select('*');
                 $participantes	= $this->db->from('tiendas');
                 $participantes	=	$this->db->get()->result_array();

                foreach($participantes as $row):  ?>


                    <tr>

                              <td><?php echo $count++;?></td>

                              <td><?php echo $row['ID_PAIS'];?></td>
                              <td><?php echo $row['NIT'];?></td>
                              <td><?php echo $row['NOMBRE'];?></td>
                              <td><?php echo $row['DIRECCION'];?></td>
                              <td><?php echo $row['TELEFONO'];?></td>


                        <td>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Accción <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <!-- staff EDITING LINK -->
                                    <li>
                                      <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_marketing_edit/'.$row['id_marketing']);?>');">
                                          <i class="entypo-pencil"></i>
                      <?php echo 'EDITAR';?>
                                            </a>
                                            </li>
                                    <li class="divider"></li>

                                    <!-- staff DELETION LINK -->
                                    <li>
                                      <a href="#" onclick="confirm_modal('<?php echo site_url('staff/preaprobado_antiguo_edit/delete/'.$row['id_marketing']);?>');">
                                          <i class="entypo-trash"></i>
                      <?php echo 'ELIMINAR';?>
                                            </a>
                                            </li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

			</div>
		</div>
	</div>
</div>


<!--  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

	jQuery(document).ready(function($)
	{


		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
			"sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
			"oTableTools": {
				"aButtons": [

					{
						"sExtends": "xls",
						"mColumns": [1,2]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1,2]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(0, false);
							datatable.fnSetColumnVis(3, false);

							this.fnPrint( true, oConfig );

							window.print();

							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(0, true);
									  datatable.fnSetColumnVis(3, true);
								  }
							});
						},

					},
				]
			},

		});

		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});

</script>
