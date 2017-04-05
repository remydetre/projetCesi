<?php
function saveAsJson($data) {
file_put_contents("data.json", json_encode($data));
}

function readJson($filename) {
$content = [];

if (file_exists($filename)) {
$content = file_get_contents($filename);
$content = json_decode($content);
}

return $content;
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