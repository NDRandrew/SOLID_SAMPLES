class Human : Workable, Eatable {
    override fun work() {
        println("Human is working")
    }

    override fun eat() {
        println("Human is eating")
    }
}