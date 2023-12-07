CREATE DATABASE dolphin_crm;

USE dolphin_crm;

CREATE TABLE Users(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(55) NOT NULL,
    lastname VARCHAR(55) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    role VARCHAR(55) NOT NULL,
    created_at DATETIME NOT NULL
);

CREATE TABLE Contacts(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(55),
    firstname VARCHAR(55),
    lastname VARCHAR(55),
    email VARCHAR(255),
    telephone VARCHAR(55),
    company VARCHAR(55),
    type VARCHAR(55) CHECK (type IN ('Sales Lead', 'Support')),
    assigned_to INT,
    created_by INT,
    created_at DATETIME,
    updated_at DATETIME,
    FOREIGN KEY (assigned_to) REFERENCES Users(id),
    FOREIGN KEY (created_by) REFERENCES Users(id)
);

CREATE TABLE Notes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    contact_id INT,
    comment TEXT,
    created_by INT,
    created_at DATETIME,
    FOREIGN KEY (created_by) REFERENCES Users(id)
);


INSERT INTO Users (firstname, lastname, password, email, role, created_at)
VALUES ('Admin', 'User', '$2y$10$QhxaZ1avJDxuPnfJ5LSwgeeyAtuFlv0kOJx32SyqjxWa1rivxq0qu', 'admin@project2.com', 'admin', NOW());