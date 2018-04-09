function insertReviewResponse() {
	if (this.status == 200) {
		response = JSON.parse(this.responseText);
		if (response.status == false) {
			document.getElementById("errorplaceholder").innerHTML = "<b>Error:</b> " + response.message;
		} else {
			document.getElementById("reviewform").innerHTML = "<p>Rating: " + response.rating + "</p><p>Review: " + response.review + "</p>";
		}
	}
}

function submitReviewForm() {
	request = new XMLHttpRequest();
	request.open("POST", "submit_review.php");
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.onload = insertReviewResponse;
	request.send("rating=" + encodeURIComponent(document.getElementById("rating").value) + "&review=" + encodeURIComponent(document.getElementById("review").value));

}
