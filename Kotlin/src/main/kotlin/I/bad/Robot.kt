

class Robot : Worker {
    override fun work() {
        println("Robot is working")
    }

    override fun eat() {
        throw UnsupportedOperationException("Robots don't eat!")
    }
}