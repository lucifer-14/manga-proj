<html>
<?php

include "utilities/header.php";
$title='Manga Details';
$manga_name="";
$rownum=0;
if (isset($_GET['mangaId']) && is_numeric($_GET['mangaId']) && isset($_GET['chapterNumber']) && is_numeric($_GET['chapterNumber']) ) {
  $manga_id=$_GET['mangaId'];
  $chapter_number=$_GET['chapterNumber'];
  
  $data=mysqli_query($conn, "select *, manga.id as mId, chapters.id as cId from manga, chapters where manga.id=chapters.manga_id and active=1 and manga.id=$manga_id and chapter_number=$chapter_number");
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

    $content=$extracted_data->content;
    $chp_updated_date=$extracted_data->updated_date;

    mysqli_query($conn,"update manga set views='$views' where id=$manga_id");
  }
}

?>
<style type="text/css">

  .btn {
    height: 38px;
  }
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
              <div id="main-card" class="card card-primary card-outline">
                <?php if ($rownum>0) : ?>
                <div class="card-header">
                  <div class="row">
                    <div class="col-12">
                      <div class="card-title" style="font-weight: bold; font-size: 18px;">&nbsp;<?php echo $manga_name ?></div>
                    </div><br><br>
                    <input type="hidden" name="mangaId" id="mangaId" value="<?php echo $manga_id; ?>">
                    <input type="hidden" name="chapterNumber" id="chapterNumber" value="<?php echo $chapter_number; ?>">
                    <input type="hidden" name="content" id="content" value="<?php echo $content ?>">
                    <div class="col-lg-8 col-6">
                      <select style="width: 100%;" id="select2" class="form-control select2" name="chapterNumber">
                        <?php for ($x=1;$x<=$chapters;$x++) : ?>
                          <option value="<?php echo $x ?>" <?php echo ($x==$chapter_number) ? "selected" : "" ?>><?php echo "Chapter - ".$x ?></option>
                        <?php endfor; ?>
                      </select>
                    </div>
                    <br><br>
                    <?php if ($chapter_number!=1) : ?>
                    <div class="col-lg-2 col-3"><center><button id="prev-btn" style="width: 100%" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></center></div>
                    <?php endif; ?>
                    <?php if ($chapter_number!=$chapters) : ?>
                    <div class="col-lg-2 col-3"><center><button id="next-btn" style="width: 100%" class="btn btn-primary"><i class="fa fa-chevron-right" aria-hidden="true"></i></button></center></div>
                    <?php endif; ?>
                  </div>
                  <div id="content-display"></div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <?php if ($chapter_number!=1) : ?>
                    <div class="col-lg-2 col-3"><center><button id="prev-btn1" style="width: 100%" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i></button></center></div>
                    <?php endif; ?>
                    <?php if ($chapter_number!=$chapters) : ?>
                    <div class="col-lg-2 col-3"><center><button id="next-btn1" style="width: 100%" class="btn btn-primary"><i class="fa fa-chevron-right" aria-hidden="true"></i></button></center></div>
                    <?php endif; ?>
                  </div>
                </div>
                <?php else: ?>
                <div class="card-footer">
                  No chapter found.
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
<script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.8.335/build/pdf.min.js"></script>
<script type="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
<!-- <script type="plugins/js/renderpdf.js"></script> -->
<script type="text/javascript">

  $(document).ready(function(){
    var manga_id=$('#mangaId').val();
    var chapter_number=$('#chapterNumber').val();
    url=window.location.pathname;
    $('#next-btn').on('click', function(){
        chapter_number=parseInt(chapter_number)+1;
        window.location.assign(url+"?mangaId="+manga_id+"&chapterNumber="+chapter_number)
    })
    $('#prev-btn').on('click', function(){
        chapter_number=parseInt(chapter_number)-1;
        window.location.assign(url+"?mangaId="+manga_id+"&chapterNumber="+chapter_number)
    })
    $('#next-btn1').on('click', function(){
        chapter_number=parseInt(chapter_number)+1;
        window.location.assign(url+"?mangaId="+manga_id+"&chapterNumber="+chapter_number)
    })
    $('#prev-btn1').on('click', function(){
        chapter_number=parseInt(chapter_number)-1;
        window.location.assign(url+"?mangaId="+manga_id+"&chapterNumber="+chapter_number)
    })
    $('.select2').on('select2:select', function (e) {
        var data = e.params.data;
        chapter_number=data['id'];
        
        window.location.assign(url+"?mangaId="+manga_id+"&chapterNumber="+chapter_number)
    });
  })

  var pdfFile=$('#content').val();
  var loadingTask=pdfjsLib.getDocument(pdfFile);
  loadingTask.promise.then(function(pdf) {
    console.log("PDF Loaded");
    console.log(pdf.numPages)
    //var pagenumber=1
    for (var pagenumber=1; pagenumber<=pdf.numPages; pagenumber++){
    
      pdf.getPage(pagenumber).then(function(page){
        console.log("Page Loaded");
        var scale=1;
        // console.log(maincard.width/page.getViewport(1.0).width)
        console.log($('#main-card').width())
        console.log(page.getViewport({scale:1}).width)
        card_width=$('#main-card').width();
        viewport_width=page.getViewport({scale:1}).width;
        if (card_width>=viewport_width){
          scale=viewport_width/card_width;
          scale-=0.05;
        }else{
          scale=card_width/viewport_width;
          scale-=0.05;
        }
        var maincard=document.getElementById("main-card");
        var viewport =page.getViewport({scale:scale});
        console.log("the-canvas"+pagenumber);
        var canvas = document.createElement("canvas");
        var context = canvas.getContext("2d");
        canvas.height=viewport.height;
        canvas.width = viewport.width;

        var renderContext = {
          canvasContext: context,
          viewport: viewport
        };
        var renderTask = page.render(renderContext);
        $('#content-display').append(canvas);
        renderTask.promise.then(function(){
          console.log("Page rendered");
        });
      });
    }
  }, function (reason){
    console.error(reason);
  })
</script>
