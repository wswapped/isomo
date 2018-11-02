<?php
  include_once 'setup.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $title = "Papers";
  include_once 'modules/head.php';
  $languages = array('kin'=>'Ikinyarwanda', 'en'=>'English', 'fr'=>'France');
  ?>

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
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
                        <h3 class="animated fadeInLeft">Papers</h3>
                        <p class="animated fadeInDown">
                          Here are details on papers
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

                      //check if there is set category or if we can load all categories
                      if(!empty($papers_conf[$paper_type])){
                        $paper_cat = $papers_conf[$paper_type];
                        $cat_papers = category_papers($paper_cat);
                        $paper_cat_name = ucfirst(str_ireplace("_", " ", $paper_cat));
                      }else{
                        //list all papers
                        $paper_cat_name = 'All Papers';
                        //get cats
                        $cats = get_paper_types();
                        $cat_papers = array();

                        foreach ($cats as $key => $cat) {
                          $cat_papers = array_merge($cat_papers, category_papers($cat['name']));
                        }
                      }

                      

                    ?>
                    <div class="panel-heading"><h3><?php echo $paper_cat_name; ?></h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Subject</th>
                          <th>Subscribers</th>
                          <th>View more</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          for($n=0; $n<count($cat_papers); $n++){
                            $paper = $cat_papers[$n];
                            ?>
                              <tr>
                                <td><?php echo $paper['name']; ?></td>
                                <td><?php echo $paper['subjectname']; ?></td>
                                <td>0</td>
                                <td><span><i class="fa-home fa fa-2x"></i></span></td>
                              </tr>
                            <?php
                          }
                        ?>
                        
                      </tbody>
                        </table>
                      </div>
                  </div>
                  <a class="btn btn-primary btn-a" href="add_paper?type=<?php echo $paper_type; ?>"><span class="fa fa-2x fa-plus"></span></a>
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
      <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">
                    <li class="active ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-home fa"></span>Dashboard 
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                          <li><a href="dashboard-v1.html">Dashboard v.1</a></li>
                          <li><a href="dashboard-v2.html">Dashboard v.2</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-diamond fa"></span>Layout
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="topnav.html">Top Navigation</a></li>
                        <li><a href="boxed.html">Boxed</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-area-chart fa"></span>Charts
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="chartjs.html">ChartJs</a></li>
                        <li><a href="morris.html">Morris</a></li>
                        <li><a href="flot.html">Flot</a></li>
                        <li><a href="sparkline.html">SparkLine</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-pencil-square"></span>Ui Elements
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="color.html">Color</a></li>
                        <li><a href="weather.html">Weather</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="media.html">Media</a></li>
                        <li><a href="panels.html">Panels & Tabs</a></li>
                        <li><a href="notifications.html">Notifications & Tooltip</a></li>
                        <li><a href="badges.html">Badges & Label</a></li>
                        <li><a href="progress.html">Progress</a></li>
                        <li><a href="sliders.html">Sliders</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="modal.html">Modals</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                       <span class="fa fa-check-square-o"></span>Forms
                       <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="formelement.html">Form Element</a></li>
                        <li><a href="#">Wizard</a></li>
                        <li><a href="#">File Upload</a></li>
                        <li><a href="#">Text Editor</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-table"></span>Tables
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="datatables.html">Data Tables</a></li>
                        <li><a href="handsontable.html">handsontable</a></li>
                        <li><a href="tablestatic.html">Static</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a href="calendar.html">
                         <span class="fa fa-calendar-o"></span>Calendar
                      </a>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-envelope-o"></span>Mail
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="mail-box.html">Inbox</a></li>
                        <li><a href="compose-mail.html">Compose Mail</a></li>
                        <li><a href="view-mail.html">View Mail</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-file-code-o"></span>Pages
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="forgotpass.html">Forgot Password</a></li>
                        <li><a href="login.html">SignIn</a></li>
                        <li><a href="reg.html">SignUp</a></li>
                        <li><a href="article-v1.html">Article v1</a></li>
                        <li><a href="search-v1.html">Search Result v1</a></li>
                        <li><a href="productgrid.html">Product Grid</a></li>
                        <li><a href="profile-v1.html">Profile v1</a></li>
                        <li><a href="invoice-v1.html">Invoice v1</a></li>
                      </ul>
                    </li>
                     <li class="ripple"><a class="tree-toggle nav-header"><span class="fa "></span> MultiLevel  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="view-mail.html">Level 1</a></li>
                        <li><a href="view-mail.html">Level 1</a></li>
                        <li class="ripple">
                          <a class="sub-tree-toggle nav-header">
                            <span class="fa fa-envelope-o"></span> Level 1
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                          </a>
                          <ul class="nav nav-list sub-tree">
                            <li><a href="mail-box.html">Level 2</a></li>
                            <li><a href="compose-mail.html">Level 2</a></li>
                            <li><a href="view-mail.html">Level 2</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li><a href="credits.html">Credits</a></li>
                  </ul>
            </div>
        </div>       
      </div>
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


<!-- custom -->
<script type="text/javascript" src="asset/js/js.js"></script>
<script src="asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });  
</script>
<!-- end: Javascript -->
</body>
</html>