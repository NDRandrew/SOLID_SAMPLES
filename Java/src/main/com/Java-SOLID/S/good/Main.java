package order;

import java.util.Arrays;
import java.util.List;

public class Main {

    public static void main(String[] args) {
        // Sample orders
        List<Order> orders = Arrays.asList(
                new Order("1", "Alice", "alice@example.com", 100.0, true),
                new Order("2", "Bob", "bob@example.com", 50.0, false)
        );

        // Creating instances of each manager
        OrderProcessor orderProcessor = new OrderProcessor();
        OrderDatabaseManager databaseManager = new OrderDatabaseManager();
        OrderNotificationManager notificationManager = new OrderNotificationManager();

        // Process the orders
        orderProcessor.processOrders(orders);

        // Save orders to the database
        databaseManager.saveOrdersToDatabase(orders);

        // Send notifications
        notificationManager.sendNotifications(orders);
    }
}

//Single responsibility principle - A class should have only one reason to change


//OrderProcessor only focuses on the business logic of processing orders.
//OrderDatabaseManager is in charge of saving orders to a database (simulated).
//OrderNotificationManager sends email notifications about the orders.
//Order holds the order data.

//SRP Verification:

//Responsibility: The Main class coordinates the process. It creates instances of the other classes
//          (e.g., OrderProcessor, OrderDatabaseManager, and OrderNotificationManager) and orchestrates the flow by calling their respective methods.
//It does not handle any of the core business logic directly. Its responsibility is just to tie everything together.
//It doesn't take on the responsibility of processing orders, sending emails, or saving data to the database.
//It simply invokes those responsibilities by delegating them to the appropriate classes.