package order;

import java.util.List;

public class OrderDatabaseManager {

    public void saveOrdersToDatabase(List<Order> orders) {
        System.out.println("Saving orders to the database...");
        for (Order order : orders) {

            System.out.println("Saving order ID: " + order.getId() + " to the database.");

        }
    }
}

//SRP Verification:


//Responsibility: The OrderDatabaseManager class is responsible solely for the persistence of orders (saving them to a database).
//It does not handle order processing.
//It does not handle sending notifications.
//Its sole job is to simulate saving orders to a database (or handling the actual database interaction in a real scenario).