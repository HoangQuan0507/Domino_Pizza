
<?php
session_start();
ob_start();
include 'library/config.php';
include 'library/connect.php';
include 'admin/model/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'blocks/head.php'; ?>
</head>
	<body>

	<div class="loader_wrapper">
		<?php include 'blocks/loader_wrapper.php' ?>
	</div> <!--// loader_wrapper -->

		<div id="wrapper">
		
			<header class="new-block main-header">
				<?php include 'blocks/header.php' ?>
			</header> <!-- header -->

			<div class="banner slider1 new-block">
				<?php include 'blocks/banner.php' ?>
			</div><!-- banner -->
			
			<?php
                include 'blocks/section.php';
			?>
			<div class="copy-right">
				<?php include 'blocks/container.php' ?>
			</div>
			<?php include 'blocks/choose_color.php' ?>
			<?php include 'blocks/arrow.php' ?>

		</div><!-- #wrapper -->

	<?php include 'blocks/jquery.php' ?>
</body>
</html>