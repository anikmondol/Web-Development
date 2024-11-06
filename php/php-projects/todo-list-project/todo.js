// Step 1 - Get the task from input field
const add = document.getElementById("add");
add.addEventListener("click", e => {
  let value = document.querySelector("#newtask input").value;
  if (value.length == 0) {
    alert("Please enter a task");
    return false;
  }

  addTodoItem(value);
});


