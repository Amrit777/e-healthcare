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
    $("a[href='history.php']").parent("li").addClass('active');
</script>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            History
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <table class="table table-hover table-bordered" id="example" style="cursor: pointer">
                        <thead>
                        <tr>
                            <th>
                                Query Date
                            </th>
                            <th>
                                Doctor name
                            </th>
                            <th>
                                Query
                            </th>
                            <th>
                                Reply
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $history = mysqli_query($con,"SELECT * FROM appointment WHERE patient_id=".$_SESSION['userid']);
                            while($hrow = mysqli_fetch_array($history) )
                            {
                        ?>
                        <tr>
                            <td>
                                <?php echo $hrow['query_date'];?>
                            </td>
                            <td>
                                <?php 
                                    $docrec = mysqli_query($con,"SELECT doctor_name FROM doctors WHERE doctor_id=".$hrow['doctor_id']);
                                    $drow = mysqli_fetch_array($docrec);
                                    echo $drow['doctor_name'];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $hrow['query'];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $hrow['answer'];
                                ?>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    
    <script src="../js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]});
        } );
    </script>
</body>

</html>
