<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
	admins
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Admins</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md crud-form text-center">
					<form method="POST" action="">
						<input class="text-center" type="text" name="login" placeholder="login">
						<input type="submit" name="add_admin" value="Добавить">
						<input type="submit" name="remove_admin" value="Удалить">
					</form>
					<div>
						<table class="table table_sort">
							<thead>
								<tr>
									<th class="text-center">login</th>
									<th class="text-center">permission_level</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$sql = "SELECT * FROM admins ORDER BY permission_level DESC";
									$result = mysqli_query($conn, $sql);

									while ($row = mysqli_fetch_assoc($result)): 
								?>
										<tr>
											<td> <?php echo $row["login"] ?> </td>
											<td> <?php echo $row["permission_level"] ?> </td>
										</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>