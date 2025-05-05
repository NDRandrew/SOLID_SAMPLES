import javax.mail.internet.*
import javax.mail.*
import java.util.Properties


class EmailService(private val emailConfig: EmailConfig) {

    fun sendEmail(to: String, subject: String, body: String) {
        try {
            val properties = emailConfig.getProperties()
            val session = emailConfig.getSession(properties)

            val message = MimeMessage(session)
            message.setFrom(InternetAddress(emailConfig.getUsername()))
            message.setRecipients(Message.RecipientType.TO, InternetAddress.parse(to))
            message.subject = subject
            message.setText(body)


            Transport.send(message)
            println("Email sent successfully to: $to")
        } catch (e: MessagingException) {
            println("Error while sending email: ${e.message}")
        }
    }
}
// Class that will Send the Email
