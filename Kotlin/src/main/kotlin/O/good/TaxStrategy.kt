interface TaxStrategy {
    fun calculateTax(amount: Double): Double
}

//The Interface that will make use The TaxStrategys, making the code more Extensible and Without the need of Modifying Existing Classes