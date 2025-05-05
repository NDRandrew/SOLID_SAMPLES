

fun main() {
    val lightBulb = LightBulb()
    val switch = Switch(lightBulb)
    switch.operate()
}

//Dependency Inversion Principle - High-level modules should not depend on low-level modules.
// Both should depend on abstractions. Abstractions should not depend upon details.

//In this example the Switch Class is tightly coupled to the low-level module (LightBulb): The Switch class directly depends on the concrete LightBulb class.
// If we wanted to change how the LightBulb works (e.g., swap it with a SmartLight or Lamp), we'd need to modify the Switch class.

//The Switch class is not depending on an abstraction (like an interface or an abstract class) that could allow it to be decoupled from the concrete LightBulb.
// This creates a rigid, hard-to-maintain design where changing one component forces changes in other components.