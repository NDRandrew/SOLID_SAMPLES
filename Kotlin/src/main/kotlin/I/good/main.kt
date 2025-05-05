
fun main() {
    val robot = Robot()
    val human = Human()

    robot.work()
    // robot.eat() // No longer needed for Robot

    human.work()
    human.eat()
}

//Robot implements only the Workable interface, as it doesn't need to implement eat(), thus avoiding an unnecessary method.
//Human implements both Workable and Eatable, as it needs both methods.