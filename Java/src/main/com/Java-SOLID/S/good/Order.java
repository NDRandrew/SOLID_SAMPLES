package order;

public class Order {
    private String id;
    private String customerName;
    private String customerEmail;
    private double amount;
    private boolean isDiscountEligible;
    private double totalAmount;

    public Order(String id, String customerName, String customerEmail, double amount, boolean isDiscountEligible) {
        this.id = id;
        this.customerName = customerName;
        this.customerEmail = customerEmail;
        this.amount = amount;
        this.isDiscountEligible = isDiscountEligible;
    }

    // Getters and Setters
    public String getId() {
        return id;
    }

    public String getCustomerName() {
        return customerName;
    }

    public String getCustomerEmail() {
        return customerEmail;
    }

    public double getAmount() {
        return amount;
    }

    public boolean isDiscountEligible() {
        return isDiscountEligible;
    }

    public double getTotalAmount() {
        return totalAmount;
    }

    public void setTotalAmount(double totalAmount) {
        this.totalAmount = totalAmount;
    }
}

//SRP Verification:

//Responsibility: The Order class is a simple entity that holds the properties and methods related to an order (like id, amount, customerName, and so on).
//Single Responsibility: This class is only concerned with the data structure and the behavior related to an order object.
//It doesn't handle order processing, persistence, or sending emails.
//It only manages and encapsulates the order's data.