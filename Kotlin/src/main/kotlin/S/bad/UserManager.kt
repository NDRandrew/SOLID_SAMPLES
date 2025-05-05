

//SingleResponsabilityPrinciple(Bad)
class UserManager {
    fun createUser(name: String, email: String) {
        println("User $name created with email $email")

        sendWelcomeEmail(name, email)

        logEvent("Created user: $name")

        saveUserToDatabase(name, email)
    }

    private fun sendWelcomeEmail(name: String, email: String) {
        println("Sending welcome email to $email")
    }

    private fun logEvent(message: String) {
        println("Log: $message")
    }

    private fun saveUserToDatabase(name: String, email: String) {
        println("Saving user to database: $name, $email")
    }
}


// Single responsibility principle - A class should have only one reason to change.
// In this "Bad" example, the class has multiple reasons to change
// e.g. This class handle Creating a user, sending welcome email, Logging events and Saving user data