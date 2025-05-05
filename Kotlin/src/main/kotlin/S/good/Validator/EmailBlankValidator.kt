package S.good.Validator
class EmailBlankValidator {
    fun validate(email: String) {
        if (email.isBlank()) {
            throw IllegalArgumentException("Email cannot be blank")
        }
    }
}

//Makes Sure that the Email isn't Blank