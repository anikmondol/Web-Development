// Step 1 - Get the task from input field
const form = document.getElementById("taskform");
form.addEventListener("submit", e => {
  let value = document.getElementById("anik").value;
  
  if (value.length == 0) {      // check if the input field is empty
    alert("Please enter a task");
     e.preventDefault();         // prevent the form from submitting
  
  }
});


// Hide alerts
var close = document.getElementsByClassName("close");

function hide() {
  this.parentElement.remove();
  return false;
}

for (var i = 0; i < close.length; i++) {
  close[i].addEventListener("click", hide, false);
}
