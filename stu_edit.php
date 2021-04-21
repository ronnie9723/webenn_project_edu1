      <?php require_once "templates/header.php"; ?>
          

          <style>
            
            table.update-stu input {
              border: 1px solid #333;
              padding: 10px;
            }
          </style>
          



          <?php  


          


              if( isset($_GET['stu_id']) ){
                $student_id = $_GET['stu_id'];

                if( isset($_POST['update']) ){
                  // Get form data 
                    $sid = $_POST['sid'];
                    $sname = $_POST['sname'];
                    $batch = $_POST['batch'];
                    $cell = $_POST['cell'];
                    $address = $_POST['address'];

                // Photo update system 
                    $old_photo = $_POST['old_photo'];



                    

                    if( !empty($_FILES['new_photo']['name']) ){

                      $new_photo = $_FILES['new_photo']['name'];
                      $new_photot = $_FILES['new_photo']['tmp_name'];
                      
                      $pic_ext_array =  explode('.', $new_photo);
                      $ext = end($pic_ext_array);
                      $update_image_name = md5(time().rand().$new_photo).'.'. strtolower(  $ext );

                      move_uploaded_file( $new_photot , 'stu_photos/'. $update_image_name );

                      unlink( 'stu_photos/' . $old_photo  );
                      

                    }else{
                      
                      $update_image_name = $old_photo;

                    } 


                    $sql = "UPDATE students_info SET id='$sid', s_name='$sname', batch_no='$batch', cell='$cell', address='$address', photo='$update_image_name' WHERE student_id='$student_id'";
                    $conn -> query($sql);
                }




                $sql = "SELECT * FROM students_info WHERE student_id='$student_id'";
                $data = $conn -> query($sql);

                $edit_single_data =  $data -> fetch_assoc();

              }

          ?>
          




          <div class="row" style="min-height:500px;">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Single Student</p>

       
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>?stu_id=<?php echo $student_id; ?>" method="POST" enctype="multipart/form-data">
                    <table class="table table-striped update-stu">
                      <tr>
                        <td>Student ID</td>
                        <td><input  name="sid"  type="text" value="<?php echo $edit_single_data['id']; ?>"></td>
                      </tr>
                      <tr>
                        <td>Student Name</td>
                        <td><input  name="sname" type="text" value="<?php echo $edit_single_data['s_name']; ?>" ></td>
                      </tr>

                      <tr>
                        <td>Batch</td>
                        <td><input  name="batch" type="text" value="<?php echo $edit_single_data['batch_no']; ?>"></td>
                      </tr>

                      <tr>
                        <td>Cell</td>
                        <td><input  name="cell" type="text" value="<?php echo $edit_single_data['cell']; ?>" ></td>
                      </tr>

                      <tr>
                        <td>Address</td>
                        <td><input  name="address" type="text" value="<?php echo $edit_single_data['address']; ?>" ></td>
                      </tr>

                      <tr>
                        <td>Profile Photo</td>
                        <td><img style="width: 150px; height: 150px" class="img-thumbnail shadow" src="stu_photos/<?php echo $edit_single_data['photo']; ?>" alt=""></td>
                        <input type="hidden" name="old_photo" value="<?php echo $edit_single_data['photo']; ?>">
                      </tr>

                      <tr>
                        <td>Upload Photo</td>
                        <td><input  name="new_photo" type="file"></td>
                      </tr>

                      <tr>
                        <td></td>
                        <td><input name="update" type="submit" value="Update" class="btn btn-warning"></td>
                      </tr>

                    </table>
                  </form>
              

                




                </div>
              </div>
            </div>
          </div>


        <?php require_once "templates/footer.php"; ?>


