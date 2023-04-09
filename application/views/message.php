<?php if ($this->session->has_userdata('danger')) { ?>
	<!-- Welcome Toast -->
	<div class="toast toast-autohide custom-toast-1 toast-danger home-page-toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="7000" data-bs-autohide="true">
		<div class="toast-body">
			<i class="bi bi-bookmark-x text-white h1 mb-0"></i>
			<div class="toast-text ms-3 me-2">
				<p class="mb-1 text-white"><?= $this->session->flashdata('danger'); ?></p>
			</div>
		</div>
		<button class="btn btn-close btn-close-white position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('success')) { ?>
	<!-- Welcome Toast -->
	<div class="toast toast-autohide custom-toast-1 toast-success home-page-toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="7000" data-bs-autohide="true">
		<div class="toast-body">
			<i class="bi bi-bookmark-check text-white h1 mb-0"></i>
			<div class="toast-text ms-3 me-2">
				<p class="mb-1 text-white"><?= $this->session->flashdata('success'); ?></p>
			</div>
		</div>
		<button class="btn btn-close btn-close-white position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('warning')) { ?>
	<!-- Welcome Toast -->
	<div class="toast toast-autohide custom-toast-1 toast-warning home-page-toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="7000" data-bs-autohide="true">
		<div class="toast-body">
			<i class="bi bi-exclamation-triangle text-white h1 mb-0"></i>
			<div class="toast-text ms-3 me-2">
				<p class="mb-1 text-white"><?= $this->session->flashdata('warning'); ?></p>
			</div>
		</div>
		<button class="btn btn-close btn-close-white position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('info')) { ?>
	<!-- Welcome Toast -->
	<div class="toast toast-autohide custom-toast-1 toast-info home-page-toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="7000" data-bs-autohide="true">
		<div class="toast-body">
			<i class="bi bi-exclamation-circle text-white h1 mb-0"></i>
			<div class="toast-text ms-3 me-2">
				<p class="mb-1 text-white"><?= $this->session->flashdata('info'); ?></p>
			</div>
		</div>
		<button class="btn btn-close btn-close-white position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
	</div>
<?php } ?>