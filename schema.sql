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
VALUES
('Admin', 'User', '$2y$10$QhxaZ1avJDxuPnfJ5LSwgeeyAtuFlv0kOJx32SyqjxWa1rivxq0qu', 'admin@project2.com', 'admin', NOW());
('Erin', 'Hannon', '$2y$10$HNwNv/ktleCuvS14N2uvN.iGx9wuQOvBo9LYi0ITpoXRuupc/NnSm', 'ehannon@project2.com', 'member', NOW()),
('John', 'Doe', '$2y$10$iGUgndyPrqV6UoQNCIhnp.y3HQ83XR27LYusCkCQfXER6JW68Oddy', 'jdoe@project2.com', 'member', NOW()),
('Mary', 'Jane', '$2y$10$kqfEAVnh/XEcf8SwDpRiZOREWKrb2LSaolJGkcQg8s7lrMCopYNkq', 'mjane@project2.com', 'member', NOW()),
('Andy', 'Bernard', '$2y$10$0ey9bD9NwiZvLKsnim5tbukNembY8rfqmmOhGzUGGWe7RO0tgJLQy', 'abernard@project2.com', 'member', NOW());


INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at)
VALUES
('Mr.', 'Michael', 'Scott', 'michael.scott@paper.co', '123-456-789', 'The Paper Company', 'Sales Lead', 2, 1, NOW(), NOW()),
('Mr.', 'Dwight', 'Shrute', 'dwight.schrute@paper.co', '987-654-321', 'The Paper Company', 'Support', 2, 2, NOW(), NOW()),
('Ms.', 'Pam', 'Beesley', 'pam.beesley@dunder.co', '234-567-890', 'Dunder Mifflin', 'Support', 3,1, NOW(), NOW()),
('Ms.', 'Angela', 'Martin', 'angela.martin@vance.co', '345-678-901', 'Vance Refrigeration', 'Sales Lead', 4,3, NOW(), NOW()),
('Ms.', 'Kelly', 'Kapoor', 'kelly.kapoor@vance.co', '456-789-012', 'Vance Refrigeration', 'Support', 5,3, NOW(), NOW()),
('Mr.', 'Jim', 'Halpert', 'jim.halpert@dunder.co', '567-890-123', 'Dunder Mifflin', 'Sales Lead', 4,5, NOW(), NOW());