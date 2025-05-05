package order;

import java.util.List;

public class OrderNotificationManager {

    public void sendNotifications(List<Order> orders) {
        for (Order order : orders) {
            String emailContent = "Dear " + order.getCustomerName() + ",\n\n" +
                    "Your order ID " + order.getId() + " has been processed successfully. " +
                    "Your total is $" + order.getTotalAmount() + ".\n\nThank you for shopping with us!";
            System.out.println("Sending email to: " + order.getCustomerEmail());
            System.out.println("Email content: " + emailContent);

        }
    }
}

//SRP Verification:


//Responsibility: The OrderNotificationManager class is responsible for sending email notifications to customers about their orders.
//It does not process orders or manage order data.
//It does not handle database interaction.
//Its only responsibility is to send notifications.