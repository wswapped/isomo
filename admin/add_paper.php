<?php
  include_once 'setup.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $title = "Add paper";
    include_once 'modules/head.php';
    $languages = array('kin'=>'Ikinyarwanda', 'en'=>'English', 'fr'=>'France');
  ?>

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/select2.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/summernote.css"/>
  <!-- end: Css -->
</head>

<body id="mimin" class="dashboard">
      <!-- start: Header -->
        <?php include "modules/menu.php" ?>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <?php
                include 'sidebar.php';
              ?>
            </div>
          <!-- end: Left Menu -->


            <!-- start: Content -->
            <div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Add Paper</h3>
                        <p class="animated fadeInDown">
                          Provide information for new paper
                        </p>
                    </div>
                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <?php
                      $paper_type = $_GET['type']??"";
                      
                      $papers_conf = array('ne'=>'national_exams', 'dte'=>'driving_exam', 'tr'=>'traffic_rules');

                      $cat_papers = category_papers($papers_conf[$paper_type]);
                      $paper_cat = $papers_conf[$paper_type];
                      $paper_cat_name = ucfirst(str_ireplace("_", " ", $paper_cat));

                    ?>
                    <div class="panel-heading"><h3><?php echo $paper_cat_name; ?></h3></div>
                    <div class="panel-body">
                      <form class="cmxform" id="signupForm" method="POST" action="<?php echo $_SERVER['REQUEST_URI'] ?>" novalidate="novalidate">
                          <div class="col-md-6">

                            <?php


                            //checking form submission
                            if(!empty($_POST['subt'])){
                              var_dump($_POST);
                            }

                              //subject types and subject
                              $query = $db->query("SELECT *, s.name as subjectname FROM subjects as s JOIN subject_levels as l ON s.id  = l.subject ") or die("Error $db->error");
                              $subj = array();
                              while ($data = $query->fetch_assoc()) {
                                $subj[$data['level']][] = $data;                                
                              }
                            ?>


                            <div class="form-group">
                              <select class="select2-A" name="subject">
                                <?php
                                  foreach ($subj as $key => $subjects ) {
                                    ?>
                                      <optgroup label="<?php echo $key; ?>">
                                        <?php
                                          foreach ($subjects as $key => $subj_det) {
                                            echo "<option value='$subj_det[id]'>$subj_det[subjectname]</option>";
                                          }
                                        ?>
                                      </optgroup>
                                    <?php
                                  }
                                ?>
                              </select>
                              <input type="hidden" name="subt" value="<?php echo md5(time()) ?>">
                            </div>
                            <div class="form-group form-cond" data-for="national_exams" data-role='year'>
                              <label for="fileup">Paper year</label>
                              <input type="number" min="1900" max="<?php echo date('Y'); ?>" name="year" class="form-control" id="fileup" placeholder="year" required="required">
                            </div>
                            <div class="form-group">
	                          	<textarea name="paper" id="paperContEdit" placeholder="Type Your Message.." required="required"></textarea>  
	                          </div>
                          </div>
                          
                               
                          <div class="col-md-12">
                            <div class="form-group form-animate-checkbox">
                                <input type="checkbox" class="checkbox valid" id="validate_agree" name="validate_agree" aria-required="true" aria-describedby="validate_agree-error">
                                <label>Please agree to our policy</label>
                            	<em id="validate_agree-error" class="error"></em>
                          	</div>
                            <input class="submit btn btn-danger" type="submit" value="Submit">
                          </div>
                      </form>

                    </div>
                </div>
              </div>  
              </div>
            </div>
          <!-- end: content -->

          <!-- Modal -->
          <div class="modal fade" id="createPaper" tabindex="-1" role="dialog" aria-labelledby="createPaper" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add paper</h5>
                </div>
                <div class="modal-body">
                  <form action="admin.php" method="POST" enctype="multipart/form-data" id="addPaper">
                    <?php
                      if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['subt']) ){
                        //Getting values
                        $level = $_POST['level'];
                        $subject = $_POST['subject'];
                        $file = $_FILES['file'];
                        $year = $_POST['year'];
                        if(!empty($level) && !empty($subject) && !empty($year) && !empty($file['size']) ){
                          //Inserting
                          //Checking if document is PDF
                          $ext = pathinfo($file['name'])['extension'];
                          if(strtolower($ext) == "pdf"){
                            $filename = time()."$subject.$ext";
                            if(move_uploaded_file($file['tmp_name'], "papers/$filename")){
                              //Recording paper in database
                              $db->query("INSERT INTO papers(subject, file, year) VALUES (\"$subject\", \"$filename\", \"$year\")");
                              die("<p class='text-success'>Paper uploaded successfully</p>");
                            }else{
                              echo "<p class='text-danger'>Error uploading the document to server, please try again</p>";
                            };
                          }else{
                            echo "<p class='text-danger'>Upload PDF only</p>";
                          }
                          


                          // $db->query("INSERT INTO papers()")
                        }else{
                            echo "<p class='text-danger'>Please fill in all the fields</p>";
                        }
                      }
                    ?>
                    <div class="form-group">
                        <label for="typesel">Select the paper type</label>
                        <select name="level" class="form-control" id="typesel">
                          <?php
                            $types = get_paper_types();
                            for($n=0; $n<count($types); $n++){
                              ?>
                                <option value="<?php echo $types[$n]['name']; ?>"><?php echo $types[$n]['pname']; ?></option>
                              <?php
                            }
                          ?>
                        </select>
                    </div>
                    <div class="form-group form-cond" data-for='national_exams,driving_exam' data-role='level'>
                        <label for="levelsel">Select the level</label>
                        <select name="level" class="form-control" id="levelsel">
                          <?php
                            $levels = get_levels();
                            for($n=0; $n<count($levels); $n++){
                              ?>
                                <option value="<?php echo $levels[$n]['name']; ?>"><?php echo $levels[$n]['name']; ?></option>
                              <?php
                            }
                          ?>
                        </select>
                    </div>
                    <div class="form-group form-cond" data-for='national_exams,traffic_rules' data-role='subject'>
                        <label for="subsel">Select the subject</label>
                        <?php
                          $subjects = get_subjects();
                        ?>
                        <select name = 'subject' class="form-control" id="subsel">
                          <?php
                            
                            for($n=0; $n<count($subjects); $n++){
                              ?>
                                <option value="<?php echo $subjects[$n]['id']; ?>"><?php echo $subjects[$n]['name']; ?></option>
                              <?php
                            }
                          ?>
                        </select>
                    </div>
                    <div class="form-group form-cond display-none" data-for='driving_exam,traffic_rules' data-role='subject'>
                        <label for="subsel">Language</label>
                        <select name = 'subject' class="form-control" id="subsel">
                          <?php
                            foreach ($languages as $langid => $langname) {
                              ?>
                                <option value="<?php echo $langid; ?>"><?php echo $langname; ?></option>
                              <?php
                            }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fileup">File</label>
                        <input type="file" name="file" class="form-control" id="fileup" placeholder="placeholder">
                    </div>
                    <div class="form-group form-cond" data-for="national_exams" data-role='year'>
                        <label for="fileup">Paper year</label>
                        <input type="number" min="1900" max="<?php echo date('Y'); ?>" name="year" class="form-control" id="fileup" placeholder="year">
                    </div>
                    <!-- <div class="form-group form-cond" data-for="national_exams" data-role='year'>
                        <label for="fileup">Paper period</label>
                        <input type="number" min="1900" max="<?php echo date('Y'); ?>" name="year" class="form-control" id="fileup" placeholder="year">
                    </div> -->
                    <input type="hidden" name="subt" value="jjsjsnjsdnjsndjsndsjdnsjdnsjdnsj">
                    
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Upload</button>
                </div>
              </div>
            </div>
          </div>

          
      </div>

      <!-- start: Mobile -->
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>

       <!-- end: Mobile -->

<!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>



<!-- plugins -->
<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>
<script src="asset/js/plugins/select2.full.min.js"></script>
<script src="asset/js/plugins/summernote.min.js"></script>

<script src="asset/js/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/"></script>

<!-- custom -->
<script type="text/javascript" src="asset/js/js.js"></script>
<script src="asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });

  $(".select2-A").select2({
    placeholder: "Select a subject",
    allowClear: true
  });

  // tinymce.init({
  //   selector: '#paperContEdit',
  //   menubar: false,  // removes the menubar
  //   image_advtab: true,
  // });

  $('#paperContEdit').summernote({
    height: 400
  });

</script>
<!-- end: Javascript -->
</body>
</html>