CREATE DATABASE IF NOT EXISTS library_db;

USE library_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'staff') DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(20) UNIQUE,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(100),
    publisher VARCHAR(100),
    year YEAR,
    stock INT DEFAULT 0,
    description TEXT,
    cover_image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nis_nip VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    class_dept VARCHAR(50),
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS loans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    member_id INT,
    book_id INT,
    loan_date DATE NOT NULL,
    due_date DATE NOT NULL,
    return_date DATE,
    status ENUM('borrowed', 'returned') DEFAULT 'borrowed',
    fine DECIMAL(10, 2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (member_id) REFERENCES members (id),
    FOREIGN KEY (book_id) REFERENCES books (id)
);

-- Default Admin: username 'admin', password 'admin123'
INSERT INTO
    users (
        username,
        password,
        name,
        role
    )
VALUES (
        'admin',
        '$2y$10$pvLtWWWkK1HfyVOw.cs05OGo9aHFlOHg.bkjzvgsB6txLm6ICP6BS',
        'Administrator',
        'admin'
    );