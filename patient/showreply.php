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
extract($_GET);
$record='';
if(isset($aid))
{
    $record = mysqli_query($con,"SELECT * FROM appointment WHERE aid=$aid");
    extract(mysqli_fetch_array($record));
}
$user =    $_SESSION['userid'];
    $record = mysqli_query("SELECT * FROM appointment WHERE patient_id='$user' and answer is not null order by reply_date desc LIMIT 3");    
    include './includes/header.php';
?>


        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Reply
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1" style="background: #66afe9;">
                        <div class="row" style="padding:15px;">
                            <div class="col-lg-2"><span>Doctor Name</span></div>
                            <div class="col-lg-10"><input type="text" class="disabled form-control" disabled="" value="<?php echo $doctor_id;?>"/></div>
                        </div>
                        <div class="row" style="padding:15px;">
                            <div class="col-lg-2"><span>Query Date</span></div>
                            <div class="col-lg-10"><input type="text" class="disabled form-control" disabled="" value="<?php echo $query_date;?>"/></div>
                        </div>
                        <div class="row" style="padding:15px;">
                            <div class="col-lg-2"><span>Query</span></div>
                            <div class="col-lg-10"><textarea disabled="" style="resize: vertical;max-height: 100px;min-height: 50px;" class="form-control"><?php echo $query;?></textarea></div>
                        </div>
                        <div class="row" style="padding:15px;">
                            <div class="col-lg-2"><span>Reply</span></div>
                            <div class="col-lg-10"><textarea  disabled="" style="resize: vertical;max-height: 100px;min-height: 50px;" class="form-control"><?php echo $answer;?></textarea></div>
                        </div>
                    </div>
                </div>
            </div>
             <!--/.container-fluid--> 

        </div>
         <!--/#page-wrapper--> 

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    
    
    
    
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
