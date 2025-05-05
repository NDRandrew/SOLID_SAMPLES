
fun main() {
    val robot = Robot()
    val human = Human()

    robot.work()
    // robot.eat() // This will throw an exception if called

    human.work()
    human.eat()
}

//Interface Segregation Principle - No client should be forced to depend on methods it does not use.
//  The number of members in the interface that is visible to the dependent class should be minimised.
//  Large classes implement multiple smaller interfaces that group functions according to their usage

//The Worker interface forces both Robot and Human to implement both work() and eat() methods. However, not all Worker objects need to "eat". In this case:
//The Robot class is forced to implement eat(), but it doesn't make sense for a robot to have this method.
//The interface combines responsibilities that should be separated (working and eating), which violates the Interface Segregation Principle