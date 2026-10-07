USE cybertracker;

CREATE TABLE incidents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    category VARCHAR(50) NOT NULL,
    severity VARCHAR(20) NOT NULL,
    status VARCHAR(20) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO incidents (title, category, severity, status, description) VALUES
(
    'Suspicious login attempt',
    'Unauthorized Access',
    'High',
    'Open',
    'Several unauthorized login attempts were detected.'
),
(
    'Phishing email received',
    'Phishing',
    'Medium',
    'Open',
    'A suspicious email containing a potentially malicious link was reported.'
),
(
    'Malware detected',
    'Malware',
    'High',
    'Resolved',
    'Malware was detected and removed from a workstation.'
),
(
    'Sensitive data exposure',
    'Data Leak',
    'High',
    'Resolved',
    'Sensitive company information was accidentally exposed.'
),
(
    'Unusual network activity',
    'Other',
    'Low',
    'Open',
    'Unusual network activity was detected and is being investigated.'
);