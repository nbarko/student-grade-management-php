# Student Grade Management System

A PHP and MySQL-based web application for managing student grades. The application allows users to create, view, update and delete grade records through an intuitive web interface.

## Live Demo

This project was originally deployed on a personal hosting environment. The live demo is currently unavailable.

## Features

- Create new student grade records
- View all grades sorted by newest date
- Search grades by student name or subject
- Update existing grades
- Delete grades with confirmation
- Secure database communication using prepared statements
- Responsive user interface using Bootstrap

## Technologies

- PHP
- MySQL
- HTML5
- CSS3
- Bootstrap
- phpMyAdmin
- cPanel

## Project Structure

```
student-grade-management-php/
│
├── index.php               # Form for entering new grades
├── obdelava.php            # Processes and stores submitted grades
├── prikaz_ocen.php         # Displays grades, search and delete functionality
├── urejanje_ocen.php       # Edit grade form
├── shrani_urejanje.php     # Saves updated grades
├── izbris_ocen.php         # Deletes grade records
├── config.example.php      # Example database configuration
└── style.css               # Application styling
```

## Database Configuration

Create a `config.php` file based on `config.example.php` and enter your own database credentials.

Example:

```php
$host = "localhost";
$user = "your_database_user";
$pass = "your_database_password";
$dbname = "your_database_name";
```

## Database Schema

Create the following table in MySQL:

```sql
CREATE TABLE ocene (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vpisna VARCHAR(20) NOT NULL,
    student VARCHAR(100) NOT NULL,
    predmet VARCHAR(100) NOT NULL,
    datum DATE NOT NULL,
    ocena INT NOT NULL
);
```

## Project Purpose

This project was developed as part of the Web Programming course during my Bachelor's degree in Computer Science and Web Technologies.
