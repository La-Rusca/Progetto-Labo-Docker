CREATE TABLE IF NOT EXISTS incidents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    category VARCHAR(50) NOT NULL,
    severity VARCHAR(20) NOT NULL,
    status VARCHAR(20) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO incidents (title, category, severity, status, description) VALUES
('Suspicious login attempt', 'Unauthorized Access', 'Medium', 'Open', 'Multiple failed login attempts were detected.'),
('Phishing email reported', 'Phishing', 'High', 'Resolved', 'A malicious email was reported and removed.');