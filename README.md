# CRUD App

This CRUD (Create, Read, Update, Delete) application is a simple yet effective tool for managing book records. It leverages PHP, HTML, CSS, and Bootstrap to provide a user-friendly interface for performing database operations. Below is an overview of the project along with setup instructions and usage guidelines.

## Tools Used

- **AWS RDS SQL:** The application's database is hosted on Amazon Web Services' Relational Database Service (RDS), providing reliable and scalable storage for book records.
- **PHP:** Server-side scripting language used to handle backend logic, interact with the database, and dynamically generate HTML content.
- **Cookies in PHP:** Cookies are utilized to store user preferences and session data, enhancing the application's functionality.
- **HTML:** Hypertext Markup Language is employed to structure the application's frontend, defining the layout and content of web pages.
- **CSS:**  Cascading Style Sheets are used for styling the HTML elements, ensuring a visually appealing and consistent user interface.
- **Bootstrap:** A popular front-end framework utilized for building responsive and mobile-first web applications. Bootstrap components and styles enhance the application's design and responsiveness.

## Setup Instructions
### Prerequisites
To run the CRUD App on your local machine, follow these steps:

1. Clone this repository to your local machine:

```bash
git clone https://github.com/Tulipreactjsmain/crud-app.git
```

2. Navigate to the project directory:

```bash
cd crud-app
```
3. Install dependencies using PHP's package manager (Composer):

```bash
composer install
```

4. Create a .env file in the root directory of the project and add the necessary credentials and connection details for accessing the AWS RDS SQL database. check /database/connection.php for naming format.

5. Launch a local web server (e.g., Apache, Nginx) with PHP support or use PHP's built-in development server to run the application locally.

```bash
php -S localhost:8000
```

6. Open a web browser and navigate to http://localhost:8000 to access the CRUD App. You should see the homepage with options to create, read, update, and delete book records.

## Contributing
Contributions are welcome! If you find any bugs or want to suggest new features, please open an issue on the GitHub repository.

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them with descriptive messages.
4. Push your changes to your fork.
5. Open a pull request to the main repository.

