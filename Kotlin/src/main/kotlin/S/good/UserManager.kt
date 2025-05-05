import S.good.UserRepository.UserSaver;
import S.good.Validator.EmailBlankValidator;
import S.good.Validator.EmailFormatValidator;
import S.good.Validator.NameValidator;

//Manages all the functionalities of the code

class UserManager(
    private val userCreator: UserCreator,
    private val nameValidator: NameValidator,
    private val emailBlankValidator: EmailBlankValidator,
    private val emailFormatValidator: EmailFormatValidator,
    private val userSaver: UserSaver,
    private val emailService: EmailService,
    private val logger: Logger
) {


    fun createUser(name: String, email: String) {

        nameValidator.validate(name)
        emailBlankValidator.validate(email)
        emailFormatValidator.validate(email)

        val user = userCreator.createUser(name, email)

        userSaver.execute(user)

        val subject = "Welcome, ${user.name}"
        val body = "Dear ${user.name},\n\nThank you for signing up with us"
        emailService.sendEmail(user.email, subject, body)

        logger.log("Created user: ${user.name}")
    }
}

