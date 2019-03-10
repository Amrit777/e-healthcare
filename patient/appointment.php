<?php
    include_once '../includes/config.php';
    
    session_start();
    
    if(isset($_SESSION['user']) && isset($_SESSION['patient']))
    {
        $record = mysqli_query($con,"SELECT * FROM patient WHERE patient_id='".$_SESSION['userid']."'");
        if(mysqli_num_rows($record)>0)
        {
            $row = mysqli_fetch_array($record);
        }
    }
    else if(isset($_SESSION['user']) && isset($_SESSION['doctor'])){
        header('location:../doctor/index.php');   
    }
    else
    {
        header('location:../index.php');
    }
    $user =    $_SESSION['userid'];
    $record = mysqli_query($con,"SELECT * FROM appointment WHERE patient_id='$user' and answer is not null order by reply_date desc LIMIT 3");

    include './includes/header.php';
    
?>
<script>
    $("a[href='appointment.php']").parent("li").addClass('active');
</script>
        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Appointment
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <form onsubmit="return checkDetails()" action="saveresult.php">
                <div class="row" style="margin-bottom: 15px;">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                       <select id="doctor" name="doctor" class="selectpicker form-control" data-live-search="true" title="Select Doctor ...">
                            <?php
                                $record = mysqli_query($con,"SELECT doctor_id,doctor_name,specialization FROM doctors");
                                while($row = mysqli_fetch_array($record))
                                {
                            ?>
                            <option value="<?php echo $row['doctor_id'];?>"><?php echo $row['doctor_name'].", ". $row['specialization'];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="row hidden-lg hidden-md visible-sm visible-xs" style="height: 15px;"></div>
                    <div class="col-lg-6 col-md-6">
                        <textarea class="form-control" id="query" name="query" rows="10" style="resize: none;"></textarea>
                    </div>
                </div>
                    <div class="row" style="margin-bottom: 25px;">
                    <div class="col-lg-12">
                        <input type="submit" value="Save" class="btn-block btn btn-primary"/>
                    </div>
                </div>
                </form>
                <?php
                    if(isset($_SESSION['add_appointment']))
                    {
                ?>
                        <div class="alert alert-danger fade in col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Success!</strong> Query Submitted
                        </div>
                <?php
                        unset($_SESSION['add_appointment']);
                    }
                ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php
                include './includes/footer.php';
?>