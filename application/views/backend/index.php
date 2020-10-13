<?php
$system_name        =	$this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$text_align         =	$this->db->get_where('settings', array('type' => 'text_align'))->row()->description;
$account_type       =	$this->session->userdata('login_type');
$skin_colour        =   $this->db->get_where('settings', array('type' => 'skin_colour'))->row()->description;
$active_sms_service =   $this->db->get_where('settings', array('type' => 'active_sms_service'))->row()->description;
$running_year 		=   $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
?>
<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl'; ?>">

	<head>

		<title><?php echo $page_title; ?> | <?php echo $system_name; ?></title>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Ekattor School Manager Pro - Creativeitem" />
		<meta name="author" content="Creativeitem" />

		<?php include 'includes_top.php'; ?>

	</head>

	<body class="page-body" style="background-color: #ffffff;">
		<div class="page-container horizontal-menu" style="padding-top: 5px; background-color:#75bee9">
			<center><img class="img-responsive" src="<?php echo base_url('uploads/logo_header.png'); ?>" /></center>
			<?php include $account_type . '/navigation.php'; ?>
		</div>
		<div class="main-content" style="padding:20px; ">
			<div class="container">
				<?php include $account_type . '/' . $page_name . '.php'; ?>
				<?php include 'footer.php'; ?>
			</div>
		</div>
		<?php include 'includes_bottom.php'; ?>
	</body>
</html>