# The Bell

"The Bell" is a blogging platform built with Laravel. It is designed to post alerting information where writing a post is akin to "ringing a bell" and reading a post is akin to "listening to the bell." The platform aims to create a real-time relationship between the bell (information) and the people (users).

## Features

- Ring a Bell: Create and publish posts.
- Listen to the Bell: Read and interact with posts.
- Search and filter posts.
- User authentication and authorization.
- Commenting system.
- Real-time notifications.

## Installation

### Prerequisites

- PHP >= 8.0
- Composer
- Node.js & npm
- A web server (e.g., Apache, Nginx, Litespeed)
- A database (e.g., MySQL, PostgreSQL)

### Step-by-Step Installation

1. **Clone the Repository:**

   ```sh
   git clone https://github.com/rky-ke/thebell.git
   cd thebell
   ```

2. **Install Dependencies**

   ```sh
    composer install
    npm install
    ```

3. **Environment Configuration**

    Copy the .env.example file to .env and configure your environment settings.
    ```sh
        cp .env.example .env

4. **Generate Application Key**

    Generate the application key, which is used for encryption.
    ```sh
    php artisan key:generate

5. **Run Database Migrations**

    Run the database migrations to create the necessary tables.
    ```sh
    php artisan migrate

6. **Compile Assets**

    Compile the CSS and JavaScript assets.
    ```sh
    npm run dev

7. **Serve the Application**

    Start the Laravel development server.
    ```sh
    php artisan serve


8. **Deployment**

    For deployment, you can use services like Forge, Envoyer, or deploy manually to your web server. Ensure you set your environment to production and compile your assets using the following.
    ```sh
    npm run production


