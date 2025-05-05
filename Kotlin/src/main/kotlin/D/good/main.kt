

fun main() {
    val lightBulb = LightBulb()
    val switch = Switch(lightBulb)
    switch.operate()
}

//How this fixes DIP problems? ------
//High-level module (Switch) depends on the Switchable interface (an abstraction) rather than the concrete LightBulb class.
//  This makes the code more flexible and extensible.
//Now, the Switch class can operate with any object that implements the Switchable interface
//  (e.g., LightBulb, SmartLight, Lamp, etc.) without modification to the Switch class itself.

//At last The Dependency Inversion Principle is followed because the high-level module (Switch) does not depend on low-level modules (LightBulb),
// but on the abstraction (Switchable).