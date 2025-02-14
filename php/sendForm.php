<?php
session_start();
require_once('questions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answers = $_POST['answers'];

    foreach ($_SESSION['current_question']['questions'] as $index => $question) {
        $correct = $question['correct_answer']; // правильный ответ
        $user_answer = trim($answers[$index]); // ответ пользователя

        $is_correct = (strtolower($user_answer) == strtolower($correct));

        // результат
        $_SESSION['current_question']['results'][$index] = $is_correct;

        // ответ пользователя
        $_SESSION['current_question']['answers'][$index] = $user_answer;
    }
    header('Location: ../index.php');
    exit;
}