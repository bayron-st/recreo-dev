<!--// 19/09/2018-->
<a href="javascript:;" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_grupos_add');?>');"
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        <?php echo 'Ingresar Grupo';?>
</a>
<br><br>

<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th style="width: 60px;">#</th>
            <th><div><?php echo 'Codigo de grupo';?></div></th>
            <th><div><?php echo 'Nombre'?></div></th>
            <th><div><?php echo 'Acciones';?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $grupos   =   $this->db->get('grupo_ventas')->result_array();
        foreach($grupos as $row): ?>
            <tr>
                <td><?php echo $count++;?></td>
                <td><?php echo $row['cod_grupo'];?></td>
                <td><?php echo $row['nombre'];?></td>
                <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Acciones <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                            <li>
                                <a href="#" onclick="showAjaxModal('<?php echo site_url('modal/popup/modal_grupo_edit/' . $row['id_grupo']);?>')">
                                    <i class="entypo-pencil"></i>
                                    <?php echo 'Editar';?>
                                </a>
                            </li>
                            <li class="divider"></li>

                            <li>
                                <a href="#" onclick="confirm_modal('<?php echo site_url('admin/grupos/delete/' . $row['id_grupo']);?>');">
                                    <i class="entypo-trash"></i>
                                    <?php echo 'Eliminar';?>
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
        $('#table_export').dataTable();
    });

</script>
