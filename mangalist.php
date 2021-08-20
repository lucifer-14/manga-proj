<html>
<?php

include "utilities/header.php";
$title='Manga List';
if (isset($_GET['genre'])) {
  $genre = $_GET['genre'];
  $genre=get_genre($genre);
} else {
  $genre="all";
}
// $data=mysqli_query($conn, "select * from animes where active=1 order by name1, season");
$dataML=mysqli_query($conn, "select * from manga where active=1 order by updated_date desc");
?>
<style type="text/css">

  .manga-title:hover {
    color: black;
    opacity: 0.9;
  }
  .manga-title {
    font-weight: bold;
    color: black;
    opacity: 0.75;
  }
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
              <h1 class="m-0 text-dark">Black & White - Manga List - <?php echo ucwords($genre)?> </h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <hr>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          
          <div class="row">
            <!-- Manga list start -->
            <div class="col-lg-8 col-12">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div class="table-responsive">
                      <table id="manga-table" class="table table-striped dt-table">
                          <thead>
                            <tr>
                              <th class="no-sort"></th>
                              <th>Manga Details</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php while ($manga = mysqli_fetch_assoc($dataML)) : ?>
                                  <?php if (str_contains($manga['genre'], $genre) or $genre=="all" ) : ?>
                                  
                                  <tr>
                                      <td><a href="mangadetails.php?mangaId=<?php echo $manga['id'] ?>"><img src="<?php echo $manga['cover_photo']; ?>" alt="" class="round listImg" style="height: 120px; width: 85px;"></a></td>
                                      <td><a class="manga-title" href="mangadetails.php?mangaId=<?php echo $manga['id'] ?>"><?php echo $manga["manga_name"] ?></a><br>Chapters - <?php echo $manga['chapters']; ?><br>Genre - <?php echo $manga['genre']; ?></td>
                                      <!-- <td><?php /*$tempId=$animes['id'];$query=mysqli_query($conn, "select * from episodes where active=1 and animeId=$tempId");$epCount=mysqli_num_rows($query); echo $epCount; ?></td>
                                      <td><?php echo $animes["animeType"] ?></td>
                                      <td><?php echo $animes["genre"] ?></td>
                                      <td><?php echo $animes["status"]*/ ?></td> -->
                                  </tr>
                                <?php endif; ?>
                                                                 
                              <?php endwhile; ?>
                          </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Online manga end -->
            <div class="col-lg-4 col-12">
              <div class="card card-primary card-outline">
                <div class="card-header" style="font-weight: bold; font-size: 22px;">
                  Genre
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=all">All</a></li></div>
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=action">Action</a></li></div>
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=adventure">Adventure</a></li></div>
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=romance">Romance</a></li></div>
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=fantasy">Fantasy</a></li></div>
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=supernatural">Supernatural</a></li></div>
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=horror">Horror</a></li></div>
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=sliceoflife">Slice Of Life</a></li></div>
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=webtoon">Webtoon</a></li></div>
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=historical">Historial</a></li></div>
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=martialarts">Martial Arts</a></li></div>
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=sports">Sports</a></li></div>
                      <div class="col-lg-12 col-6"><li><a class="genre" href="mangalist.php?genre=comedy">Comedy</a></li></div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          

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
</script>