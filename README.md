# Laravel 8 Testing Guide

This guide explains the steps to clone, set up, and run Integration Testing, Unit Testing, and Functional Testing in a Laravel 8 project.

## Steps

1. **Clone the repository**:
   ```bash
   git clone https://github.com/adjisdhani/lara8-testing.git
   ```

2. **Navigate into the repository**:
   ```bash
   cd lara8-testing
   ```

3. **Install dependencies using Composer**:
   ```bash
   composer install
   ```

4. **Configure `.env` and `.env.testing` files**:
   - Set up the `.env` file for the main application.
   - Add a `.env.testing` file specifically for testing. Ensure the testing database is different from the main application database. Example:
     ```env
     DB_CONNECTION=mysql
     DB_DATABASE=testing_database
     DB_USERNAME=root
     DB_PASSWORD=
     ```

5. **Run the tests**:
   
   - To run **Integration Testing**:
     ```bash
     php artisan test --filter=UserIntegrationTest
     ```

   - To run **Unit Testing**:
     ```bash
     php artisan test --filter=CalculatorTest
     ```

   - To run **Functional Testing**:
     ```bash
     php artisan test --filter=UserFunctionalTest
     ```

6. **Run a specific test method (optional)**:
   To execute a specific method within a test class, append the method name to the command. For example:
   ```bash
   php artisan test --filter=UserFunctionalTest::it_can_get_all_users
   ```
   This will run only the `it_can_get_all_users` method inside the `UserFunctionalTest` class.

7. **Done!**

You can follow these steps to ensure the tests are executed correctly. Always use a separate database for testing to avoid conflicts with your main application data.
