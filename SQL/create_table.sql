CREATE TABLE certification (
    certificationID INT(11) AUTO_INCREMENT NOT NULL,
    name VARCHAR(256) NOT NULL,
    type VARCHAR(256) NOT NULL,
    validity VARCHAR(256) NOT NULL,
    PRIMARY KEY (certificationID))
    ENGINE = INNODB;

    CREATE TABLE member (
        memberID INT(11) AUTO_INCREMENT NOT NULL,
        fname VARCHAR(256) NOT NULL,
        mname VARCHAR(256),
        lname VARCHAR(256),
        street VARCHAR(256) NOT NULL,
        city VARCHAR(256) NOT NULL,
        state VARCHAR(256) NOT NULL,
        zip VARCHAR(256) NOT NULL,
        phone VARCHAR(256) NOT NULL,
        email VARCHAR(256) NOT NULL,
        position VARCHAR(256) NOT NULL,
        station VARCHAR(256) NOT NULL,
        radio_num VARCHAR(256) NOT NULL,
        account_password VARCHAR(256) NOT NULL,
        status VARCHAR(256) NOT NULL,
        PRIMARY KEY (memberID))
        ENGINE = INNODB;

CREATE TABLE user_certification (
    memberID INT(11) NOT NULL,
    certificationID INT(11) NOT NULL,
    earn DATE NOT NULL,
    expiration DATE NOT NULL,
    FOREIGN KEY (memberID) REFERENCES member(memberID),
    FOREIGN KEY (certificationID) REFERENCES certification(certificationID))
    ENGINE = INNODB;
