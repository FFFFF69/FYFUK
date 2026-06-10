<?php
function validateRegistration($data) {
if (empty($data['email'])) {
    return ['status' => false, 'message' => 'Поле "Email" обязательно для заполнения'];
    }
if (!str_contains($data['email'], '@')) {
    return ['status' => false, 'message' => 'Поле "Email" должно содержать символ "@"'];
    }
if (strlen($data['email']) <= 5) {
    return ['status' => false, 'message' => 'Поле "Email" должно содержать более 5 символов'];
    }
if (empty($data['password'])) {
    return ['status' => false, 'message' => 'Поле "Пароль" обязательно для заполнения'];
    }
if (strlen($data['password']) <= 8) {
    return ['status' => false, 'message' => 'Поле "Пароль" должно содержать более 8 символов'];
    }
if (!preg_match('/[a-zA-Z]/', $data['password']) || !preg_match('/[0-9]/', $data['password'])) {
    return ['status' => false, 'message' => 'Поле "Пароль" должно содержать буквы и цифры'];
    }
if (empty($data['repit_password'])) {
    return ['status' => false, 'message' => 'Поле "Подтверждение пароля" обязательно для заполнения'];
    }
if ($data['password'] !== $data['repit_password']) {
    return ['status' => false, 'message' => 'Пароль и подтверждение пароля не совпадают'];
    }
if (!empty($data['phone_number']) && strlen((string)$data['phone_number']) <= 5) {
    return ['status' => false, 'message' => 'Поле "Номер телефона" должно содержать более 5 цифр'];
    }
if (empty($data['name'])) {
    return ['status' => false, 'message' => 'Поле "Имя" обязательно для заполнения'];
    }
if (!preg_match('/^[a-zA-Zа-яА-Я]+$/u', $data['name'])) {
    return ['status' => false, 'message' => 'Поле "Имя" должно содержать только буквы'];
    }
if (!empty($data['came_from'])) {
    $allowed = ['site', 'city', 'tv', 'others'];
if (!in_array($data['came_from'], $allowed)) {
    return ['status' => false, 'message' => 'Поле "Откуда узнали" должно быть одним из: site, city, tv, others'];
    }
    }
if (empty($data['date_birth'])) {
    return ['status' => false, 'message' => 'Поле "Дата рождения" обязательно для заполнения'];
    }
$birth = new DateTime($data['date_birth']);
$today = new DateTime();
$age = $today->diff($birth)->y;
if ($age <= 15) {
    return ['status' => false, 'message' => 'Возраст должен быть больше 15 лет'];
    }
if ($age >= 67) {
    return ['status' => false, 'message' => 'Возраст должен быть меньше 67 лет'];
    }
    return ['status' => true, 'message' => 'Регистрация успешно завершена'];
}
$testData = [ /// данные можно изменить, добавлены для проверки валидности :)
    'email' => 'test@mail.ru',
    'password' => 'pass123456',
    'repit_password' => 'pass123456',
    'phone_number' => 123456,
    'name' => 'Анна',
    'came_from' => 'site',
    'date_birth' => '1990-05-20'
];
$result = validateRegistration($testData);
echo $result['status'] ? "Успех: " . $result['message'] : "Ошибка: " . $result['message'];