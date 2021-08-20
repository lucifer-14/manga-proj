<html>
<?php

include "utilities/header.php";
$title='Manga Details';
$manga_name="";
$rownum=0;
if (isset($_GET['mangaId']) && is_numeric($_GET['mangaId'])) {
  $manga_id=$_GET['mangaId'];
  
  $data=mysqli_query($conn, "select * from manga where active=1 and id=$manga_id");
  $rownum=mysqli_num_rows($data);
  
  if($rownum>0) {

    $extracted_data=mysqli_fetch_object($data);
    $manga_name=$extracted_data->manga_name;
    $chapters=$extracted_data->chapters;
    $genre=$extracted_data->genre;
    $description=$extracted_data->description;
    $status=$extracted_data->status;
    $created_date=$extracted_data->created_date;
    $updated_date=$extracted_data->updated_date;
    $cover_photo=$extracted_data->cover_photo;
    $views=$extracted_data->views;
    $views+=1;
    
    mysqli_query($conn,"update manga set views='$views' where id=$manga_id");
  }
}

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
              <h1 class="m-0 text-dark"> Black & White<?php  if ($manga_name!="") { echo " - ".$manga_name; } ?></h1>
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
          <!-- Hot manga start -->
            <div class="col-lg-8 col-12">
              <div class="card card-primary card-outline">
                <?php if ($rownum>0) : ?>
                <div class="card-body">
                  <div class="row">

                    <div class="col-md-5 col-12"><center><img style="width: 80%;" src="<?php echo $cover_photo ?>"></center></div>
                    <div class="col-md-7 col-12">
                     
                        <div style="font-weight:bold; font-size: 25px;"><?php echo $manga_name ?></div><br>
                        
                      
                      
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                              <div class="row">
                              <b class="col-md-5 col-4">Chapters:  </b>
                              <a class="col-md-7 col-8">
                                  <p class="dataField"><?php echo $chapters ?></p>
                              </a>
                              </div>
                          </li>
                          <li class="list-group-item">
                              <div class="row">
                              <b class="col-md-5 col-4">Status:  </b>
                              <a class="col-md-7 col-8">
                                  <p class="dataField"><?php echo $status ?></p>
                              </a>
                              </div>
                          </li>
                          <li class="list-group-item">
                              <div class="row">
                              <b class="col-md-5 col-4">Genre:  </b>
                              <a class="col-md-7 col-8">
                                  <p class="dataField" style=""><?php echo $genre ?></p>
                              </a>
                              </div>
                          </li>
                          <li class="list-group-item">
                              <div class="row">
                              <b class="col-md-5 col-4">Created Date:  </b>
                              <a class="col-md-7 col-8">
                                  <p class="dataField"><?php echo $created_date ?></p>
                              </a>
                              </div>
                          </li>
                          <li class="list-group-item">
                              <div class="row">
                              <b class="col-md-5 col-4">Last Updated:  </b>
                              <a class="col-md-7 col-8">
                                  <p class="dataField"><?php echo $updated_date ?></p>
                              </a>
                              </div>
                          </li>
                          <li class="list-group-item">
                              <div class="row">
                              <b class="col-md-5 col-4">Views:  </b>
                              <a class="col-md-7 col-8">
                                  <p class="dataField"><?php echo $views ?></p>
                              </a>
                              </div>
                          </li>
                        </ul>
                     
                    </div>
                  
                    <div class="col-12">
                      <div class="card-title" style="font-weight: bold;">Description</div><br><br>
                      
                    </div>
                    <div class="col-12">
                      <div class="card-text"><?php echo $description ?></div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  
                  <form method="get" action="mangaread.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="row">
                          <input type="hidden" name="mangaId" value="<?php echo $manga_id; ?>">
                          <div class="col-12">
                            <select style="width: 100%;" class="form-control select2" name="chapterNumber">
                              <?php for ($x=1;$x<=$chapters;$x++) : ?>
                                <option value="<?php echo $x ?>" <?php echo ($x==$chapters) ? "selected" : "" ?>><?php echo "Chapter - ".$x ?></option>
                              <?php endfor; ?>
                            </select>
                          </div>
                          <br><br>
                        <div class="col-12"><center><button style="width: 100%" class="btn btn-primary">Read</button></center></div>
                      </div>
                    </div>
                  </form>
                </div>
                <?php else: ?>
                <div class="card-footer">
                  No manga details found.
                </div>
                <?php endif; ?>
              </div>
            </div>
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
          <!-- Online manga end -->
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