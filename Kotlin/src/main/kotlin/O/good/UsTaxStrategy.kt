

class UsTaxStrategy : TaxStrategy {
    override fun calculateTax(amount: Double): Double {
        return amount * 0.1
    }
}

//For us to mantain the Open/Closed Principle, we need to remove the fragility, rigidity of the code by creating a class for each
//  respective "Tax Strategy" and using an Interface and a Calculator to interact with each country