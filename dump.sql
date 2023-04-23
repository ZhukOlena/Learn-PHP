DROP TABLE IF EXISTS blogs;

CREATE TABLE blogs (
                       id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                       created_at DATETIME NOT NULL,
                       title VARCHAR(255) NOT NULL,
                       preview TEXT NOT NULL,
                       content TEXT NOT NULL

);

INSERT INTO blogs (created_at, title, preview, content) VALUES ('1990-03-13 08:08:08', 'About my birthday', 'Tell you about me, my best day, and my family', 'My name is Olena. I am 33 years old. I live in very nice village all my childhood.' );
INSERT INTO blogs (created_at, title, preview, content) VALUES ('1991-05-22 09:09:09', 'about my husband life', 'Tell your about my husband, his hobbits and life.', 'His name is Vitalii. He is 32 years old. He was born in town Khmelnytskyi.');
