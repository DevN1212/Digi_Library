# DigiLibrary

DigiLibrary is a comprehensive library management system designed as a Database Management System (DBMS) project for second-year Computer Science and Engineering (CSE) students. This system features a welcome portal with separate interfaces for administrators and users (students). The goal is to streamline library operations, improve user experience, and enhance the efficiency of library management.

## Features

### Admin Portal
- **Manage Students**: Add, update, and delete student records.
- **Issue Books**: Issue books to students and record the transaction.
- **View Profile**: View and edit admin profile details.
- **Manage Issued Books**: Track and manage books that have been issued to students.
- **Manage Category, Rack, Author, and Publishers**: Add, update, and delete book categories, racks, authors, and publishers.
- **Reminders for Return Books**: View reminders for books that are due to be returned.
- **Automatic Fine System**: Automatically calculate and manage fines for late returns.

### User (Student) Portal
- **View Issued Books**: Check the list of books currently issued to the student.
- **View Available Books in Library**: Browse and search for available books in the library.
- **Request a New Book**: Request the library to acquire new books through a provided book link.
- **Return Reminder**: Receive a reminder one week prior to the due date for returning books.

## Installation

1. **Clone the repository**:
    ```sh
    git clone https://github.com/DevN1212/Digi_Library.git
    ```
2. **Navigate to the project directory**:
    ```sh
    cd digilibrary
    ```
3. **Set up the database using phpMyAdmin**:
    - Open phpMyAdmin in your browser (typically `http://localhost/phpmyadmin`).
    - Create a new database named `digilibrary_db`.
    - Import the provided SQL script (`lms.sql`) to set up the necessary tables and initial data:
      1. Select the `digilibrary_db` database.
      2. Go to the **Import** tab.
      3. Click on **Choose File** and select the `lms.sql` file from your local directory.
      4. Click **Go** to import the database schema and data.
         
4. **Access the application**:
    - Open your browser and navigate to `http://localhost:3000`.

## Usage

### Admin Portal
1. **Login**: Admins can log in using their credentials.
2. **Dashboard**: Access various management features from the admin dashboard.
3. **Manage Students**: Navigate to the student management section to add, update, or delete student records.
4. **Issue Books**: Go to the book issuing section, select a student, and issue books to them.
5. **Manage Issued Books**: Track all issued books and manage returns.
6. **Manage Library Entities**: Update the details of categories, racks, authors, and publishers as needed.
7. **View Reminders and Manage Fines**: Check for return reminders and manage any fines for late returns.

### User (Student) Portal
1. **Login**: Students can log in using their credentials.
2. **Dashboard**: Access various user features from the student dashboard.
3. **View Issued Books**: Check the list of currently issued books and their due dates.
4. **Search Books**: Browse the library catalog to find available books.
5. **Request New Books**: Submit a request for new books through the provided book link.
6. **Return Reminders**: Receive and view reminders for returning books one week prior to the due date.

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add some feature'`).
5. Push to the branch (`git push origin feature-branch`).
6. Open a pull request.


---

Using phpMyAdmin for this project is highly recommended as it provides an intuitive web interface for managing MySQL databases. It simplifies the process of creating, modifying, and managing database schemas, tables, and data without the need for complex SQL commands. phpMyAdmin also offers features like import/export of databases, running SQL queries, and managing user permissions, making it an ideal tool for setting up and maintaining the DigiLibrary database efficiently.
