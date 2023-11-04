drop database covidDB;
create database covidDB;

CREATE TABLE Company(
Name        VARCHAR(100) NOT NULL,
Street        VARCHAR(100) NOT NULL,
City        VARCHAR(100) NOT NULL,
Province        VARCHAR(100) NOT NULL,
Postcode        VARCHAR(10),
PRIMARY KEY(Name)
);

CREATE TABLE Vaccine(
LotID        CHAR(6) NOT NULL,
ProductionDate        DATE,
ExpiryDate        DATE,
Doses        INTEGER,
CompanyName        VARCHAR(100) NOT NULL,
PRIMARY KEY(LotID),
FOREIGN KEY(CompanyName) REFERENCES Company(Name)
);

CREATE TABLE Patient(
OHIP        CHAR(10) NOT NULL,
FirstName        VARCHAR(100) NOT NULL,
LastName        VARCHAR(100) NOT NULL,
Birthday         DATE,
PRIMARY KEY(OHIP)
);

CREATE TABLE Spouse(
OHIP        CHAR(10) NOT NULL,
FirstName        VARCHAR(100) NOT NULL,
LastName        VARCHAR(100) NOT NULL,
PhoneNumber        VARCHAR(100) NOT NULL,
PartnerOHIP        CHAR(10) NOT NULL,
PRIMARY KEY(OHIP, PartnerOHIP),
FOREIGN KEY(PartnerOHIP) REFERENCES Patient(OHIP)
);

CREATE TABLE VaccinationSite(
Name        VARCHAR(300) NOT NULL,
Street        VARCHAR(100) NOT NULL,
City        VARCHAR(100) NOT NULL,
Province        VARCHAR(10) NOT NULL,
Postcode        VARCHAR(10),
PRIMARY KEY(Name)
);

CREATE TABLE Vaccination(
PatientOHIP       CHAR(10) NOT NULL,
VaccinationDate        DATE,
VaccinationTime        TIME,
VaccineID        CHAR(6) NOT NULL,
SiteName        VARCHAR(300) NOT NULL,
PRIMARY KEY(PatientOHIP,VaccinationDate,VaccineID,SiteName),
FOREIGN KEY (PatientOHIP) REFERENCES Patient(OHIP),
FOREIGN KEY (VaccineID) REFERENCES Vaccine(LotID),
FOREIGN KEY(SiteName) REFERENCES VaccinationSite(Name)
);

CREATE TABLE IsShippedTo(
LotID        CHAR(6) NOT NULL,
ClinicName        VARCHAR(300) NOT NULL,
PRIMARY KEY(LotID, ClinicName),
FOREIGN KEY (LotID) REFERENCES Vaccine(LotID),
FOREIGN KEY (ClinicName) REFERENCES VaccinationSite(Name)
);

CREATE TABLE HealthCareWorker(
Name        VARCHAR(300) NOT NULL,
ID        VARCHAR(100) NOT NULL,
SiteName        VARCHAR(300),
PRIMARY KEY(ID),
FOREIGN KEY(SiteName) REFERENCES VaccinationSite(Name)
);

CREATE TABLE WorkerCredentials(
WorkerID        VARCHAR(100) NOT NULL,
Credential        VARCHAR(100) NOT NULL,
PRIMARY KEY(WorkerID, Credential),
FOREIGN KEY(WorkerID) REFERENCES HealthCareWorker(ID)
);

CREATE TABLE MedicalPrctice(
Name        VARCHAR(300) NOT NULL,
PhoneNumber        VARCHAR(100) NOT NULL,
PRIMARY KEY(Name)
);

CREATE TABLE Doctor(
ID        VARCHAR(10) NOT NULL,
PRIMARY KEY(ID),
FOREIGN KEY(ID) REFERENCES HealthCareWorker(ID) ON DELETE CASCADE
);

CREATE TABLE Nurse(
ID        VARCHAR(10) NOT NULL,
PRIMARY KEY(ID),
FOREIGN KEY(ID) REFERENCES HealthCareWorker(ID) ON DELETE CASCADE
);



insert into Company values
('Pfizer','235 E 42nd St','New York','NY','10017'),
('Moderna','200 Technology Sq','Cambridge','MA','02139'),
('Astrazeneca','1 Francis Crick Avenue','Cambridge','UK','CB2 0AA'),
('Johnson & Johnson','199 Grandview Rd','Skillman','NJ','08558');

insert into Vaccine values
('AB0578', '2020-01-01', '2020-06-01', 60, 'Pfizer'),
('CD0578', '2020-01-01', '2020-06-01', 60, 'Pfizer'),
('EF0578', '2020-01-01', '2020-06-01', 40, 'Moderna'),
('GH0587', '2020-01-01', '2020-06-01', 70, 'Astrazeneca'),
('IJ0578', '2020-01-01', '2020-06-01', 100, 'Johnson & Johnson'),
('KL0578', '2020-01-01', '2020-06-01', 100, 'Johnson & Johnson');

insert into Patient values
('1234567890', 'Alisa', 'Morris', '1990-02-10'),
('2345678901', 'Ben', 'MacDonald', '1991-11-10'),
('3456789012', 'Chris', 'Li', '1999-02-14'),
('4567890123', 'David', 'Pen', '1988-10-01'),
('5678901234', 'Eve', 'Raven', '1999-06-07'),
('6789012345', 'Frank', 'Chen', '1990-09-16');

insert into Spouse values
('1122334455', 'Grank', 'Morris', '2265000205', '1234567890'),
('2233445566', 'Hanna', 'Wong', '4169978180', '2345678901'),
('3344556677', 'Iris', 'Park', '5198187346', '3456789012');

insert into VaccinationSite values
('Student Wellness Centre', '99 University Ave.', 'Kingston', 'ON', 'K7L 3N6'),
('Shoppers', '455 Princess St.', 'Kingston', 'ON', 'K7L 1C3'),
('General Hospital', '76 Stuart St', 'Kingston', 'ON', 'K7L 2V7');

insert into Vaccination values
('1234567890', '2021-01-01', '10:15:10', 'AB0578', 'Shoppers'),
('4567890123', '2021-12-01', '10:20:10', 'AB0578', 'Shoppers'),
('6789012345', '2021-12-13', null, 'AB0578', 'Shoppers');

insert into IsShippedTo values
('AB0578', 'Shoppers'),
('CD0578', 'Shoppers'),
('EF0578', 'Shoppers'),
('GH0587', 'General Hospital'),
('IJ0578', 'General Hospital');

insert into HealthCareWorker values
('Alice W', '1234567', null),
('Jason Y', '2345678', 'Student Wellness centre'),
('Flora Q', '3456789', 'Student Wellness centre'),
('Miki Z', '4567890', 'Student Wellness centre'),
('Clara F', '1106374', 'General Hospital'),
('Celia T', '1346776', 'General Hospital');

insert into WorkerCredentials values
('1234567', 'MD'),
('2345678', 'NP'),
('3456789', 'NP'),
('4567890', 'RN'),
('1106374', 'DO'),
('1346776', 'DO');

insert into MedicalPrctice values
('Amanda', '2265000205'),
('Bob', '4162326680'),
('Cindy', '5199987403');

insert into Doctor values
('1234567'),
('1106374'),
('1346776');

insert into Nurse values
('2345678'),
('3456789'),
('4567890');






