<?php
session_start(); // Начало сессии для работы с Cookies

// Функция для валидации ФИО
function validate_fullname($fullname)
{
    // Паттерн для проверки ФИО: только буквы, пробелы и дефисы, не более 150 символов
    $pattern = "/^[a-zA-Zа-яА-ЯёЁ\s-]{1,150}$/u";
    return preg_match($pattern, $fullname);
}

$errors = []; // Массив для хранения ошибок

// Проверка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Валидация ФИО
    if (empty($_POST['fullname']) || !validate_fullname($_POST['fullname'])) {
        $errors['fullname'] = 'Некорректное заполнение поля ФИО. Разрешены только буквы, пробелы и дефисы, не более 150 символов.';
    }

    // Проверка и валидация остальных полей формы

    // Если есть ошибки, сохраняем их в Cookies
    if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
        $_SESSION['form_values'] = $_POST; // Сохраняем введенные значения формы
        header('Location: form.php'); // Перенаправляем обратно на страницу с формой
        exit();
    } else {
        // Если ошибок нет, сохраняем значения формы в Cookies на один год
        setcookie('form_values', serialize($_POST), time() + 365 * 24 * 60 * 60, '/');
    }
} else {
    // При первом открытии формы проверяем, есть ли сохраненные значения в Cookies
    if (!empty($_COOKIE['form_values'])) {
        $_SESSION['form_values'] = unserialize($_COOKIE['form_values']);
    }
}
?>
