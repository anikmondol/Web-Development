let display = document.querySelector(".display");

let buttons = Array.from(document.getElementsByClassName("button"));


buttons.map(button => {
    button.addEventListener("click", e => {
        // console.log("clicked");
        // console.log(e.target);
        // console.log(e.target.innerText);

        // display.innerText += e.target.innerText;

        switch (e.target.innerText) {
            case "C":
                display.innerText = "";
                break;

            case "del":
                display.innerText = display.innerText.slice(0, -1);
                break;

            case "=":
                try {
                    display.innerText = eval(display.innerText);
                } catch (error) {
                    display.innerText = "Error!";
                }
              
                break;


            default:
                display.innerText += e.target.innerText;
                break;
        }

    })
});