-- 1. CREATE DATABASE
CREATE DATABASE KUIS;

-- 1.5 CONNECT TO A DATABASE

USE db_masjid;


-- 2. CREATE TABLE
CREATE TABLE tbl_akun(
    id_admin INT(30) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_admin)
);


-- 4. CREATE TABLE WITH FOREIGN KEY
CREATE TABLE tbl_keuangan(
    id_keuangan INT(30) NOT NULL AUTO_INCREMENT,
    id_admin INT(30) NOT NULL,
    tipe_organisasi VARCHAR(30) NOT NULL,
    tipe_pencatatan VARCHAR (30) NOT NULL,
    tanggal DATE NOT NULL,
    keterangan VARCHAR(255) NOT NULL,
    nominal INT(30) NOT NULL,
    berkas VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_keuangan),
    FOREIGN KEY (id_admin) REFERENCES tbl_akun(id_admin)
);


-- 3. INSERT DATA TO TABLE
INSERT INTO PEMBELI
    (EMAIL, NAMA_PEMBELI, ALAMAT)
VALUES
    ('ajengl@yahoo.com', 'Ajeng', 'Yogyakarta'),
    ('Ayuannisa@gmail.com', 'Ayu', 'Bandung'),
    ('budi123@gmail.com', 'Budi', 'Yogyakarta'),
    ('dmsputra90@gmail.com', 'Dimas', 'Surabaya'),
    ('Step1191@yahoo.com', 'Stefani', 'Jakarta'),
    ('ucokkk@gmail.com', 'Ucok', 'Bandung');

INSERT INTO PROMO
    (TANGGAL, KODE_PROMO, DISKON)
VALUES
    ('2019-10-30', 'IF018', '10000'),
    ('2019-11-10', 'TI019', '5000'),
    ('2019-12-30', 'UPN18', '15000');

INSERT INTO DESTINASI
    (KODE_DESTINASI, NAMA_DESTINASI, HARGA, ALAMAT)
VALUES
    ('01', 'Candi Borobudur', '50000', 'Magelang'),
    ('02', 'Danau Toba', '30000', 'Sumatra Utara'),
    ('03', 'Monas', '25000', 'Jakarta'),
    ('04', 'Pantai Kuta', '20000', 'Bali');

INSERT INTO PEMBELIAN
    (EMAIL, KODE_DESTINASI, JUMLAH_TIKET, KODE_PROMO)
VALUES
    ('ajengl@yahoo.com', '01', '3', 'UPN18'),
    ('ucokkk@gmail.com', '04', '1', 'TI019'),
    ('Ayuannisa@gmail.com', '03', '1', 'TI019'),
    ('dmsputra90@gmail.com', '01', '1', 'TI019'),
    ('Step1191@yahoo.com', '03', '1', 'IF018'),    
    ('budi123@gmail.com', '02', '2', 'IF018');


-- 5. SHOW STRUCTURE OF A TABLE
DESC PEMBELI;


-- 6. SELECT / SHOW ALL DATA FROM A TABLE
SELECT * FROM PEMBELI;
SELECT * FROM PROMO;
SELECT * FROM DESTINASI;
SELECT * FROM PEMBELIAN;


-- 7. SHOW SOME SPECIFIC DATA FROM A TABLE
SELECT EMAIL, NAMA_PEMBELI FROM PEMBELI;


-- 8. SHOW SOME DATA AND GIVE ALIASES FROM A TABLE
SELECT NAMA_DESTINASI AS "Nama Destinasi", HARGA AS "Harga", ALAMAT AS "Alamat Destinasi" 
FROM DESTINASI;


-- 9. SHOW DATA WITH ARITMATHICS
SELECT KODE_PROMO, (DISKON + 5000) FROM PROMO;


-- 10. SHOW DATA WITH ARITHMATHICS AND GIVE ALIASES
SELECT
    NAMA_DESTINASI AS "Nama Destinasi",
    HARGA AS "Harga",
    (HARGA - 10000) AS "Harga Diskon"
FROM DESTINASI, PROMO;


-- 11. ADD AN COLUMN TO A TABLE
ALTER TABLE PEMBELI 
ADD no_hp VARCHAR(20);


-- 12. RENAME A COLUMN IN A TABLE
ALTER TABLE PEMBELIAN
CHANGE COLUMN JUMLAH_TIKET TIKET INT;


-- 13. MODIFY DATATYPE OF A COLUMN IN A TABLE
ALTER TABLE PEMBELI
MODIFY COLUMN NAMA_PEMBELI VARCHAR(30);


-- 14. RENAME A TABLE IN A DATABASE
ALTER TABLE PROMO
RENAME TO DISKON;

SELECT * FROM DISKON;


-- 15. DELETE A COLUMN IN A TABLE
ALTER TABLE PEMBELI
DROP COLUMN no_hp;