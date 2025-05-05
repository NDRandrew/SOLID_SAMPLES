
class TaxCalculator(private val taxStrategy: TaxStrategy) {
    fun calculateTax(amount: Double): Double {
        return taxStrategy.calculateTax(amount)
    }
}

//Here's the Calculator that will use the "TaxStrategy" Interface to make use of each country's TaxStrategy