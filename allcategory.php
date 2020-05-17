<table   class="table table-striped table-responsive">
			<tr>
				<th>Post id</th>
				<th>Title</th>
				<th>Content</th>
				<th>Category</th>
				
			</tr>
			<?php
			require('config.php');
			$db = new db;
			$result=$db->getRecords();
			while($row=mysqli_fetch_array($result)){
				echo "<tr>
					<td>".$row['id']."</td>
					<td>".$row['']."</td>
					<td>".$row['']."</td>
					<td>".$row['']."</td>
					<td>".$row['']."</td>
				</tr>";
			}
			$db->closeCon();
			?>
</table>