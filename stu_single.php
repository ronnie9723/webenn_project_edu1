      <?php require_once "templates/header.php"; ?>

        

        <?php  


            if( isset($_GET['stu_id']) ){
              $student_id = $_GET['stu_id'];


              $sql = "SELECT * FROM students_info WHERE student_id='$student_id'";
              $data = $conn -> query($sql);

             $single_stu_data =  $data -> fetch_assoc();

            }



        ?>



          <div class="row" style="min-height:500px;">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Single Student</p>

                  <img style="width: 150px; height: 150px" class="img-thumbnail" src="stu_photos/<?php echo $single_stu_data['photo']; ?>" alt="">
                  <br>
                  <br>
                  <table class="table table-striped">
                    <tr>
                      <td>Student ID</td>
                      <td><?php echo $single_stu_data['id']; ?></td>
                    </tr>
                    <tr>
                      <td>Student Name</td>
                      <td><?php echo $single_stu_data['s_name']; ?></td>
                    </tr>

                    <tr>
                      <td>Batch</td>
                      <td><?php echo $single_stu_data['batch_no']; ?></td>
                    </tr>

                    <tr>
                      <td>Cell</td>
                      <td><?php echo $single_stu_data['cell']; ?></td>
                    </tr>

                    <tr>
                      <td>Address</td>
                      <td><?php echo $single_stu_data['address']; ?></td>
                    </tr>

                  </table>
              
                  <a href="all_students.php" class="btn btn-info">Back</a>
                




                </div>
              </div>
            </div>
          </div>


        <?php require_once "templates/footer.php"; ?>


