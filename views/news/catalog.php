  <?php require_once ROOT . '/models/User.php'; ?>
  <?php include ROOT . '/views/layouts/header.php'; ?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">News feed

        </h1>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sort by
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/news?sort=date&type=desc">Date added(newest)</a>
            <a class="dropdown-item" href="/news?sort=date&type=asc">Date added(oldest)</a>
            <a class="dropdown-item" href="/news?sort=count_views&type=desc">Views(more)</a>
            <a class="dropdown-item" href="/news?sort=count_views&type=asc">Views(fewer)</a>
          </div>
        </div>


        <!-- Blog Post -->
        <?php if (empty($newsList)) : ?>
          <p>Список постов пуст</p>
        <?php else : ?>
          <?php foreach ($newsList as $newsItem) : ?>
            <div class="card mb-4">
              <img class="card-img-top" src="<?php echo $newsItem['image']; ?>" alt="Card image cap">
              <div class="card-body">
                <h2 class="card-title"><?php echo $newsItem['title']; ?></h2>
                <p class="card-text"><?php echo $newsItem['short_content']; ?></p>
                <a href="/news/<?php echo $newsItem['id']; ?>" class="btn btn-primary">Read More &rarr;</a>
                <?php if (isset($_SESSION['admin'])) : ?>
                  <a href="/news/edit/<?php echo $newsItem['id']; ?>" class="btn btn-primary">Edit &rarr;</a>
                <?php endif; ?>
              </div>
              <div class="card-footer text-muted">
                Posted on <?php echo $newsItem['date']; ?>
                <br>
                Views: <?php echo $newsItem['count_views']; ?>
              </div>
            </div>
        <?php endforeach;
        endif; ?>


        <!-- Pagination -->
        <!-- <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul> -->

      </div>

      <?php include ROOT . '/views/layouts/footer.php'; ?>