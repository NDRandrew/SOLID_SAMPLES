
//SingleResponsibilityPrinciple(Bad)

import java.util.List;

public class OrderProcessor {

    private List<Order> orders;

    public OrderProcessor(List<Order> orders) {
        this.orders = orders;
    }

    public void processOrders() {
        for (Order order : orders) {

            double total =order.getAmount();
            if(order.isDiscountEligible()){
                total *= 0.9;
            }
            order.setTotalAmount(total);
            System.out.println("Processed order: " + order.getId() + " with total: " + total);
        }
    }

    public void saveOrdersToDatabase() {

        System.out.println("Saving orders to database...");
        for(Order order : orders){
            System.out.println("Saving order ID: " + order.getId() + " to the database.");
        }
    }


    public void sendNotifications() {
        for (Order order : orders) {

            String emailContent =   "Dear " + order.getCustomerName() + ",\n\n" +
                                    "Your order ID " + order.getId() + " has been processed successfully. " +
                                    "Your total is $" + order.getTotalAmount() + ".\n\nThank you for shopping with us!";
            System.out.println("Sending email to: " + order.getCustomerEmail());
            System.out.println("Email content: " + emailContent);
        }
    }
}

//Multiple Responsibilities:
// The OrderProcessor class is doing too many things:
//      Processing orders.
//      Saving orders to the database.
//      Sending notifications.