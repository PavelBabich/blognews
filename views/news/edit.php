<?php require_once ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="mt-4">Edit news</h1>
            <br>
            <?php if($error):?>
            <h3>Заполните правильно поля</h3>
            <?php endif;?>
            <form action="" method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" value="<?php echo $post['title']; ?>" type="text" class="form-control" placeholder="Enter title" require>
                </div>
                <div class="form-group">
                    <label>Short content</label>
                    <textarea name="shortContent" type="textarea" rows="3" class="form-control" placeholder="Enter short content" require><?php echo $post['short_content']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" type="textarea" rows="4" class="form-control" placeholder="Enter content" require><?php echo $post['content']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Publication date</label>
                    <input name="date" value="<?php echo $post['date']; ?>" type="text" class="form-control" placeholder="Enter publication date" require>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <img src="<?php echo $post['image'];?>" class="card-img-top"  alt="">
                    <input name="image" value="" type="file" class="form-control" placeholder="" require>
                </div>

                <div class="form-group">
                    <button name="submit" value="submit" type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>

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