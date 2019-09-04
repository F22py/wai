function saveData(){

	var sex_value, e_conf_value;
	var form = document.getElementById("contact_form")

	if (document.getElementById('sex_male').checked) {
		sex_value = "male";
			} else if (document.getElementById('sex_female').checked){
				sex_value = "female";

			}

	if (document.getElementById('e_conf').checked){
		e_conf_value = "on";
	}else{
		e_conf_value = "of";
	}

	localStorage.setItem('firstname',document.getElementById('firstname').value );
	localStorage.setItem('lastname', document.getElementById('secondname').value);
	localStorage.setItem('sex', sex_value);
	localStorage.setItem('email', document.getElementById('email').value);
	localStorage.setItem('e_confirmation', e_conf_value);
	localStorage.setItem('language', document.getElementById('language').value);

	form.submit()


}


function resetData(){
	localStorage.removeItem('firstname');
	localStorage.removeItem('lastname');
	localStorage.removeItem('sex');
	localStorage.removeItem('email');
	localStorage.removeItem('e_confirmation');
	localStorage.removeItem('language');


}


if (localStorage["firstname"] != undefined){
	document.getElementById('firstname').value = localStorage["firstname"];
}
if (localStorage["lastname"] != undefined){
	document.getElementById('secondname').value = localStorage["lastname"];
}

if (localStorage["sex"] != undefined){
	if (localStorage["sex"]== "male"){
		document.getElementById('sex_male').checked = "checked";
	}else {
		document.getElementById('sex_female').checked = "checked";
	}
}

if (localStorage["email"] != undefined){
	document.getElementById('email').value = localStorage["email"];
	document.getElementById('email_sub').value = localStorage["email"];

}
if (localStorage["e_confirmation"] == "on"){
	document.getElementById('e_conf').checked = "checked";
}
if (localStorage["language"] != undefined){
	document.getElementById('language').value = localStorage["language"];
}
