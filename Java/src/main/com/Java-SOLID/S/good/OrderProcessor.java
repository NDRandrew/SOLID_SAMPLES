package order;

import java.util.List;

public class OrderProcessor {

    public void processOrders(List<Order> orders) {
        for (Order order : orders) {
            double total = order.getAmount();
            if (order.isDiscountEligible()) {
                total *= 0.9;
            }
            order.setTotalAmount(total);
            System.out.println("Processed order: " + order.getId() + " with total: " + total);
        }
    }
}

//SRP Verification:

//Responsibility: The OrderProcessor class is only responsible for processing orders. This includes tasks like applying discounts or calculating totals.
//It does not handle persistence (saving to a database).
//It does not handle notifications.
//It simply processes orders and modifies their data (e.g., calculating the total amount after applying a discount).
