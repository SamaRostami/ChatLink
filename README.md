**ChatLink: Simple WebSocket Chat App**

![ChatLink Banner](/public/Banner.png)

ChatLink is a straightforward chat application that demonstrates the implementation of websocket connections. The backend is built using Laravel, leveraging the power of the `laravel-websockets` package, while the client side is developed for Android devices. This application enables real-time communication between users and incorporates a secure authentication system. Messages and data exchanged are stored in a database for seamless interaction history.

## Features

- **Real-time Messaging**: Enjoy instant messaging capabilities using websockets, ensuring messages are delivered and received in real-time.

- **Laravel-Websockets**: The backend is powered by Laravel with the `laravel-websockets` package, enabling efficient websocket handling and management.

- **Android Client**: The Android client provides a user-friendly interface for sending and receiving messages on the go.

- **Secure Authentication**: A robust authentication system ensures that only authorized users can access the chat and interact with others.

- **Message Persistence**: All chat messages and relevant data are stored in a database, allowing users to retrieve their message history.

## Installation

### Backend (Laravel)

1. Clone this repository to your desired directory.

2. Install the required dependencies using Composer:
   ```
   composer install
   ```

3. Set up your `.env` file with appropriate database and websocket configuration.

4. Run migrations to set up the database:
   ```
   php artisan migrate
   ```

5. Install and configure `laravel-websockets` by following their documentation.

6. Start the Laravel development server:
   ```
   php artisan serve
   ```

### Android Client

1. Open Android Studio and choose "Open an existing Android Studio project."

2. Navigate to the `android` directory and select it.

3. Build and run the Android app on an emulator or a physical device.

## Usage

1. Launch the Android app on your device.

2. Register or log in using the provided authentication system.

3. Start sending and receiving real-time messages with other users who are logged in.

## Contributing

Contributions are welcome! If you find a bug or want to enhance the application, feel free to submit an issue or a pull request.

## License

This project is licensed under the [MIT License](LICENSE).

---

Happy chatting with ChatLink! If you have any questions or need assistance, please don't hesitate to contact us at samasky.rostami@gmail.com
