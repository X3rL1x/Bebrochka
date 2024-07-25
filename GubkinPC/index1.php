<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GubkinPC</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="index.html" class="logo">
                <h1 >GubkinPC</h1>
            </a>
			<button id="menu-button" style="margin-bottom: 30px;"><></button>

    <div id="menu" class="hidden">
        <ul>
            <li><a href="index.html">Главная</a></li>
            <li><a href="index2.html">О нас</a></li>
            <li><a href="#">Обратная связь и покупки</a></li>
			<li><a href="index3.html">Ассортимент</a></li>
        </ul>
    </div>
    <script src="script1.js"></script>
        </div>
	 <main>
        <section class="feedback">
            <div class="container">
                <h2>Обратная связь или покупка</h2>
                <form action="rec.php" method="post">
                    <div class="form-group">
                        <label for="name">Ваше имя:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Ваш email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Ваше сообщение:</br>(Если пишите по поводу покупки, то укажите адресс и модель ПК, наш менеджер свяжется с вами)</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="button">Отправить</button>
                </form>
            </div>
        </section>
	<?php
		$link = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link, "Obr");

		$sql="SELECT name, email, message FROM Obrsv1";
		$result=mysqli_query($link, $sql);

		while ($line=mysqli_fetch_row($result)) {
		echo "<b>Имя:</b>".$line[0]."<br>";
		echo "<b>Email:</b>".$line[1]."<br>";
		echo "<b>Сообщение:</b>".$line[2]."<br><br>";
		}
	?>
    </main>

    <footer>
		<div class="container">
            <p>GubkinPC.com 2024</p>
        </div>
    </footer>
</body>
</html>
