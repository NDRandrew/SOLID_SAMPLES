import java.util.Properties
import javax.mail.*

class EmailConfig(private val username: String, private val password: String) {
    fun getProperties(): Properties {
        val properties = Properties()
        properties["mail.smtp.host"] = "smtp.gmail.com"
        properties["mail.smtp.port"] = "587"
        properties["mail.smtp.auth"] = "true"
        properties["mail.smtp.starttls.enable"] = "true"
        return properties
    }

    fun getSession(properties: Properties): Session {
        return Session.getInstance(properties, object : Authenticator() {
            override fun getPasswordAuthentication(): PasswordAuthentication {
                return PasswordAuthentication(username, password)
            }
        })
    }

    fun getUsername(): String {
        return username
    }
}
//Class Tha'll Configure the Email Properties and API
