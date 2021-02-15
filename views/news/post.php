<?php require_once ROOT . '/models/News.php'; ?>
<?php News::setCountViews($newsItem['id']) ;?>

<?php include ROOT . '/views/layouts/header.php'; ?>


<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

      <!-- Title -->
      <h1 class="mt-4"><?php echo $newsItem['title'];?></h1>

      <hr>

      <!-- Date/Time -->
      <p>Posted on <?php echo $newsItem['date'];?></p>

      <hr>

      <!-- Preview Image -->
      <img class="img-fluid rounded" src="<?php echo $newsItem['image']?>" alt="">

      <hr>

      <!-- Post Content -->
      <p class="lead"><?php echo $newsItem['content'];?></p>

      

      <hr>

    </div>


    <?php include ROOT . '/views/layouts/footer.php'; ?>