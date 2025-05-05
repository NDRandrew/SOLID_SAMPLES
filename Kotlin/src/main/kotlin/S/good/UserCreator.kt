
// Create the User using the User Data Object already created

class UserCreator {
    fun createUser(name: String, email: String): User {
        println("Creating user with name: $name and email: $email")
        return User(name, email)
    }
}