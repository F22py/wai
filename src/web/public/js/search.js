function Search() {
var form = document.getElementById("search_form");
var query = document.getElementById("search_field").value;
sessionStorage.setItem('search_query', query);
form.submit()
}



if (sessionStorage["search_query"] != undefined){
	document.getElementById("search_field").value = sessionStorage["search_query"];
}


if (localStorage["email"] != undefined){
	document.getElementById('email_sub').value = localStorage["email"];

}