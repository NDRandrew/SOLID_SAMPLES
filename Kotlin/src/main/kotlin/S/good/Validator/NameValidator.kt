package S.good.Validator

class NameValidator {
    fun validate(name: String) {
        if (name.isBlank()) {
            throw IllegalArgumentException("Name cannot be blank")
        }
    }
}

// Makes sure name isn't blank