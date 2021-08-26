<?php
	$success	= $this->session->flashdata('success');
	$error		= $this->session->flashdata('error');
	$warning	= $this->session->flashdata('warning');

	if ($success) {
		$alert_status	= 'alert-success';
		$status			= 'Success!';
		$message		= $success;
	}

	if ($error) {
		$alert_status	= 'alert-danger';
		$status			= 'Error!';
		$message		= $error;
	}

	if ($warning) {
		$alert_status	= 'alert-warning';
		$status			= 'Warning!';
		$message		= $warning;
	}
?>

<?php if ($success || $error || $warning): ?>
<div class="row">
	<div class="col-md-12">
		<div class="alert <?= $alert_status ?> alert-dismissible fade show" role="alert">
			<strong><?= $status ?></strong> <?= $message ?>
		</div>
	</div>
</div>
<?php endif ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 4000);
    });
</script>
