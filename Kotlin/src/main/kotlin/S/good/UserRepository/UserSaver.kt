package S.good.UserRepository

import User

class UserSaver(private val database: MutableList<User>) : UserPersistenceOperation {
    override fun execute(user: User) {
        database.add(user)
    }
}

//Save the Object User in the database (In this case a MutableList<>)