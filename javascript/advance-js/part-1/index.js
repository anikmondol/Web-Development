
"use strict";

// ------- Strict mode --------


// ------ Template strings -------------

/* 
let name = "anik";

let marks = 60;

let totalMarks = `my name is ${name} and my total mark ${marks}%`;

console.log(totalMarks);
*/


// ----- Math Object -----


/*
const piValue = Math.PI;
console.log(piValue);

const roundNumber = Math.round(3.1754);
console.log(roundNumber);

const floorNo = Math.floor(4.99);
console.log(floorNo);

const ceiNo = Math.ceil(5.1);
console.log(ceiNo);


const randomNo = Math.random();
console.log(randomNo);

const powerResult = Math.pow(2, 4);
console.log(powerResult);

const square = Math.sqrt(25);
console.log(square);

*/ 


/* ---- Object literals ----*/ 

/* 

// Creating object literal

let person = {
    name : "anik",
    age : 24,
    city : "dhaka"
}

// Access
console.log(person.name);
console.log(person["age"]);

// add & modifying new properties 

person["gender"] = "Male";
person["age"] = 2;

console.log(person);


// nesting objects

let student = {
    name : "anik",
    age : 24,
    city : "dhaka",
    contact : {
        phone : "01245845",
        gmail : "abc@gmail.com"
    }
}

console.log(student["contact"]["phone"]);

*/

// ----- this keyword ------
 

/* 

// global context
console.log(this === window);


// function context

function showThis(){
    console.log(this);
    
}

showThis()


// Method context

const person = {
    name : "anik",
    greet : function(){
        console.log(`my name is ${this.name}`);
        
    }
}

person.greet();

*/


// ------- JSON - JavaScript Object Notation ------

/* 

// json object
let jsonOb ='{"name" : "anik", "age" : 24, "gender" : "male"}';

console.log(JSON.parse(jsonOb));



// console.log(jsonOb);


// json array
let jsonArray = '["name", "anik", "age"]';

console.log(JSON.parse(jsonArray));


// console.log(jsonArray);


// Generating JSON


const person = {
    name : "anik",
    age : 24,
    city : "dhaka",
    contact : {
        phone : "01245845",
        gmail : "abc@gmail.com"
    }
}

let jsonDate = JSON.stringify(person);

console.log(jsonDate);

*/


// ------ Arrow function ------

/*  

// syntax 

const functionName = (parameter) =>{
    // function body
    return value;
}

const sum = (a, b) =>{
    // sum of a and b
    return a + b;
}

console.log(sum(10, 22));

// implicit this keyword

const person = {
    name : "anik", 
    greetRegular : function () {
        console.log(`my name is ${this.name}`);
        
    },
    greetArrow :  () => {
        console.log(`my name is ${this.name}`);
        
    }
}


person.greetRegular();
person.greetArrow();

*/


// ----- Rest operator ------


/* 

// basic function

function sum(a, b){
    return a + b;
}

console.log(sum(10, 202));


// function argument with rest operator 

function sumWithPRest(...numbers){
   let total = 0;

   for (const element of numbers) {
        total += element;
   }

   return total;

}


console.log(sumWithPRest(10, 10, 10, 47, 88));


function printDetail(name, ...details){
    console.log("name is ", name);
    console.log("details is ", details);
    
}

printDetail("anik", "dhaka", 22)

*/


// ------- spreed operator --------

/*  

// spreed-ing array
const num1 = [11, 2, 4];
const num2 = ["anik",...num1, 11, 77];
console.log(num2);


// spreed-ing object
const person = {
    name : "anik",
    age : 24,
    city : "dhaka",
    contact : {
        phone : "01245845",
        gmail : "abc@gmail.com"
    }
}

const newPerson = {...person, gender : "male"};

console.log(newPerson);

// functional argument 

function sum(a, b, c){
    return a + b + c;
}

const number = [2, 3, 4];
console.log(sum(...number));

*/


// ------- Destructuring array --------

/* 

let array = [4, 54, 77, 75, 48];
let [a, b, ...other] = array;

console.log(other);

// skipping elements 

const [, , num3, ...other1] = array;

console.log(num3);

// Swap Case

let x = 10;
let z = 20;

[z, x] = [x, z];

console.log("value is x",x);
console.log("value is z",z);


// use case, with return 

function getMinMax(numbers){

    let min = Math.min(...numbers);
    let max = Math.max(...numbers);
    
    return [max, min];

}


const [min, max] = getMinMax([2, 0, 7, 55, 10]);


console.log(max);
console.log(min);

*/


// Destructing nesting object 

/* 

const person = {
    name : "anik",
    age : 24,
    city : "dhaka",
    contact : {
        phone : "01245845",
        gmail : "abc@gmail.com"
    }
}

const {name, contact:{phone, gmail}, age} = person;

console.log(name);
console.log(gmail);
console.log(phone);


// use case - api repose

const apiRes = {
    status : 200,
    message: "Success",
    date: {
        id : 1,
        name : "anik"
    }
}


const {status, message, date} = apiRes; 
console.log(date);

*/



// ---- Symbols ------

/*  

const id = Symbol(31141321544);
const id1 = Symbol(31141321544);

console.log(id === id1);


// object ke sath

const user = {
    [Symbol("id")] : 1,
    name : "ritu"
}

console.log(user);

// array ke sath 

const arr = [Symbol(4), Symbol(4)];
console.log(arr[0] === arr[1]);

*/


// ----- "use strict" ----------

/* 

function showInfo(){
   let age = 30;
    console.log("my age is", age);
    
}


showInfo();


*/


// Error handling

// try - catch block

function divide (x, y){

    if (y === 0) {
        throw new Error("Can not divide by zero");
    }

    return x / y;
   }
   
  
try {

    let result = divide(40, 0);
    console.log(result);
 
} catch (error) {
    console.log("Error: ", error.message);
    
}






