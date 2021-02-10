  <?php include ROOT.'/views/layouts/header.php';?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">News feed
          
        </h1>

        <!-- Blog Post -->
        <?php foreach($newsList as $newsItem):?>
        <div class="card mb-4">
          <img class="card-img-top" src="/<?php echo $newsItem['preview'] ;?>" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?php echo $newsItem['title'] ;?></h2>
            <p class="card-text"><?php echo $newsItem['short_content'] ;?></p>
            <a href="/news/<?php echo $newsItem['id'];?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo $newsItem['date'];?>
          </div>
        </div>
        <?php endforeach;?>

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>
  
<?php include ROOT.'/views/layouts/footer.php';?>

      
