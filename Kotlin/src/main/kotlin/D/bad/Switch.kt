
//High-level module
class Switch(private val bulb: LightBulb) {
    fun operate() {
        bulb.turnOn()  // Directly depending on the concrete LightBulb class
        println("Switch is operating")
    }
}