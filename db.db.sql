BEGIN TRANSACTION;
CREATE TABLE `section` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`num`	INTEGER
);
INSERT INTO `section` (id,num) VALUES (1,3);
CREATE TABLE `ans` (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`ans`	TEXT,
	`mark`	INTEGER
);
INSERT INTO `ans` (id,ans,mark) VALUES (1,'',1);
INSERT INTO `ans` (id,ans,mark) VALUES (2,'',1);
CREATE TABLE "2010" (
	`id`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`quest`	TEXT,
	`opt1`	TEXT,
	`opt2`	TEXT,
	`opt3`	TEXT,
	`opt4`	TEXT,
	`ans`	TEXT
);
INSERT INTO `2010` (id,quest,opt1,opt2,opt3,opt4,ans) VALUES (3,'What is my name','Toluwap','MOsunmola','Wale ','Femi','TOluwap');
INSERT INTO `2010` (id,quest,opt1,opt2,opt3,opt4,ans) VALUES (4,'What is my department?','EEE','MEE','CVE','MET','MEE');
COMMIT;
