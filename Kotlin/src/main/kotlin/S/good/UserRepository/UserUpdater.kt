package S.good.UserRepository

import User

class UserUpdater(private val database: MutableList<User>) : UserPersistenceOperation {
    override fun execute(user: User) {
        val index = database.indexOfFirst { it.email == user.email }
        if (index != -1) {
            database[index] = user
        }
    }
}

//Updates the Input User's Data