//inserting the review back into t he page if it was successfully added ot the database
function insertReviewResponse() {
	//if return status was okay, insert the text, if not then insert an error instead.
	if (this.status == 200) {
		response = JSON.parse(this.responseText);
		if (response.status == false) {
			document.getElementById("errorplaceholder").innerHTML = "<b>Error:</b> " + response.message;
		} else {
			document.getElementById("reviewform").innerHTML = "<p>Rating: " + response.rating + "</p><p>Review: " + response.review + "</p>";
		}
	}
}
//sending ajax request with the id, rating and review
function submitReviewForm(id) {
	request = new XMLHttpRequest();
	request.open("POST", "ajax/submit_review.php");
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.onload = insertReviewResponse;
	request.send("rating=" + encodeURIComponent(document.getElementById("rating").value) +
	"&review=" + encodeURIComponent(document.getElementById("review").value)
	+ "&id=" + id);

}
