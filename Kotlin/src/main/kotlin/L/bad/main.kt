

fun main() {
    val ostrich = Ostrich()
    makeBirdFly(ostrich)  // This will throw an exception, violating LSP
}

//Liskov Substitution Principle - Child classes should never break the parent class type definitions.