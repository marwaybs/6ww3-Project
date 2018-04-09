<?php
include "../dbReq/newReview.php";


if (!isset($_POST["rating"]) || ($_POST["rating"] === "")) {
	echo json_encode(array("status" => false, "message" => "No rating provided"));
	return;
}
if (!isset($_POST["review"]) || ($_POST["review"] === "")) {
	echo json_encode(array("status" => false, "message" => "No review provided"));
	return;
}
if (!is_numeric($_POST["rating"])) {
	echo json_encode(array("status" => false, "message" => "Rating is not a number"));
	return;
}
echo json_encode(array("status" => true, "rating" => htmlspecialchars($_POST["rating"]), "review" => htmlspecialchars($_POST["review"])));
newReview(1, $_POST["rating"], $_POST["review"]);
?>
