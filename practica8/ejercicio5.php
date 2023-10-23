<?php

use Mailer\Mailer;
require 'Mailer.php';

$mailer = new Mailer();

$mailer->send("limonmagico1@gmail.com","pruebasdamdaw@gmail.com","limonmagico1@gmail.com","MockupdePortfolioAlejandro.pdf");

$mailer->send("limonmagico1@gmail.com","limonmagico1@gmail.com");