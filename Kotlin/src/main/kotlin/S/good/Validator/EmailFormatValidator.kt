package S.good.Validator

class EmailFormatValidator {
    fun validate(email: String) {
        val emailRegex = "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$"
        if (!email.matches(emailRegex.toRegex())) {
            throw IllegalArgumentException("Invalid email format")
        }
    }
}

//Add an Email Format Validation
