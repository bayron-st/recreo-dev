<?php
	$system_name        =	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
	//$system_title       =	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
	$text_align         =	$this->db->get_where('settings' , array('type'=>'text_align'))->row()->description;
	$account_type       =	$this->session->userdata('login_type');
	$skin_colour        =   $this->db->get_where('settings' , array('type'=>'skin_colour'))->row()->description;
	$active_sms_service =   $this->db->get_where('settings' , array('type'=>'active_sms_service'))->row()->description;
	$running_year 		=   $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;
	?>
<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl';?>">
<head>

	<title><?php echo $page_title;?> | <?php echo $system_name;?></title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Ekattor School Manager Pro - Creativeitem" />
	<meta name="author" content="Creativeitem" />



	<?php include 'includes_top.php';?>

</head>

<body class="page-body" >


	<center>	<img src="<?php echo base_url('uploads/logo_header.png');?>"/> </center>

	<div class="page-container horizontal-menu sidebar-collapsed">


	<?php include 'header.php';?>

		<div class="main-content">



           <h3 style="">
           	<i class="entypo-right-circled"></i>
				<?php echo $page_title;?>
           </h3>

			<?php include $account_type.'/'.$page_name.'.php';?>

			<?php include 'footer.php';?>

		</div>
		<?php //include 'chat.php';?>


    <?php include 'modal.php';?>
    <?php include 'includes_bottom.php';?>
	</div>
</body>
</html>