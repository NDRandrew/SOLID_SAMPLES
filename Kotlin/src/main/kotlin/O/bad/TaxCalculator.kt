

class TaxCalculator {
    fun calculateTax(amount: Double, country: String): Double {
        return when (country) {
            "USA" -> amount * 0.1
            "Canada" -> amount * 0.12
            "UK" -> amount * 0.15
            else -> throw IllegalArgumentException("Unsupported country")
        }
    }
}
// Open/Closed Principle - Software entities should be open for extension, but closed for modification.
// In this "Bad" example, Closed for extension: If we wanted to add a new tax rate for another country (e.g., Germany), we would need to modify the TaxCalculator class.
// Open for modification: The class forces us to modify its source code every time we need to add a new country or tax rate, which violates the Open/Closed principle.