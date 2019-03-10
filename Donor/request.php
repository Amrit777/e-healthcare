<?php include('includes/header.php'); ?>

        <div id="page-wrapper">
 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-primary">
                            Blood Request
                        </h1>
                    </div>
                </div>
            <div class="row">
                
                <div class="col-lg-12">
                    <table class="table table-hover table-condensed table-responsive" id='example'> 
                        <thead>
                        <th>Patient Name</th>
                        <th>Disease</th>
                        <th>Doctor Name</th>
						<th>When Required</th>
						<th>Blood Group</th>
						<th>Quantity</th>
						<th>Request City</th>
						<th>Contact Per Name</th>
						<th>Hospital Address</th>
						<th>Date</th>	
                        </thead>
                        <tbody>
                <?php
                $record = mysqli_query($con,"SELECT * FROM blood_req");
                    while($row = mysqli_fetch_array($record))
                    {
                ?>
                    <tr>
                        <td><?php echo $row['pat_name'];?></td>
                        <td><?php echo $row['typ_dis'];?></td>
                        <td><?php echo $row['doc_name'];?></td>
						<td><?php echo $row['whn_req'];?></td>
						<td><?php echo $row['blood_grp'];?></td>
						<td><?php echo $row['quan'];?></td>
						<td><?php echo $row['req_city'];?></td>
						<td><?php echo $row['cont_per_name'];?></td>
						<td><?php echo $row['hosp_add'];?></td>
						<td><?php echo $row['dt'];?></td>
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
