<?php
include 'traitement.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Serializer</title>
</head>
<body>
	<?php
		switch ($action) {
			case 'form':
	?>
		<form action="index.php?action=form" method="post">
			<input type="hidden" name="from" value="1" />
			Question : <textarea name="question"></textarea>
			<br /><input type="submit" value="Valider" />
		</form>
	<?php
		break;
		case '':
		default:
			echo
<<<EOT
<a href="index.php?action=form">Ajouter une question</a><br />
<table>
	<thead>
		<tr>
			<th>Question</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
EOT;

			$val = 0;
			foreach ($dataJson as $row) {

				echo "<tr><td>" . $row->question . "</td><td><a href='supprimer.php?tab=$val'>Supprimer</a></td></tr>";
				$val++;
			}
			break;
		}
	?>
</body>
</html>
