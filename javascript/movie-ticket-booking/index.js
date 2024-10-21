/*
Step 1: Get references to Dom elements
*/

// get a reference to the main container
let container = document.querySelector(".container");


// get a reference of all available seats
let seats = document.querySelectorAll(".row .seat:not(.sold)");


// get a reference of the count and total elements
let count = document.querySelector("#count");
let total = document.querySelector("#total");

// get a reference of the movie dropdown
let movieSelect = document.querySelector("#movie");




/*
Step 2: Add event listeners
*/


// EventListener for movie selection change
movieSelect.addEventListener("change", e => {

    // update ticket price and store selected movie date

    ticketPrice = +e.target.value;

    setMovieDate(e.target.selectedIndex, e.target.value);


    // update display count and total

    updateSelectedCount();

});


// EventListener for seat clicks
container.addEventListener("click", e => {

    // check if a seat is clicked and not sold

    if (e.target.classList.contains("seat") && !e.target.classList.contains("sold")) {

        // Toggle seat selection
        e.target.classList.toggle("selected");

    }

    // update display count and total

    updateSelectedCount();

});


/*
Step 3: Define function to update selected count and total
*/

function updateSelectedCount() {

    // get all selected seats
    const selectedSeats = document.querySelectorAll(".row .seat.selected");

    // get an array of selected seat's index's
    const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));


    // store selected seats index into local storage

    localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex))


    // Calculate selected seats and count

    let selectedSeatsCounts = selectedSeats.length;


    // update UI with selected seats count and total prince

    count.innerText = selectedSeatsCounts;
    total.innerText = selectedSeatsCounts * ticketPrice;

    setMovieDate(movieSelect.selectedIndex, movieSelect.value);

}


/*
Step 4: Define function to set selected movie date, in local storage
*/

function setMovieDate(movieIndex, moviePrice) {
    localStorage.setItem("selectedMovieIndex", movieIndex);
    localStorage.setItem("selectedMoviePrice", moviePrice);
}


/*
Step 5: Define function to populate UI with local storage date
*/

// function to populate UI from local storage date

function getDate(){

    // get selected seats from local storage

    const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));


    // if there are selected seats, marks than as selected in the UI
    
    if (selectedSeats != null && selectedSeats.length > 0) {
        seats.forEach((seat, index) =>{
            if (selectedSeats.indexOf(index) > -1) {
                seat.classList.add("selected");
            }
        })
    }


    // get selected Movie from local storage
    const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");

    // if there's a selected movie index, then set it in the dropdown

    if (selectedMovieIndex != null) {
        movieSelect.selectedIndex = selectedMovieIndex;
    }

}


/*
Step 6: Initial setup of count, total and UI based on save date
*/ 

getDate();

// initialize ticket price
let ticketPrice = +movieSelect.value;

updateSelectedCount();