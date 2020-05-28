
//COURSE MODAL
// Get the modal
var modal = document.getElementById('coModal');
// Get the button that opens the modal
var btn = document.getElementById("coBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
	document.getElementById("error").innerHTML = "";
    modal.style.display = "none";
}

//click enter for the ok button on the add course modal
var input = document.getElementById("course_name");
input.addEventListener( "keyup", function(event) {
	event.preventDefault();
	if( event.keyCode === 13 ){
		document.getElementById( "co-ok" ).click();
	}
});

//add new course
var add_course_clicked = 0;
function co_clicked(){
	var name = document.getElementById("course_name").value;
	if( name !== null && name !== "" ){
		add_course_clicked += 1;
		$(document).ready(function(){
			$("#myCourses").prepend(
				"<div class='courses' id='co" + add_course_clicked + "'><h3>" + name +
				"</h3><button class='cat' id='cat" + add_course_clicked + "' onclick='cat_clicked(this.id)'>New Category</button></div>");
		});
		$('#course_name').val('');
		modal.style.display = "none";
	}
	if( name === "" ){
		document.getElementById("error").innerHTML = "Error. Please enter a course name";
	}
}

//CATEGORY MODAL
var modal2 = document.getElementById("caModal");
var btn2 = document.getElementById("test");
var span2 = document.getElementsByClassName("close")[1];

//add new category
span2.onclick = function(){
	modal2.style.display = "none";
	var ele = document.getElementsByName("chosen_one");
   	for(var i=0;i<ele.length;i++){
      ele[i].checked = false;
  	}
}

var catElement;
var divID;
function cat_clicked(clicked_id){
	modal2.style.display = "block";
 	catElement = document.getElementById( clicked_id );
	divID = catElement.parentNode.id;

}

var add_cat_clicked = 0;

function ca_ok_click(){
	var cat_name = "";
	if( document.getElementById("hw").checked ){
		cat_name = document.getElementById("hw").value;
		modal2.style.display = "none";
		add_cat_clicked += 1;
	}
	else if( document.getElementById("pro").checked ){
		cat_name = document.getElementById("pro").value;
		modal2.style.display = "none";
		add_cat_clicked += 1;
	}
	else if( document.getElementById("ex").checked ){
		cat_name = document.getElementById("ex").value;
		modal2.style.display = "none";
		add_cat_clicked += 1;
	}
	else if( document.getElementById("fi").checked ){
		cat_name = document.getElementById("fi").value;
		modal2.style.display = "none";
		add_cat_clicked += 1;
	}
	else if( document.getElementById("part").checked ){
		cat_name = document.getElementById("part").value;
		modal2.style.display = "none";
		add_cat_clicked += 1;
	}
	else if( document.getElementById("ec").checked ){
		cat_name = document.getElementById("ec").value;
		modal2.style.display = "none";
		add_cat_clicked += 1;
	}
	else if( document.getElementById("oth").checked ){
		cat_name = document.getElementById("oth").value;
		modal2.style.display = "none";
		add_cat_clicked += 1;
	}
	else{
		document.getElementById("oops").innerHTML = "Error, please select a category name";
	}
	var ele = document.getElementsByName("chosen_one");
	for(var i=0;i<ele.length;i++){
	  ele[i].checked = false;
	}
	$(document).ready(function(){
		$("#"+divID).append(
			"<div class='category' id='ca"+add_cat_clicked+"'><h4>"+cat_name+
			"</h4><button class='assi' id = 'assi"+add_cat_clicked+"' onclick='assi_clicked(this.id)'>New Assignment</button></div>");
	});

}
/*ASSIGNMENT*/
var modal3 = document.getElementById('assiModal');
var assiElement;
var divID2;

// Get the <span> element that closes the modal
var span3 = document.getElementsByClassName("close")[2];

// When the user clicks on <span> (x), close the modal
span3.onclick = function() {
	$('#assignment_name').val('');
	document.getElementById("wrong").innerHTML = "";
	modal3.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		document.getElementById("error").innerHTML = "";
        modal.style.display = "none";
    }
	if (event.target == modal2) {
        modal2.style.display = "none";
		var ele = document.getElementsByName("chosen_one");
	   	for(var i=0;i<ele.length;i++){
	      ele[i].checked = false;
	  	}
    }
    if (event.target == modal3) {
		$('#assignment_name').val('');
		document.getElementById("wrong").innerHTML = "";
        modal3.style.display = "none";
    }

}

function assi_clicked(clicked_id){
	modal3.style.display = "block";
 	assiElement = document.getElementById( clicked_id );
	divID2 = assiElement.parentNode.id;
}

//click enter for the ok button on the add course modal
var input2 = document.getElementById("assignment_name");
input2.addEventListener( "keyup", function(event) {
	event.preventDefault();
	if( event.keyCode === 13 ){
		document.getElementById( "as-ok" ).click();
	}
});

function assi_ok_clicked(){
	var assign = document.getElementById("assignment_name").value;
	if( assign !== null && assign !== "" ){
		$(document).ready(function(){
			$("#"+divID2).append(
			"<div class='assignment' id='as'><h5>"+assign+"</h5></div>" );
		});
		$('#assignment_name').val('');
		document.getElementById("wrong").innerHTML = "";
		modal3.style.display = "none";
	}
	else{
		document.getElementById("wrong").innerHTML = "Error. Please enter an assignment name";
	}
}















/**/
