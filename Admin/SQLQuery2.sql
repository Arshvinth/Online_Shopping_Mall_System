CREATE TABLE Category(
Category_id char(3),
Category_name varchar(20),
description varchar(200),
CONSTRAINT Category_PK PRIMARY KEY(Category_id)
);

CREATE TABLE Technician(
Technician_id char(5),
Username varchar(10),
Password Varchar(10),
Email varchar(20),
CONSTRAINT Technician_PK PRIMARY KEY(Technician_id)
);

CREATE TABLE Supplier(
Supplier_id char(5),
Username varchar(10),
Password Varchar(10),
Email varchar(20),
Phone_number int,
Address varchar(50),
CONSTRAINT Supplier_PK PRIMARY KEY(Supplier_id)
);

CREATE TABLE Admin(
Admin_id char(5),
Username varchar(10),
Password Varchar(10),
Email varchar(20),
CONSTRAINT Admin_PK PRIMARY KEY(Admin_id)
);

CREATE TABLE Product(
Product_id char(3),
Product_name varchar(20),
Category_id char(3),
Description varchar(200),
price real,
CONSTRAINT Product_PK PRIMARY KEY(Product_id),
CONSTRAINT Product_FK FOREIGN KEY(Category_id)
REFERENCES Category(Category_id)
);

CREATE TABLE Customer(
Customer_id char(5),
Username varchar(10),
Password Varchar(10),
Email varchar(20),
Address varchar(50),
Age int,
Date_of_birth date,
Phone_number int,
CONSTRAINT Customer_PK PRIMARY KEY(Customer_id)
);

CREATE TABLE Customer_order(
Order_id char(3),
Customer_id char(5),
Order_date date,
Total_price real,
CONSTRAINT Customer_order_PK PRIMARY KEY(Order_id),
CONSTRAINT Customer_order_FK FOREIGN KEY(Customer_id)
REFERENCES Customer(Customer_id)
);

CREATE TABLE Payment(
Payment_id char(3),
Customer_id char(5),
Order_id char(3),
Payment_method varchar(10),
Payment_date date,
CONSTRAINT Payment_PK PRIMARY KEY(Payment_id),
CONSTRAINT Payment_FK FOREIGN KEY(Customer_id)
REFERENCES Customer(Customer_id),
CONSTRAINT Payment_FK2 FOREIGN KEY(Order_id)
REFERENCES Customer_order(Order_id)
);

CREATE TABLE Shopping_cart(
Cart_id char(3),
Product_id char(3),
Customer_id char(5),
Price real,
Quantity int,
CONSTRAINT Shopping_cart_PK PRIMARY KEY(Cart_id),
CONSTRAINT Shopping_cart_FK FOREIGN KEY(Customer_id)
REFERENCES Customer(Customer_id),
CONSTRAINT Shopping_cart_FK2 FOREIGN KEY(Product_id)
REFERENCES Product(Product_id)
);

