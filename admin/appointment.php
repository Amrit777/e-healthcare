<?php include('header.php');?>               
           
        <div id="page-wrapper">
            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Queries
                        </h1>
                    </div>
                </div>
            <div class="row">
                
                <div class="col-lg-12">
                    <table class="table table-hover table-condensed table-responsive" id='example'> 
                        <thead>
                        <th>Patient Name</th>
                        <th>Doctor Name</th>
                        <th>Query</th>   
                        <th>Reply</th>
                        <th>Delete</th>
						</thead>
                        <tbody>
                <?php
                $record1 = mysqli_query($con,"SELECT * FROM appointment");
                    while($row = mysqli_fetch_array($record1))
                    {
                        $precord = mysqli_query($con,"select patient_name from patient where patient_id=".$row['patient_id']);
                        $prow = mysqli_fetch_array($precord);
                        $drecord = mysqli_query($con,"select doctor_name from doctors where doctor_id=".$row['doctor_id']);
                        $drow = mysqli_fetch_array($drecord);
                ?>
                    <tr>
                        <td><?php echo $prow['patient_name'];?></td>
                        <td><?php echo $drow['doctor_name'];?></td>
                        <td><?php echo $row['query'];?></td>
                        <td><?php echo $row['answer'];?></td>
						<td><a href="delete.php?a_id=<?php echo $row['aid']; ?>"><span class="glyphicon glyphicon-remove" style="color:red"></a></span></td>
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
