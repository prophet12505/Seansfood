/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function toggleLinks() {
	var links = document.getElementById("navLinks");
		if (links.style.display === "block") {
			links.style.display = "none";
		} else {
			links.style.display = "block";
		}
}

/* Show Signup modal and close hamburger nav when clicked */
function showModal() {
	var winwidth = window.innerWidth;
	if (winwidth < 1025) {
		toggleLinks();
	}
	document.getElementById("regModal").style.display = "block";
}

document.getElementById("reg").onclick = showModal;