CREATE TABLE IF NOT EXISTS kunden (
    Kunden_ID INT PRIMARY KEY,
    Vorname VARCHAR(255),
    Nachname VARCHAR(255),
    Kontaktdaten VARCHAR(255),
    Email VARCHAR(255),
    TelefonNummer VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS zimmer (
    Zimmer_Nummer INT PRIMARY KEY,
    Zimmertyp ENUM('Einzelzimmer', 'Doppelzimmer', 'Suite') NOT NULL,
    Details TEXT,
    Preis_pro_Nacht INT NOT NULL
);

CREATE TABLE IF NOT EXISTS buchungen (
    Buchungs_ID INT PRIMARY KEY,

    Zimmer_Nummer INT,
    Kunden_ID INT,
    Details TEXT,
    Startdatum DATE NOT NULL,
    Enddatum DATE NOT NULL,
    
    FOREIGN KEY (Zimmer_Nummer) REFERENCES zimmer(Zimmer_Nummer),
    FOREIGN KEY (Kunden_ID) REFERENCES kunden(Kunden_ID)
);

INSERT IGNORE INTO kunden (Kunden_ID, Vorname, Kontaktdaten, Email, TelefonNummer) 
VALUES 
    (1, 'Иван Петров', 'г. Москва, ул. Ленина, д. 10', 'ivan@example.com', '+7(901)123-45-67'),
    (2, 'Анна Сидорова', 'г. Санкт-Петербург, пр. Невский, д. 20', 'anna@example.com', '+7(902)234-56-78'),
    (3, 'Мария Иванова', 'г. Екатеринбург, ул. Мира, д. 15', 'maria@example.com', '+7(903)345-67-89');

INSERT IGNORE INTO zimmer (Zimmer_Nummer, Zimmertyp, Details, Preis_pro_Nacht) 
VALUES 
    (101, 'Einzelzimmer', 'Стандартный одноместный номер с видом на город', 5000),
    (102, 'Doppelzimmer', 'Стандартный двухместный номер с двуспальной кроватью', 8000),
    (201, 'Suite', 'Люкс с гостиной и спальней, вид на море', 15000);

INSERT IGNORE INTO buchungen (Buchungs_ID, Zimmer_Nummer, Kunden_ID, Details, Startdatum, Enddatum) 
VALUES 
    (1001, 101, 1, 'Бронирование на выходные', '2025-03-15', '2025-03-17'),
    (1002, 102, 2, 'Деловая поездка', '2025-03-20', '2025-03-25'),
    (1003, 201, 3, 'Романтический отдых', '2025-04-01', '2025-04-10');

CREATE OR REPLACE VIEW buchungenDetails AS
SELECT 
    b.Buchungs_ID,
    k.Vorname AS Kundenname,
    k.TelefonNummer,
    z.Zimmer_Nummer,
    z.Zimmertyp,
    z.Preis_pro_Nacht,
    b.Startdatum,
    b.Enddatum,
    DATEDIFF(b.Enddatum, b.Startdatum) AS Aufenthaltsdauer,
    z.Preis_pro_Nacht * DATEDIFF(b.Enddatum, b.Startdatum) AS Gesamtpreis
FROM 
    buchungen b
    JOIN kunden k ON b.Kunden_ID = k.Kunden_ID
    JOIN zimmer z ON b.Zimmer_Nummer = z.Zimmer_Nummer;