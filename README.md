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
    ```
Open the .env file and update the following lines with your database and other settings
    ```sh
    APP_NAME="The Bell"
    APP_ENV=local
    APP_KEY=base64:randomkeygenerated
    APP_DEBUG=true
    APP_URL=http://localhost

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

    ```

