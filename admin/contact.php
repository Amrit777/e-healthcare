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
                        <th> Name</th>
                        <th> Email</th>
                        <th> Mobile</th>
						<th>Query</th>
						<th>Date</th>
						<th>Delete</th>
						</thead>
                        <tbody>
                <?php
                $record = mysqli_query($con,"SELECT * FROM contact");
                    while($row = mysqli_fetch_array($record))
                    {
                ?>
                    <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['mobile'];?></td>
						<td><?php echo $row['message'];?></td>
						<td><?php echo $row['createdate'];?></td>
	<td><a href="delete.php?c_id=<?php echo $row['c_id']; ?>"><span class="glyphicon glyphicon-remove" style="color:red"></a></span></td>
						
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
