<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, был ли отмечен чекбокс согласия на обработку персональных данных
    if (isset($_POST['consent']) && $_POST['consent'] == 'yes') {
        // Получение данных из формы
        $name = $_POST['fio'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $tel = $_POST['phone'];
        $comment = $_POST['comment'];

        // Формирование сообщения
        $subject = "Сообщение от $name $lastname";
        $message = "Имя: $name\n";
        $message .= "Email: $email\n";
        $message .= "Телефон: $tel\n";
        $message .= "Комментарий: $comment\n";

        // Отправка сообщения на почту
        $to = "test@test.ru"; // Укажите ваш email здесь
        $headers = "From: $email";


        if (mail($to, $subject, $message, $headers)) {
            // echo "Ваше сообщение принято.";
            header("Location: ../success.html");
            // exit;
        } else {
            // echo "При отправке сообщения произошла ошибка.";
            header("Location: ../error.html");
            // exit; 
        }
    } else {
        // echo "Пожалуйста, отметьте согласие на обработку персональных данных.";

    }
}
