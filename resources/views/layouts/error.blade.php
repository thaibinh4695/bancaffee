<div class="card">
	<h4 class="card-header">Lỗi</h4>
	<div class="card-body">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<?php echo $error_message; ?> <a href="#back" onclick="history.go(-1); return false;">Quay lại trang trước</a>
		</div>
	</div>
</div>
