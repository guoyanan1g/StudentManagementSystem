CREATE TABLE student(
	id INT NOT NULL PRIMARY KEY,
	name VARCHAR(20) NOT NULL,
	sex VARCHAR(10) NOT NULL,
	class INT NOT NULL,
	score INT NOT NULL,
	birthday int NOT NULL
)
CREATE TABLE admin( 
	username VARCHAR(20) NOT NULL PRIMARY KEY,
	password VARCHAR(20) NOT NULL,
	level VARCHAR(10) NOT NULL, 
	#管理员的权限分为root和normal，root可赋予、删除admin权限，normal即可管理学生
)


	
