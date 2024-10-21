//step 1 - get the task from input file

const add = document.querySelector("#add");

add.addEventListener("click", e => {
    let value = document.querySelector("#newtask input").value;

    if (value.length == 0) {
        alert("please enter the task");
        return false;
    }

    addTodoItem(value);


})

//step 2 - add the task in todo list

function addTodoItem(task) {
    let randomNo = Math.floor(Math.random() * 9999);
    let id = `task-`+ randomNo;

    
    
    let html = `<div id="${id}" class="task">
            <span id="taskname">
                 ${task}
            </span>
            <button class="delete" onclick="deleteItem(${randomNo})">
                <i class="fa fa-trash-alt"></i>
            </button>
        </div>`;

        document.querySelector("#tasks").innerHTML += html;
        document.querySelector("#newtask input").value = "";
}


//step 3 - delete the task


function deleteItem(num){
    let id = `task-`+ num;

    alert("do you want delete");
    document.getElementById(id).remove();
    
}