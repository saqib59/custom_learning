
<form method="post">
		<input type="text" name="first_name" value="">
		<input type="checbox" name="" <?php echo ()? 'checked':''; ?> >
		<error>
			<?php 
			echo (isset($fname_err))? $fname_err : '';
			 ?>
			</error>
		<input type="text" name="email">
		<error>	<?php 
			echo (isset($email_err))? $email_err : '';
			 ?></error>
		<input type="submit" name="submit_btn">
	</form>