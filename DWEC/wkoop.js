class Person {
    constructor(name, age) {
        this.name = name;
        this.age = age;
        this.stomach = [];
    }
    eat(someFood) {
        if (this.stomach.length < 10) {
            this.stomach.push(someFood);
        }
    }
    poop() {
        this.stomach = [];
    }
    toString() {
        return `${this.name}, ${this.age}`;
    }
}

const person1 = new Person("Mary", 50);
console.log(person1.toString());

person1.eat("apple");
person1.eat("banana");
console.log(person1.stomach);
person1.poop();
console.log(person1.stomach);
