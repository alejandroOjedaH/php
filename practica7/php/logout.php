<?php
session_status();
session_destroy();

header("Location: ../index.php");
die;