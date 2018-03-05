// To check if the form can submit, this variable keeps a counter of how many invalid fields there are
var falseFields = 0;

//validates if plain text field is non-empty
function validateText(form, name) {
  //taking the value of the form field and storing in a variable
  var text = document.forms[form][name].value;
  // if the text field is empty, then show the error text and add to the counter of invalid fields
  if (text == "") {
    document.getElementById(name).style.visibility = "visible";
    falseFields++;
  }
  // if the text field is not empty, then
  else {
    //if the text field is not empty, then do not show the error field or hide it if it is visible
    document.getElementById(name).style.visibility = "hidden";
  }
}

function validatePassword(form) {
  //store the password and repeated password fields in variables
  var password = document.forms[form]["password"].value;
  var repeatedPassword = document.forms[form]["repeatedPassword"].value;

  //checks to see if the password field is empty
  if (password == "") {
    document.getElementById("password").style.visibility = "visible";
    falseFields++;
  } else {
    document.getElementById("password").style.visibility = "hidden";
  }

  //checks to ensure that the password and the repeated password are the same
  if (password != repeatedPassword) {
    document.getElementById("repeatedPassword").style.visibility = "visible";
    falseFields++;
  } else {
    document.getElementById("repeatedPassword").style.visibility = "hidden";
  }
}

//ensures that a radiobutton is pressed
function validateRadioButton(form, name) {
  var value = document.forms[form][name].value;
  if (value == "") {
    falseFields++;
    document.getElementById(name).style.visibility = "visible";
  }
  else {
    document.getElementById(name).style.visibility = "hidden";
  }
}
//checks if a valid email is inputted with a regular expression
function validateEmail(form, name) {
  //storing regular expression in variable
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var value = document.forms[form][name].value;
  //testing the value of the field with the regular expression
  if (re.test(value)){
    document.getElementById("email").style.visibility = "hidden";
  }
  else {
    falseFields++;
    document.getElementById("email").style.visibility = "visible";
  }
}


function validateNumber(form, name) {
  var value = document.forms[form][name].value;
  // isNaN returns false if the string is an number
  if (isNaN(value) || value == "") {
    falseFields++;
    document.getElementById("happy").style.visibility = "visible";
  } else {
    document.getElementById("happy").style.visibility = "hidden";
  }
}

//run the validations on the correct fields
function validateRegistration() {
  //creating a count of the number of false fields
  falseFields = 0;
  validateText("registrationForm", "username");
  validatePassword("registrationForm");
  validateRadioButton("registrationForm", "visitFrequency");
  validateEmail("registrationForm", "email");
  validateNumber("registrationForm", "happy");

  // if there is 0 invalid fields, then submit the form, else do not 
  if (falseFields != 0){
    return false;
  }
}
