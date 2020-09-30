CREATE TABLE certification (
    certificationID INT(11) AUTO_INCREMENT NOT NULL,
    name VARCHAR(256) NOT NULL,
    type VARCHAR(256) NOT NULL,
    validity VARCHAR(256) NOT NULL,
    PRIMARY KEY (certificationID))
    ENGINE = INNODB;

CREATE TABLE station (
    stationID INT(11) AUTO_INCREMENT NOT NULL,
    name VARCHAR(256) NOT NULL,
    street VARCHAR(256) NOT NULL,
    city VARCHAR(256) NOT NULL,
    state VARCHAR(256) NOT NULL,
    zip VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
    radio_num INT(11) NOT NULL,
    PRIMARY KEY (stationID))
    ENGINE - INNODB;

CREATE TABLE account (
    accountID INT(11) AUTO_INCREMENT NOT NULL,
    username VARCHAR(256) NOT NULL,
    password VARCHAR(256) NOT NULL,
    PRIMARY KEY (accountID))
    ENGINE = INNODB;

CREATE TABLE position (
    positionID INT(11) AUTO_INCREMENT NOT NULL,
    title VARCHAR(256) NOT NULL,
    description VARCHAR(256) NOT NULL,
    PRIMARY KEY (position))
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
    email VARCHAR(256) NOT NULL,
    status VARCHAR(256) NOT NULL,
    positionID  INT(11) NOT NULL,
    accountID  INT(11) NOT NULL
    PRIMARY KEY (memberID),
    FOREIGN KEY (positionID) REFERENCES position(positionID),
    FOREIGN KEY (accountID) REFERENCES account(accountID))
    ENGINE = INNODB;

CREATE TABLE member_phone (
    memberID INT(11) NOT NULL,
    phone VARCHAR(256) NOT NULL,
    type VARCHAR(256) NOT NULL,
    FOREIGN KEY (memberID) REFERENCES member(memberID))
    ENGINE = INNODB;

CREATE TABLE user_station (
    memberID INT(11) NOT NULL,
    stationID INT(11) NOT NULL,
    FOREIGN KEY (memberID) REFERENCES member(memberID),
    FOREIGN KEY (stationID) REFERENCES station(stationID))
    ENGINE = INNODB;

CREATE TABLE user_action (
    memberID INT(11) NOT NULL,
    modifierID INT(11) NOT NULL,
    date DATE NOT NULL,
    action VARCHAR(256) NOT NULL,
    FOREIGN KEY (memberID) REFERENCES member(memberID),
    FOREIGN KEY (modifierID) REFERENCES member(memberID))
    ENGINE = INNODB;

CREATE TABLE user_certification (
    memberID INT(11) NOT NULL,
    certificateID INT(11) NOT NULL,
    expiration DATE NOT NULL,
    FOREIGN KEY (memberID) REFERENCES member(memberID),
    FOREIGN KEY (certificationID) REFERENCES certification(certificateID)))
    ENGINE = INNODB;