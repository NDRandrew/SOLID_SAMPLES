
class UkTaxStrategy : TaxStrategy {
    override fun calculateTax(amount: Double): Double {
        return amount * 0.15
    }
}

//For us to mantain the Open/Closed Principle, we need to remove the fragility of the code by creating a class for each
//  respective "Tax Strategy" and using an Interface and a Calculator to interact with each country