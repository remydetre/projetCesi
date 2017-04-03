<?php
	

	function saveAsJson($data) {
		file_put_contents("data.json", json_encode($data));
	}

	function readJson($filename) {
		$content = "{}";
		if (file_exists($filename)) {
			$content = file_get_contents($filename);
		}

		return json_decode($content);
	}

	function getFormData() {
		$tmpArr = ["question" => $_POST["question"] ];
		return $tmpArr;
	}

	$action = isset($_GET['action']) ? $_GET['action'] : '';
	$dataJson = readJson("data.json");

	if ($action == 'form' && isset($_POST['from'])) {
		$dataForm = getFormData();
		$dataJson[] = $dataForm;
		saveAsJson($dataJson);
		header("Location:index.php");
	}

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
<a href="?action=form">Ajouter une question</a><br />
<table>
	<thead>
		<tr>
			<th>Question</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
EOT;

			foreach ($dataJson as $row) {
				echo "<tr><td>" . $row->question . "</td><td></td></tr>";
			}
			break;
		}
	?>
</body>
</html>
