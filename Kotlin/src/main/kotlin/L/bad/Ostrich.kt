class Ostrich : Bird() {
    override fun fly() {
        throw UnsupportedOperationException("Ostriches can't fly")
    }
}

//Here we create a class Ostrich and create an exception to the "bird" Class by stating that it doesn't fly