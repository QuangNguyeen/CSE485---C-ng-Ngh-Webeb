CREATE DATABASE QLSV;
USE QLSV;
CREATE TABLE STUDENT(
                        ID VARCHAR(10) PRIMARY KEY ,
                        NAME NVARCHAR(255),
                        CLASS VARCHAR(10),
                        ADDRESS NVARCHAR(100)
);
INSERT INTO STUDENT VALUES
                        ('2251172228', N'NGÔ QUANG ANH', '64KTPM2', N'HAI BÀ TRƯNG'),
                        ('2251172238', N'NGUYỄN XUÂN ANH', '64KTPM2', N'MÊ LINH'),
                        ('2251172391', N'NGUYỄN MINH KHOA', '64KTPM2', N'ỨNG HOÀ'),
                        ('2251172466', N'NGUYỄN VĂN QUANG', '64KTPM2', N'CHƯƠNG MỸ'),
                        ('2251172551', N'CHU XUÂN TÙNG', '64KTPM2', N'CẦU GIẤY'),
                        ('2251172555', N'ĐỖ QUỐC VIỆT', '64KTPM2', N'THƯỜNG TÍN');

SELECT * FROM STUDENT;

