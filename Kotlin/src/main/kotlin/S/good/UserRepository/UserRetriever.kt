package S.good.UserRepository

import User

class UserRetriever(private val database: List<User>) : UserPersistenceOperation {
    override fun execute(user: User) {
        val retrievedUser = database.find { it.email == user.email }
    }
}

//Retrieves the input User in the database