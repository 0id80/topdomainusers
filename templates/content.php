<?php if (check_admin($conn, $_SESSION["username"])): ?>
	<div class="row">
		<div class="col-md text-center">
			<p>
				<a class="btn btn-success" data-toggle="collapse" href="#add_new_user" role="button" aria-expanded="false" aria-controls="add_new_user">
					Добавить нового
				</a>
				<a class="btn btn-primary" type="button" data-toggle="collapse" data-target="#edit_user" aria-expanded="false" aria-controls="edit_user">
					Изменить имеющегося
				</a>
				<?php 
					if (check_admin($conn, $_SESSION["username"]) >= 2) { 
						include "edit_admins.php";
					} 
				?>
				<a class="btn btn-warning" href="/">
					Обновить
				</a>
			</p>
		</div>
	</div>

	<div class="row">
		<div class="col crud-form text-center">
			<div class="collapse multi-collapse" id="add_new_user">
				<form method="POST" action="">
					<input class="text-center" type="text" name="login" placeholder="login">
					<input class="text-center" type="text" name="bio" placeholder="ФИО">
					<input type="submit" name="add_user" value="Добавить">
				</form>
			</div>
		</div>
		<div class="col crud-form text-center">
			<div class="collapse multi-collapse" id="edit_user">
				<form method="POST" action="">
					<select name="login" class="form-select form-select-lg mb-3 text-center" aria-label=".form-select-lg example" style="">
						<?php 
							$sql = "SELECT * FROM outsiders ORDER BY rating DESC";
							$result = mysqli_query($conn, $sql); 

							while ($row = mysqli_fetch_assoc($result)):
						?>
							<option>  <?php echo $row["login"] ?> </option>

						<?php endwhile; ?>
					</select>
					<input type="submit" name="add_rating" value="+1">
					<input type="submit" name="remove_rating" value="-1">
					<input type="submit" class="delete_user" name="delete_user" value="Удалить аутсайдера">
					<script type="text/javascript">
						$(document).ready(function() {
						    $(".delete_user").click(function(event) {
						        if( !confirm('Вы точно хотите удалить пользователя?') ) 
						            event.preventDefault();
						    });
						});
					</script>
				</form>
			</div>
		</div>
		<?php if (check_admin($conn, $_SESSION["username"]) >= 2) { ?>
		<?php } ?>
	</div>
<?php endif ?>

<hr>
<div class="row">
	<div class="col">
		<table class="table table_sort table-content">
			<thead>
				<tr>
					<th>№</th>
					<th>Рейтинг</th>
					<th>Фамилия Имя Отчество</th>
					<th>Login</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sql = "SELECT * FROM outsiders ORDER BY rating DESC";
					$result = mysqli_query($conn, $sql);

					$number = 1;
					while ($row = mysqli_fetch_assoc($result)):
				?>
						<tr class="tr-row-user">
							<td> <?php echo "#$number" ?> </td>
							<td class="td-row-user-rating"> <?php echo $row["rating"] ?> </td>
							<td> <?php echo $row["bio"] ?> </td>
							<td> <?php echo $row["login"] ?> </td>
						</tr>
				<?php
					$number += 1;
					endwhile; 
				?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function() {
  $('#myInput').focus()
})
</script>