# Shopping Store with PHPUnit Testing

This is a simple shopping store application built using the Laravel framework. The project demonstrates basic cart and product functionalities, including adding products to the cart, displaying product details, and removing items from the cart. PHPUnit is used to test these features.

## Features

- Browse products available in the store
- View detailed information about each product
- Add products to the shopping cart
- Increment the quantity of items in the cart
- Handle stock limitations when adding items
- Remove items from the cart
- Update item quantities in the cart

## PHPUnit Test Cases

1. Add New Product to Cart:
   - Ensures a product is successfully added to the cart session.
3. Increment Product Quantity:
   - Verifies that the quantity of a product in the cart increments correctly.
5. Handle Insufficient Stock:
   - Checks if an error is returned when trying to add more items than available stock.
7. Remove Product from Cart:
   - Ensures a product is removed from the cart session.
     
## Requirements

To run this project, you need to have the following installed:

- PHP >= 8.1
- Composer
- MySQL or another supported database
- Node.js & npm (for front-end assets)
- Laravel 10.10
  
## Installation Instructions

Follow these steps to install and run the project locally.

### Step 1: Clone the Repository
First, clone the repository from GitHub:
```bash
git clone https://github.com/HudaSeyam/Shopping-Store-with-PHPUnit-Testing.git
cd shopping-store-with-phpunit-testing
```

### Step 2: Set Up the Environment
Install the dependencies:
```bash
composer install
```
Copy the example environment file and update the environment variables:
```bash
cp .env.example .env
```
Set up the following variables in the .env file:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
Generate the Laravel application key:
```bash
php artisan key:generate
```
### Step 3: Run Migrations
Run the database migrations to create the necessary tables:
```bash
php artisan migrate
```
### Step 4: Seed the database
```bash
php artisan db:seed
```
### Step 5: Start the Development Server
Now, you can start the Laravel development server:
```bash
php artisan serve
```
Visit http://localhost:8000 in your browser to see the application.

### Step 6: Running PHPUnit Tests
The PHPUnit tests are located in the tests/Feature directory and are written to test the cart functionalities.

To run the tests, use the following command:
```bash
php artisan test
```
