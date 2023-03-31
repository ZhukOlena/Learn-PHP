CREATE TABLE calculator_histories (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    command VARCHAR(255) NOT NULL,
    left_operand VARCHAR (255) DEFAULT NULL,
    right_operand VARCHAR (255) DEFAULT NULL,
    result VARCHAR (255) NOT NULL
);

INSERT INTO calculator_histories (command, left_operand, right_operand, result) VALUES ("sub", "5", "6", "30");
