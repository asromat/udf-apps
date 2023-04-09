<!DOCTYPE html>
<html lang="id">

<head>
  <!-- Default Head -->
  <?php $this->load->view("components/script/meta") ?>
  <?php if (isset($header_script)) { $this->load->view("script/" . $header_script); }
	?>
  <!-- ! Default Head -->
</head>

<body>
  <!-- Checking -->

  <?php $this->load->view("components/script/checking") ?>

  <!-- ! Checking -->

  <!-- Header Area -->
  <div class="header-area" id="headerArea">
    <div class="container">
      <!-- Header Content -->
      <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
        <!-- Back Button -->
        <div class="back-button">
          <a onclick="history.back()" href="#">
            <i class="bi bi-arrow-left-short"></i>
          </a>
        </div>

        <!-- Page Title -->
        <div class="page-heading">
          <h6 class="mb-0"><?= $menu ?></h6>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->

  <?= $contents ?>

  <!-- ! Content -->

  <!-- All JavaScript Files -->

  <?php $this->load->view("components/script/footer-assets") ?>
  <?php if (isset($footer_script)) { $this->load->view("script/" . $footer_script); } ?>

  <!-- ! All JavaScript Files -->
</body>

</html>