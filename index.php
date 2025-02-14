<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Оцените свои навыки PHP программирования! Наш тест по функциям PHP поможет вам выявить пробелы в знаниях и улучшить ваш код.">
    <title>Тест на знание функций PHP</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="media/logo_short.png" type="image/png">
</head>
<body>
    <header class="header wrapper">
        <a href="#">
            <img src="media/logo.png" class="logo" alt="PHPTEST">
        </a>
        <h1>Тест на знание функций PHP</h1>
    </header>
    <section class="formContainer wrapper">
        <?
        session_start();
        require_once('php/questions.php');
        if (empty($_SESSION['current_question']['results'])):
            ?>
            <p class="gray">Введите название функций с круглыми скобками (например, func())</p>
            <form method="POST" action ="php/sendForm.php" class="testForm">
                <?foreach($_SESSION['current_question']['questions'] as $index => $question):?>
                <div class="questionBlock">
                    <p><?= ($index + 1) . '. ' . $question['question'];?></p>
                    <label for="answer<?$index;?>">Ответ:</label>
                    <input type="text" id="answer<?$index;?>" class="inputAnswer" name="answers[<?=$index;?>]" required>
                </div>
                <?endforeach;?>
                <input type="submit" class="sbmButton accent-button" value="Проверить ответы">
            </form>
        <? else:?>
        <?
            $totalQuestions = count($_SESSION['current_question']['questions']);
            $correctAnswers = 0;

            foreach ($_SESSION['current_question']['results'] as $result) {
                if ($result) {
                    $correctAnswers++;
                }
            }
    
            $percentage = ($totalQuestions > 0) ? round(($correctAnswers / $totalQuestions) * 100) : 0;
        ?>
            <p>Ваш результат: <?=$percentage;?>%</p>
            <?foreach ($_SESSION['current_question']['questions'] as $index => $question):?>
            <div class="testForm questionBlock">
                <p><?=$question['question'];?></p>
                <p> Ваш ответ: 
                    <span class="<?=$_SESSION['current_question']['results'][$index] ? 'correct' : 'incorrect'; ?>">
                        <?=$_SESSION['current_question']['answers'][$index];?>
                    </span>
                </p>
            </div>
        <?
            endforeach;
            unset($_SESSION['current_question']);
        ?>
         
        <a href="index.php" class="accent-button">Пройти тест заново</a>
        <?endif;?>
    </section>
    <footer class="footer">
        <div class="wrapper">
            <p>© Е. А. Золотарева, 2024</p>
            <a href="#">
                <img src="media/logo.png" class="logo" alt="PHPTEST">
            </a>
        </div>
    </footer>
</body>
</html>
