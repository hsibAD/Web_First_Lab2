<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="">
<link rel="shortcut icon" href="#">
<title>God of Web 1</title>

<style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Roboto';
        }

        body {
            font-family: 'Roboto';
            background: #E6D5B9;
        }

        .header {
            height: 155px;
            background-color: #4E3835;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .title {
            font-weight: bold;
            font-size: 48px;
            line-height: 56px;
            text-align: center;
            text-transform: uppercase;
            color: #E6D5B9;
        }

        img {
            max-width: 400px;
            height: auto;
            border: 3px solid #4E3835;
        }

        .container {
            padding: 50px 150px 50px 150px;
        }

        .block {
            display: flex;
        }

        .block_title {
            font-weight: 300;
            font-size: 36px;
            line-height: 42px;
            text-align: left;
            margin-bottom: 22px;
            color: #4E3835;
            font-family: 'Roboto';
        }

        .block_description {
            font-weight: 500;
            font-size: 18px;
            line-height: 25px;
            color: #4E3835;
            font-family: 'Roboto';
        }

        .block_text_left {
            padding-left: 50px;
        }

        .line {
            width: 184px;
            height: 5px;
            background-color: #4E3835;
            margin: 50px auto;
        }

        .block_text_right {
            padding-right: 50px;
        }

        .right {
            text-align: right;
        }
        .super_table{
            font-weight: 500;
            font-size: 18px;
            line-height: 25px;
            color: #4E3835;
            font-family: 'Roboto';
            border-color: #4E3835;
            background-color: #E6D5B9;
            margin-top: 10px;
            margin-left: 30px;
            margin-right: 70px;
            
        }
        .online{
            max-height: 100px;
            font-weight: 500;
            font-size: 18px;
            line-height: 25px;
            color: #4E3835;
            font-family: 'Roboto';
            border-color: #4E3835;
            background-color: #E6D5B9;
            margin-top: 10px;
            margin-left: 30px;
            margin-right: 70px;
        }

        form {
            padding-top: 20px;
        }

        fieldset {
            padding: 10px 0px 20px 5px;
            margin-bottom: 20px;
        }

        input::placeholder {
            color: grey;
        }

        .rki {
            width: 80px;
            display: inline-block;
            cursor: pointer;
        }

        .x_button {
            cursor: pointer;
            min-width: 44px;
        }

        input[type="checkbox"] {
            cursor: pointer;
        }

        input[type="submit"] input[type="button"] button{
            cursor: pointer;
        }

        input[type="reset"] {
            cursor: pointer;
        }

        .rick {
            width: 80px;
            cursor: pointer;
        }

        .rick:hover {
            background-color: red;
        }


        table { 
            border-collapse: collapse; 
            border: 2px solid rgb(200, 200, 200); 
            letter-spacing: 1px; 
            font-size: 20px; 
        }

        td, th { 
            border: 1px solid rgb(190, 190, 190);
            padding: 10px 20px; 
        }

        th { 
            background-color:#E6D5B9;
        }

        td { 
            text-align: center; 
            background-color:#E6D5B9;
        }
        .against_the_current{
            padding-left: 120px;
            font-family: Robotic;
            color: #4E3835;
        }
        
    </style>

</head>
<body>
	<script
		src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#myForm').submit(function(form_listener) {
				form_listener.preventDefault();
				$.ajax({
					type : "POST",
					url : "script.php",
					data : $(this).serialize(),
					success : function(data) {
						$('#resulting_table').html(data);
					}
				});
			});
		});
	</script>	
    	<script type="text/javascript">
            function validate() {
            var x = document.getElementById("hidden_x").value;
            var y = document.forms["myForm"]["y"].value;
            if (isNaN(x)) {
                alert("Вы не выбрали X");
                return false;
            }
            if (String(y).length>5){
                alert("Вводите \"y\" с точностью не более 3х знаков после запятой");
                return false;
            }
            if (y <= -3 | y >= 3) {
                alert("Вы нарушили границы Y.");
                return false;
            }
            if (isNaN(y) | y == "" | y == null) {
                alert("Вы ввели не число в Y");
                return false;
            }
            if (getValue()) {
                return true;
            }
            return false;
        }


        function getValue() {
            var possibleAnswers = [-2, -1.5, -1, -0.5, 0, 1, 1.5, 2];
            var numbers = new Set(possibleAnswers)
            var checkboxes = document.querySelectorAll('.checker:checked');
            if(checkboxes.length===0){
                document.getElementById("currr").innerHTML = "";
                alert("Выберете R");
                return false;
            }
            if (checkboxes.length > 1) {
                alert("Нужно выбрать один радиус... Да, такое задание... Извините!");
                return false;
            }
            var checkedValue = document.querySelector('.checker:checked').value;
            return true;
        }

        function updateButton(value_button) {
            document.getElementById("hidden_x").value = value_button;
            document.getElementById("currx").innerHTML = value_button;
        }

        function updateText() {
            document.getElementById("curry").innerHTML = document.forms["myForm"]["y"].value;
        }

        function updateCheckbox() {
            if (getValue()) {
                document.getElementById("currr").innerHTML = document.querySelector('.checker:checked').value;
                document.getElementById("hidden_r").value = document.querySelector('.checker:checked').value;
            }
        }
        function cleaner(){
            document.getElementById("currr").innerHTML = "";
            document.getElementById("curry").innerHTML = "";
            document.getElementById("currx").innerHTML = "";
        }

	</script> 
    <header class="header">
        <h2 class="title">web of evil 1.0</h2>
    </header>
    <div class="container">
        <div class="block">
            <img src="task/Снимок экрана 2022-08-31 в 16.50.31.png" alt="My task">
            <div class="block_text_left">
            <p class="block_title">Вариант № 1006</p>
            <p class="block_description">Работу выполнил студент группы P32082 Дробыш Дмитрий Александрович, 333219
                ISU. Задание: Разработать PHP-скрипт, определяющий попадание точки на координатной плоскости в заданную
                область, и создать HTML-страницу, которая формирует данные для отправки их на обработку этому скрипту.
                Параметр R и координаты точки должны передаваться скрипту посредством HTTP-запроса. Скрипт должен
                выполнять валидацию данных и возвращать HTML-страницу с таблицей, содержащей полученные параметры и
                результат вычислений - факт попадания или непопадания точки в область. Предыдущие результаты должны
                сохраняться между запросами и отображаться в таблице.
                Кроме того, ответ должен содержать данные о текущем времени и времени работы скрипта.</p>
        </div>
    </div>
    <div class="line"></div>
    <div class="block">
        <div class="block_text_right">
            <p class="block_title right">
                Решение лабораторной работы
            </p>
            <p class="block_description">
                График добавлен в формате svg, создан при помощи Figma.com.
            </p>
            <form method="post" name="myForm" action="script.php" id="myForm">
                <fieldset>
                    <legend class="block_description">Выбор X</legend>
                    <div>
                        <input type="button" id="x_button1" value="-2" class="x_button" name="x"
                               onclick="return updateButton(value)">
                        <input type="button" id="x_button2" value="-1.5" class="x_button" name="x"
                               onclick="return updateButton(value)">
                        <input type="button" id="x_button3" value="-1" class="x_button" name="x"
                               onclick="return updateButton(value)">
                        <input type="button" id="x_button4" value="-0.5" class="x_button" name="x"
                               onclick="return updateButton(value)">
                        <input type="button" id="x_button5" value="0" class="x_button" name="x"
                               onclick="return updateButton(value)">
                        <input type="button" id="x_button6" value="0.5" class="x_button" name="x"
                               onclick="return updateButton(value)">
                        <input type="button" id="x_button7" value="1" class="x_button" name="x"
                               onclick="return updateButton(value)">
                        <input type="button" id="x_button8" value="1.5" class="x_button" name="x"
                               onclick="return updateButton(value)">
                        <input type="button" id="x_button9" value="2" class="x_button" name="x"
                               onclick="return updateButton(value)">
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="block_description">Выбор Y</legend>
                    <div>
                        <label for="y-text" class="block_description">Изменение Y:</label>
                        <input type="text" name="y" id="y-text" placeholder="(-3;3)" onkeyup="return updateText()">
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="block_description">Выбор R</legend>
                    <div class="r-choose">
                        <input type="checkbox" name="r" id="id="choice_check1" value="1" class="checker"
                               onclick="return updateCheckbox();">
                        <label class="rki" for="choice_check1"" class="block_description">R = 1</label>

                        <input type="checkbox" name="r" id="choice_check2" value="1.5" class="checker"
                               onclick="return updateCheckbox();">
                        <label class="rki" for="choice_check2"" class="block_description">R = 1.5</label>

                        <input type="checkbox" name="r" id="choice_check3" value="2" class="checker"
                               onclick="return updateCheckbox();">
                        <label class="rki" for="choice_check3" class="block_description">R = 2</label>

                        <input type="checkbox" name="r" id="choice_check4" value="2.5" class="checker"
                               onclick="return updateCheckbox();">
                        <label class="rki" for="choice_check4" class="block_description">R = 2.5</label>

                        <input type="checkbox" name="r" id="choice_check5" value="3" class="checker"
                               onclick="return updateCheckbox();">
                        <label class="rki" for="choice_check5" class="block_description">R = 3</label>
                    </div>
                    <div>
                        <input type="hidden" name="real_x" value="nichego" id="hidden_x">
                        <input type="hidden" name="real_r" value="nichego" id="hidden_r">
                </fieldset>
                <div>
                    <input type="submit" value="Проверить" id="submit_button"  name="submit" onclick="return validate()">
                    <input type="reset" value="Очистить форму" onclick="return cleaner()">
                    <button class="rick" type="button"
                            onclick="alert('!!!Never gonna give you up, never gonna let you down!!!')">Не нажимать
                    </button>
                </div>
            </form>
        </div>
        <img src="svg/view.svg" alt="FIGMA.COM">
    </div>
    <div class="line"></div>
    <div class="block">
        <table class="online">
            <tr>
                <th rowspan="2">Запрос</th>
                <th colspan="3">Значения переменных</th>
            </tr>
            <tr>
                <th>X</th>
                <th>Y</th>
                <th>R</th>
            </tr>
            <tr>
                <td>Текущий</td>
                <td id="currx"></td>
                <td id="curry"></td>
                <td id="currr"></td>
            </tr>
        </table>
		<div>
    		<div id="resulting_table"> 
    		<?php
    		$table_result = "<table id=\"main_table\" class=\"super_table\" border=\"3\"><tr><th>X:</th><th>Y:</th><th>R:</th><th>Попадание:</th><th>Время работы:</th></tr>";
            foreach ($_SESSION['history'] as $line) {
                $table_result.="<tr><td>$line[0]</td><td>$line[1]</td><td>$line[2]</td><td>$line[3]</td><td>$line[4]</td></tr>";
            }
                $table_result.="</table>";
                echo $table_result;
                ?> 
            </div>
		</div>
	</div>
</body>
</html>




