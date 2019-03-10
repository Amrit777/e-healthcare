<?php include('header.php');?>
               
          
        <div id="page-wrapper">
 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-primary">
                            Donor's Details
                        </h1>
                    </div>
                </div>
            <div class="row">
                
                <div class="col-lg-12">
                    <table class="table table-hover table-condensed table-responsive" id='example'> 
                        <thead>
                        <th>Donor Name</th>
                        <th>Patient Email</th>
                        <th>Donor Mobile</th>
						<th>City</th>
						<th>Age</th>
						<th>Blood Group</th>
						<th>Delete</th>	
                        </thead>
                        <tbody>
                <?php
                $record = mysqli_query($con,"SELECT * FROM donor_reg");
                    while($row = mysqli_fetch_array($record))
                    {
                ?>
                    <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['e_mail'];?></td>
                        <td><?php echo $row['mob_num'];?></td>
						<td><?php echo $row['city'];?></td>
						<td><?php echo $row['age'];?></td>
						<td><?php echo $row['b_gp'];?></td>
                    <td><a href="delete.php?dname=<?php echo $row['uname']; ?>"><span class="glyphicon glyphicon-remove" style="color:red"></a></span></td>
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
        $(document).ready(function()
		{
            $('#example').DataTable({"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]});
        } );
    </script>
</body>

</html>
