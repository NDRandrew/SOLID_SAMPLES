fun main() {
    val sparrow = Sparrow()
    makeBirdFly(sparrow)  // Works fine

    val ostrich = Ostrich()
    // makeBirdFly(ostrich)  // Will not compile, as Ostrich isn't Flyable
}

//If there was a bird that doesn't compile to the "move" function, it would again be a violation of LSP