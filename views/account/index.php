<?php include ROOT . '/views/layouts/header.php';?>


<div class="container" style="min-height: calc(100vh - 176px);">
  <div class="row">
    <div class="col-lg-8">
      <h1 class="mt-4">User account</h1>
      <br>
      <?php if(isset($_SESSION['admin'])):?>
      <h4>Admin!</h4>
      <br>
      <?php endif;?>
      <h4>Your name: <?php echo $user['name']; ?></h4>
      <br>
      <h4>Your surname: <?php echo $user['surname']; ?></h4>
      <br>
      <h4>Your email: <?php echo $user['email']; ?></h4>
      <br>
    </div>
  </div>
</div>


<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/template/vendor/jquery/jquery.min.js"></script>
<script src="/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
