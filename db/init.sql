CREATE DATABASE IF NOT EXISTS university;
USE university;

-- ตาราง majors
CREATE TABLE majors (
    major_id INT AUTO_INCREMENT PRIMARY KEY,
    major_name VARCHAR(50) UNIQUE
);

-- ตาราง students
CREATE TABLE students (
    student_id CHAR(8) PRIMARY KEY,
    full_name VARCHAR(100),
    major_id INT,
    CONSTRAINT fk_major
        FOREIGN KEY (major_id)
        REFERENCES majors(major_id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);
