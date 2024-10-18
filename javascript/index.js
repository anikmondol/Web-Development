// ----- Variables ----------
/* let name = "anik"; */

// ----- keywords -------
/* if, else, for, while, in, foreach, function */


// ------ date types ------
/* string = "sting type";
 number = 12, 22, 11;
 boolean = true/false;
Object = {name: "anik", age: 24, city: "dhaka"};
array = ["Valva", "BMW", "Tesla"]; */



// ------ var, let, const ------
/* var name = "anik"; // 1995 to 2015
let marks = 70; // from 2015
const pie = 3.14; // from 2015

When to use var, let, const ?

1. Always declare variables.
2. Always use const if the value should not be changed.
3. Always use const if the type should not be changed (Arrays and Objects).
4. Only use let if you can't use const
5. only use var if you must support old browsers

*/


// ------ Hoisting ------
/* console.log(marks);
var marks = 70; */




// ------ Types in JS ----
/*

Primitives: sting, number, boolean
Reference: (), {}, []

 let a = 20;
 let b = a;

let a = [11, 22, 40];
let b = [... a];

b.push(212,)

console.log("a is =", a);
console.log("b is =", b);

*/


// Operators

/*

Assignment =,
Arithmetic +, -, *, /, %
Logical &&, ||, !
Relational >, <, >=, <=, !=, ==

*/


// ------- Exercise 1 -----

/*Find maximum among 3 variables

let num1 = 30;
let num2 = 44;
let num3 = 49;
 Ternary operator ----> (conation) ? "True statement" : "False statement"
console.log(num1 > num2 && num1 > num3 ? "Num 1 is max" : "");
console.log(num2 > num1 && num2 > num3 ? "Num 2 is max" : "");
console.log(num3 > num1 && num3 > num2 ? "Num 3 is max" : "");

*/



// Increment(++) / Decrement(--)

/*

num++(post);
++num(pre);

/*




// ----- Array & String Methods - pre defined functions -----

/*

----- Array build function ---

const fruits = ["Apple", "Mango", "Banana"];
const cars = new Array("BMW", "Volvo");

// console.log(fruits[1]);
// console.log(Cars[0]);

// console.log(fruits.length);
// fruits.push("Orange");
// fruits.pop();
// fruits.shift();
// fruits.unshift("papaya");
// console.log(fruits);

let boys = ["Amon", "Anti"];
let girls = ["Seema", "Anita"];
let students = boys.concat(girls);
// let students =[...boys, ...girls];
console.log(students);


----- String build function ---
let name = " Anik Mondal ";

// console.log(name);n
// console.log(name[0]);
// console.log(name.length);
// let sub = name.substring(0, 4);
// console.log(sub);
// console.log(name.trim());
// console.log(name.replace("Anik", "anik"));
// console.log(name.toUpperCase());
// console.log(name.toLowerCase());


*/



// ----- Conditional Statement ------

/*

if, else, else if, switch

let a = 100;
let b = 3000;
let c = 500;


if ( !(a > b) ) {
     console.log(true);
 }


if (a > b) {
    console.log(true);
} else {
    console.log(false);
}


 if (a > b && a > c) {
     console.log("A is Max Number");
 } else if(b > a && b > c){
     console.log("B is Max Number");
 } else {
     console.log("C is Max Number");
 }


if (a > b) {
    if (a > c) {
        console.log("A is Max Number");
    } else {
        console.log("C is Max Number");
    }
}else{
    console.log("B is Max Number");
}



let no = 7;

switch (no) {

    case 1:
        console.log("day is Sunday");
        break;

    case 2:
        console.log("day is Monday");
        break;

    case 3:
        console.log("day is Tuesday");
        break;

    case 4:
        console.log("day is Wednesday");
        break;

    case 5:
        console.log("day is Thursday");
        break;

    case 6:
        console.log("day is Friday");
        break;

    case 7:
        console.log("day is Saturday");
        break;

    default:
        console.log("unknown date");

        break;
}

*/



// ------- Loops --------

/*

for, for in, for of, while

for(expression 1; expression 2; expression 3 ){
}

for(declaration; condition; increment/decrement ){
}

// for loops

for(let i = 1; i < 11; i++){
    console.log(i);
}

*/ 


let i = 1;

while (i < 11) {
    console.log(i);
    i++;
}


