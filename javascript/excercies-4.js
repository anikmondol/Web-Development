const progressBar = document.querySelector("#progressBar");

const container = document.querySelector(".container");


function animateProgressBar(){
    let scrollDistance = -container.getBoundingClientRect().top;
    // console.log(scrollDistance);

    // let progressWidth = (scrollDistance / ( container.getBoundingClientRect().height)) * 100;

    let progressWidth = (scrollDistance / (container.getBoundingClientRect().height - document.documentElement.clientHeight)) * 100;

    let value = Math.floor(progressWidth);



    console.log(value);

    progressBar.style.width = value + "%";

    
    
}

// animateProgressBar();

window.addEventListener("scroll", animateProgressBar)