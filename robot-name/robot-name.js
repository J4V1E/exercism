/*
    Exercism - Robot Name for Vehikl challenge
    Written - Joel Repta on March 9 2019
 */

const robotSet = new Set();

export class Robot {
    constructor() {
        this.robotName = generateName();
    }

    get name() {
        return this.robotName;
    }

    reset() {
        this.robotName = generateName();
    }
}

//Generates uppercase string, length of 'quantity'
function randomLetters(quantity) {
    let letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let result = "";
    
    for (let i=0; i < quantity; i++) {
        result += letters.charAt(Math.floor(Math.random() * (letters.length - 1)));
    }
    
    return result;
}

//Returns random single digit
function randomDigit() {
    return Math.floor(Math.random() * 10);
}

//Generate new Robot name
function generateName() {
    let name = "";

    name += randomLetters(2);

    for(let i = 0; i < 3; i++) {
        name += randomDigit().toString();
    }

    if (robotSet.has(name)) {
        name = generateName();
    }

    robotSet.add(name);
    return name;
}