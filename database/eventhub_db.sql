CREATE DATABASE IF NOT EXISTS eventhub_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE eventhub_db;

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
);

CREATE TABLE events (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(180) NOT NULL,
    description TEXT NOT NULL,
    date DATE NOT NULL,
    venue VARCHAR(180) NOT NULL
);

CREATE TABLE attendees (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(120) NOT NULL,
    email VARCHAR(150) NOT NULL,
    contact VARCHAR(30) NOT NULL,
    course VARCHAR(120) NOT NULL,
    image VARCHAR(255) NOT NULL,
    event_id INT UNSIGNED NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL,
    CONSTRAINT fk_attendees_events FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);

CREATE INDEX idx_attendees_fullname ON attendees(fullname);
CREATE INDEX idx_attendees_email ON attendees(email);
CREATE INDEX idx_attendees_course ON attendees(course);
CREATE INDEX idx_attendees_created_at ON attendees(created_at);
CREATE INDEX idx_attendees_event_id ON attendees(event_id);

INSERT INTO users (name, email, password, created_at, updated_at) VALUES
('EventHub Admin', 'admin@eventhub.test', '$2y$10$Wemis7N8Iho0svI.1NwbTu8Lqp2I1qZY94ikeYRIc7/oo0sXwkfE2', NOW(), NOW());

INSERT INTO events (title, description, date, venue) VALUES
('Tech Innovation Summit', 'A showcase of student-built web, mobile, and cloud projects.', DATE_ADD(CURDATE(), INTERVAL 14 DAY), 'Main Auditorium'),
('Cybersecurity Bootcamp', 'Hands-on training on secure coding, XSS prevention, and CSRF defense.', DATE_ADD(CURDATE(), INTERVAL 21 DAY), 'Computer Laboratory 1'),
('Startup Pitch Night', 'Students pitch IT solutions to mentors and invited industry guests.', DATE_ADD(CURDATE(), INTERVAL 30 DAY), 'Innovation Hub'),
('Cloud Deployment Workshop', 'A guided session on deploying PHP applications to shared hosting.', DATE_ADD(CURDATE(), INTERVAL 40 DAY), 'AVR Room');
