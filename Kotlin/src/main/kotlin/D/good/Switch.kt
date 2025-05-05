
//High-level module
class Switch(private val device: Switchable) {
    fun operate() {
        device.turnOn()  // Now works with any Switchable device
        println("Switch is operating")
    }
}

//Does not depend on LightBulb anymore