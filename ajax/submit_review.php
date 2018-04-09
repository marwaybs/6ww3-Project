<?php
include "../dbReq/newReview.php";

//validation for rating. if no rating, then give error
if (!isset($_POST["rating"]) || ($_POST["rating"] === "")) {
	echo json_encode(array("status" => false, "message" => "No rating provided"));
	return;
}

//validation for review. if no review, then give error
if (!isset($_POST["review"]) || ($_POST["review"] === "")) {
	echo json_encode(array("status" => false, "message" => "No review provided"));
	return;
}

//checking to see if rating is a number
if (!is_numeric($_POST["rating"])) {
	echo json_encode(array("status" => false, "message" => "Rating is not a number"));
	return;
}

//sending values to php to post them to the database
echo json_encode(array("status" => true, "rating" => htmlspecialchars($_POST["rating"]), "review" => htmlspecialchars($_POST["review"])));
newReview($_POST["id"], $_POST["rating"], $_POST["review"]);
?>
