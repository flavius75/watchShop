# watchShop

Ecommerce project allowing users to browse a wide range of watches, add them to their cart, and make purchases. Users can create accounts, manage their profiles, and track their order history. Admin users have access to a dashboard where they can manage products, orders, and user accounts.

## Installation

To install and run the project locally, follow these steps:

### Prerequisites

- PHP >= 8.x
- Composer
- Node.js >= 20.x
- npm
- MySQL server

### Backend (Symfony 7)

1. Clone this repository to your local machine.
2. Navigate to the `back` directory: `cd back`.
3. Install PHP dependencies: `composer install`.
4. Copy the `.env` file to `.env.local` and configure your database connection.
5. Create the database schema: `php bin/console doctrine:database:create`.
6. Run database migrations: `php bin/console doctrine:migrations:migrate`.
7. (Optional) Load fixtures (sample data): `php bin/console doctrine:fixtures:load`.
8. Start the Symfony server: `symfony serve`.

### Frontend (Nuxt.js 3)

1. Navigate to the `front` directory: `cd front`.
2. Install JavaScript dependencies: `npm install`.
3. Start the Nuxt.js development server: `npm run dev`.

### Database

Make sure your MySQL server is running. You may need to create a new database for this project.

### Accessing the Application

Once both the backend and frontend servers are running, you can access the application by visiting `http://localhost:3000` in your web browser.


## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.