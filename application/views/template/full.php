<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Default Head -->
    <?php $this->load->view("components/script/meta") ?>
    <!-- ! Default Head -->
</head>

<body>
    <!-- Checking -->

    <?php $this->load->view("components/script/checking")?>
    
    <!-- ! Checking -->

    <!-- Content -->
    
    <?= $contents ?>
    
    <!-- ! Content -->

    <!-- All JavaScript Files -->
    
    <?php $this->load->view("components/script/footer-assets") ?>
    
    <!-- ! All JavaScript Files -->
</body>

</html>