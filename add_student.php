      <?php require_once "templates/header.php"; ?>


          <div class="row" style="min-height:500px;">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Detailed Reports</p>

                    <?php  


                        if( isset($_POST['submit']) ){

                          // get form data 
                            $sname = $_POST['sname'];
                            $sid = $_POST['sid'];
                            $batch = $_POST['batch'];
                            $cell = $_POST['cell'];
                            $address = $_POST['address'];


                            // File management 
                            $sphoto = $_FILES['sphoto']['name'];
                            $sphotot = $_FILES['sphoto']['tmp_name'];
                            $pic_ext_array =  explode('.', $sphoto);
                            $ext = end($pic_ext_array);
                            $u_pic_name = md5(time().rand(). $sphoto ).'.'. strtolower(  $ext );



                            if( empty($sname) || empty($sid) || empty($batch) || empty($cell) || empty($address) || empty( $sphoto)  ){
                                $mess = "<p class='alert alert-danger'>Field must not be empty !<button class='close' data-dismiss='alert'>&times;</button></p>";
                            }else{


                                $sql = "INSERT INTO students_info (s_name, id, batch_no, cell, address, photo, status) VALUES ('$sname','$sid','$batch','$cell','$address','$u_pic_name','active')";
                                $conn -> query($sql);
                                move_uploaded_file( $sphotot ,  'stu_photos/'. $u_pic_name  );

                                $mess = "<p class='alert alert-success'> Student added successfully !<button class='close' data-dismiss='alert'>&times;</button></p>";

                            }


                        }


                    ?>

                    <div class="mess">
                        <?php  

                          if( isset($mess) ){
                            echo $mess;
                          }

                        ?>
                    </div>

                    <div class="card w-75">
                      <div class="card-body">
                        <h2>Add new stuent</h2>
                        <hr>

                        <form action="<?php  echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                          
                          <div class="form-group">
                            <label for="">Student Name</label>
                            <input name="sname" class="form-control" type="text">
                          </div>

                          <div class="form-group">
                            <label for="">Student ID</label>
                            <input name="sid" class="form-control" type="text">
                          </div>

                          <div class="form-group">
                            <label for="">Batch No</label>
                            <input name="batch" class="form-control" type="text">
                          </div>

                          <div class="form-group">
                            <label for="">Student Cell</label>
                            <input name="cell" class="form-control" type="text">
                          </div>

                          <div class="form-group">
                            <label for="">Address</label>
                            <input name="address" class="form-control" type="text">
                          </div>


                          <div class="form-group">
                            <label for="">Student Photo</label>
                            <input name="sphoto" class="" type="file">
                          </div>

                          <div class="form-group">
                        
                            <input name="submit" class="btn btn-success" type="submit" value="Add student">
                          </div>

                        </form>

                      </div>
                    </div>
                




                </div>
              </div>
            </div>
          </div>


        <?php require_once "templates/footer.php"; ?>


