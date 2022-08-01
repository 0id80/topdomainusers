<!DOCTYPE html>
<head>
	<title>TOP 100+ забывашек</title>
	<link rel="icon" href="http://muiv.ru/bitrix/templates/muiv_v3/favicon.ico">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="static/css/style.css">


	<!-- Link bootstrap CSS & JS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</head>
</head>

<?php 
	
	require_once "includes/db.php";
	require_once "includes/func.php";
	require_once "includes/handlers.php";

?>

<body>
	<?php session_start(); ?>
	<div class="header text-center">
		<h1>
			Топ 100+ забывашек

			<?php if (isset($_SESSION['auth'])) { ?>
				<span style="color: yellow;font-size: 15pt;">
					<form method="POST" action="/" style="">
						(<?php echo $_SESSION["username"] ?>)
						<input class="btn-success" style="font-size: 14pt;" type="submit" name="logout" value="Выйти">
					</form>
				</span>
			<?php } ?>
		</h1>

		<?php 
			if (array_key_exists("logout", $_POST)) {
				unset($_SESSION["auth"]);
				header("Refresh:0");
			}
		?>
	</div>

	<div class="content container">
		<?php
			if (!isset($_SESSION['auth'])) {
				include"templates/login_form.php";
			} else {
				include_once "templates/content.php";
			}
		?>
	</div>

	<div id="footer" class="footer text-center">
		<p>
			Создано за 
			<span style="color: green; text-decoration: underline;">1</span> день 
			<span>
				<a target="_blank" style="color: rgb(255,25,25); text-decoration: underline;" href="https://portal.muiv.ru/company/personal/user/15434/">
					admem
				</a>
			</span> 
			и
			<span>
				<a target="_blank" style="color: rgb(255,25,25); text-decoration: underline;" href="https://portal.muiv.ru/company/personal/user/14436/">
					admvc
				</a>
			</span>
		</p>
	</div>

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', () => {

	    const getSort = ({ target }) => {
	        const order = (target.dataset.order = -(target.dataset.order || -1));
	        const index = [...target.parentNode.cells].indexOf(target);
	        const collator = new Intl.Collator(['en', 'ru'], { numeric: true });
	        const comparator = (index, order) => (a, b) => order * collator.compare(
	            a.children[index].innerHTML,
	            b.children[index].innerHTML
	        );
	        
	        for(const tBody of target.closest('table').tBodies)
	            tBody.append(...[...tBody.rows].sort(comparator(index, order)));

	        for(const cell of target.parentNode.cells)
	            cell.classList.toggle('sorted', cell === target);
	    };
	    
	    document.querySelectorAll('.table_sort thead').forEach(tableTH => tableTH.addEventListener('click', () => getSort(event)));
	    
	});
</script>
</body>

</html>