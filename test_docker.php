docker run -it \
   -p  "3306:3306" \
   -e "MYSQL_DATABASE=my_new_database" \
   -e "MYSQL_USER=Olena" \
   -e "MYSQL_PASSWORD=123" \
   -e "MYSQL_RANDOM_ROOT_PASSWORD=yes" \
   --name learn-mysql \
    mysql:8




<!--CREATE TABLE calculator_history (-->
<!--    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,-->
<!--    command VARCHAR(255) NOT NULL,-->
<!--    left_operand VARCHAR(255) DEFAULT NULL,-->
<!--    right_operand VARCHAR(255) DEFAULT NULL,-->
<!--    result VARCHAR(255) NOT NULL-->
<!--);-->




<!--$_SERVER localhost:8080-->
<!---->
<!--print $_SERVER['REQUEST_METHOD'].' '.$_SERVER['REQUEST_URI'].'<br/><br>';-->
<!---->
<!--foreach ($_SERVER as $key => $value){-->
<!--    if (strpos($key, 'HTTP_') === 0) {-->
<!--        $key = substr($key, 5);-->
<!--        print $key.': '.$value.'<br/>';-->
<!--    }-->
<!--}-->