


               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo 'Foto';?></div></th>
                            <th><div><?php echo 'Nombre';?></div></th>
                            <th><div><?php echo 'Email';?></div></th>
                            <th><div><?php echo 'Acciones';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $asesores	=	$this->db->get('asesor' )->result_array();
                                foreach($asesores as $row):?>
                        <tr>
                            <td><img src="<?php echo $this->crud_model->get_image_url('asesor',$row['asesor_id']);?>" class="img-circle" width="30" /></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                        <li>
                                            <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_asesor_edit/' . $row['asesor_id']);?>')">
                                                <i class="entypo-pencil"></i>
                                                	<?php echo 'EDITAR';?>
                                            </a>
                                        </li>
                                        <li class="divider"></li>

                                        <li>
                                            <a href="#" onclick="confirm_modal('<?php echo site_url('admin/asesor/delete/' . $row['asesor_id']);?>');">
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



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

	jQuery(document).ready(function($)
	{


		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
      "aLengthMenu": [50, 100, 500, 1000],
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
