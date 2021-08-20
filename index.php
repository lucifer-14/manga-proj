<html>
<?php

include "utilities/header.php";
$title='Home';

$dataOM=mysqli_query($conn, "select *, manga.id as mId, chapters.id as cId from manga, chapters where active=1 and manga.id=chapters.manga_id order by chapters.updated_date desc limit 6");
$dataHM=mysqli_query($conn, "select * from manga where active=1 order by views desc limit 6");

?>
<style type="text/css">

  .genre:hover {
    color: black;
    opacity: 1;
  }
  .genre {
    font-weight: bold;
    color: black;
    opacity: 0.65;
  }
  
</style>
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php include "utilities/navbar.php" ?>

    <div class="content-wrapper">
      <!-- <div class="slider-wrapper" style="background-image: url('images/cover_photos/office.jpg');  width: 100%; height: 100%; background-position: center; background-attachment: fixed; background-size: contain; opacity: 0.6">
        
          
      </div> -->
      <!-- <img src="images/cover_photos/forest.jpg" width="100%"> -->
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-lg-8 col-12">
              <h1 class="m-0 text-dark">Black & White</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <hr>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <!-- Online manga start -->
          <div class="row">
            <div class="col-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h4 class="text-title text-center">Latest Manga
                  </h4>
                </div>
                <div class="card-body">
                  <div class="row" style="margin: 0 auto;">
                    <?php while ($manga = mysqli_fetch_assoc($dataOM)) : ?>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                      <a href="mangaread.php?mangaId=<?php echo $manga['mId'] ?>&chapterNumber=<?php echo $manga['chapter_number'] ?>">
                      <div class="card bg-light">
                        <img class="card-img-top" src="<?php echo $manga['cover_photo'] ?>">
                        <div class="card-body">
                          <div class="card-title" style="height: 70px;"><?php echo $manga['manga_name']?></div>
                          <div class="card-text"><?php echo 'Chapter - '.$manga['chapter_number'].'/'.$manga['chapters'] ?> </div>
                          <div class="card-text"><?php echo 'Genre - '.$manga['genre'] ?></div>
                        </div>
                      </div>
                      </a>
                    </div>
                    <?php endwhile; ?>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <a href="onlinemanga.php" class="btn btn-primary">More Manga</a>
                </div>
              </div>
            </div>
          </div>
          <!-- Online manga end -->
          <!-- Hot manga start -->
          <div class="row">
            <div class="col-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h4 class="text-title text-center">Hot Manga</h4>
                </div>
                <div class="card-body">
                  <div class="row" style="margin: 0 auto;">
                    <?php while ($manga = mysqli_fetch_assoc($dataHM)) : ?>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                      <a href="mangadetails.php?mangaId=<?php echo $manga['id'] ?>">
                      <div class="card bg-light">
                        <img class="card-img-top" src="<?php echo $manga['cover_photo'] ?>">
                        <div class="card-body">
                          <div class="card-title" style="height: 70px;"><?php echo $manga['manga_name']?></div>
                          <div class="card-text"><?php echo 'Chapters -'.$manga['chapters']?></div>
                          <div class="card-text"><?php echo 'Genre - '.$manga['genre'] ?></div>
                        </div>
                      </div>
                      </a>
                    </div>
                    <?php endwhile; ?>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <a href="hotmanga.php" class="btn btn-primary">More Hot Manga</a>
                </div>
              </div>
            </div>
          </div>
          <!-- Hot manga end -->
          <!-- Manga list start -->
          <div class="row">
            <div class="col-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h4 class="text-title text-center">Manga List</h4>
                </div>
                <div class="card-body">
                  
                    <div class="row">
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=all">All</a></li></div>
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=action">Action</a></li></div>
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=adventure">Adventure</a></li></div>
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=romance">Romance</a></li></div>
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=fantasy">Fantasy</a></li></div>
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=supernatural">Supernatural</a></li></div>
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=horror">Horror</a></li></div>
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=sliceoflife">Slice Of Life</a></li></div>
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=webtoon">Webtoon</a></li></div>
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=historical">Historial</a></li></div>
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=martialarts">Martial Arts</a></li></div>
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=sports">Sports</a></li></div>
                      <div class="col-6"><li><a class="genre" href="mangalist.php?genre=comedy">Comedy</a></li></div>
                    </div>
                  
                </div>
                <div class="card-footer text-center">
                  <!-- <a href="" class="btn btn-primary">More Articles</a> -->
                </div>
              </div>
            </div>
          </div>
          <!-- Manga list end -->

          <!-- <div><center><i class="fa fa-smile-wink" style="margin-top: 20px;font-size: 60px; color: #869099;"></i></center></div> -->

          <!-- /.row (end card) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

    <?php include "utilities/footer.php" ?>
  </div>
</body>
</html>