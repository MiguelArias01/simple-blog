<?php
session_start();

$conn = new PDO("mysql:host=localhost;dbname=blog_page",
   "test", "test");