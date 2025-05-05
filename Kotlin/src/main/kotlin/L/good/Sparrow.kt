class Sparrow : Bird(), Flyable {
    override fun move() {
        println("Sparrow is flying")
    }

    override fun fly() {
        println("Sparrow is flying")
    }
}

//Here's an example of Bird that at the same time that has the "move" function that is inside Bird's class,
//  has also the fly function given using the Flyable Interface