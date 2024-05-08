<?php

$connect = new PDO("mysql:host=localhost;dbname=root", "your_username", "your_password");

if (isset($_POST["user_name"], $_POST["user_review"], $_POST["rating_data"])) { // Check if all fields are set

    $user_name = $_POST["user_name"];
    $user_review = $_POST["user_review"];
    $rating_data = $_POST["rating_data"];

    $query = "
        INSERT INTO review_table 
        (user_name, user_rating, user_review, datetime) 
        VALUES (:user_name, :user_rating, :user_review, :datetime)
    ";

    $statement = $connect->prepare($query);

    $statement->execute(array(
        ':user_name' => $user_name,
        ':user_rating' => $rating_data,
        ':user_review' => $user_review,
        ':datetime' => time()
    ));

    echo "Your review & rating has been successfully submitted.";
    exit(); // Stop further execution
}

// Rest of your code for loading review data
