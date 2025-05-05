package S.good.UserRepository
import User

interface UserPersistenceOperation {
    fun execute(user:User)
}
// Interface to make use of the User Class