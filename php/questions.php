<?php
session_start();

if (!isset($_SESSION['current_question'])) {
    $questions = [
        [
            'question' => 'Какая функция используется для округления числа до ближайшего целого?',
            'correct_answer' => 'round()'
        ],
        [
            'question' => 'Какая функция проверяет, является ли переменная массивом?',
            'correct_answer' => 'is_array()'
        ],
        [
            'question' => 'Какая функция выводит информацию о переменной, включая ее тип и значение?',
            'correct_answer' => 'var_dump()'
        ],
        [
            'question' => 'Какая функция преобразует строку в нижний регистр?',
            'correct_answer' => 'strtolower()'
        ],
        [
            'question' => 'Какая функция заменяет часть строки другой строкой?',
            'correct_answer' => 'str_replace()'
        ],
        [
            'question' => 'Какая функция разбивает строку на массив, используя разделитель?',
            'correct_answer' => 'explode()'
        ],
        [
            'question' => 'Какая функция удаляет пробелы в начале и конце строки?',
            'correct_answer' => 'trim()'
        ],
        [
            'question' => 'Какая функция добавляет один или несколько элементов в конец массива?',
            'correct_answer' => 'array_push()'
        ],
        [
            'question' => 'Какая функция удаляет последний элемент из массива?',
            'correct_answer' => 'array_pop()'
        ],
        [
            'question' => 'Какая функция открывает файл для чтения или записи?',
            'correct_answer' => 'fopen()'
        ],
        [
            'question' => 'Какая функция преобразует строку даты и времени в метку времени Unix?',
            'correct_answer' => 'strtotime()'
        ],
        [
            'question' => 'Какая функция форматирует метку времени в строку в соответствии с указанным форматом?',
            'correct_answer' => 'date()'
        ],
        [
            'question' => 'Какая функция возвращает массив, содержащий ключи массива?',
            'correct_answer' => 'array_keys()'
        ],
        [
            'question' => 'Какая функция фильтрует элементы массива, используя callback-функцию?',
            'correct_answer' => 'array_filter()'
        ],
        [
            'question' => 'Какая функция используется для создания каталога (папки)?',
            'correct_answer' => 'mkdir()'
        ],
        [
            'question' => 'Какая функция используется для удаления каталога?',
            'correct_answer' => 'rmdir()'
        ],
    ];

    $_SESSION['current_question'] = [
        'questions' => [],
        'answers' => [],
        'results' => []
    ];
    $_SESSION['current_question']['questions'] = getRandomQuestion($questions);
}

function getRandomQuestion($questions) {
    $arrQuestions = [];
    $keys = array_keys($questions);
    
    $random_keys = array_rand($keys, 5);

    if (!is_array($random_keys)) {
        $random_keys = [$random_keys];
    }

    foreach ($random_keys as $key) {
        $arrQuestions[] = $questions[$key];
    }

    return $arrQuestions;
}
