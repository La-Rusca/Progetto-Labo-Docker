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
    'Tentativo di accesso non autorizzato',
    'Accesso',
    'Alta',
    'Aperto',
    'Rilevati diversi tentativi di accesso non autorizzato.'
),
(
    'Email di phishing',
    'Phishing',
    'Media',
    'In analisi',
    'Un dipendente ha ricevuto una email sospetta contenente un link malevolo.'
),
(
    'Malware rilevato',
    'Malware',
    'Critica',
    'Risolto',
    'Rilevato e rimosso un malware da una workstation aziendale.'
),
(
    'Scansione della rete',
    'Network',
    'Bassa',
    'Chiuso',
    'Rilevata una scansione delle porte proveniente da un indirizzo esterno.'
);