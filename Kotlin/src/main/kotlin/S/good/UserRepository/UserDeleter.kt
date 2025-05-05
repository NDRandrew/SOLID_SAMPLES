package S.good.UserRepository

import User

class UserDeleter(private val database: MutableList<User>) : UserPersistenceOperation {
    override fun execute(user: User) {
        database.remove(user)
        println("User removed: ${user.name}")
    }
}
//Deletes the input User in the database