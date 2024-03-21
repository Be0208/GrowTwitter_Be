<?php
function findId($id, $users)
{
    foreach ($users as $user) {
        if ($user->getId() === $id) {
            return $user;
        }
    }
    return null;
}

require_once ("./models/user.php");
require_once ("./models/tweet.php");
require_once ("./data/tweet_data.php");
require_once ("./data/user_data.php");



$user1 = new User("Bernardo", "berna@berna.com", "Be__2417", "1");
$user2 = new User("Bianca", "bibi@bibi.com", "Andorinha", "123");
$user3 = new User("Guilherme", "guimer@guimer.com", "Guiumer_-S2", "123456");
$usersData[] = $user1;
$usersData[] = $user2;
$usersData[] = $user3;



$tweet1 = new Tweet("Olaaa mundo", $user1->getId());
$tweet2 = new Tweet("Funciona muito bem", $user2->getId());
$tweet3 = new Tweet("Palmeiras nao tem Mundial", $user3->getId());
$tweet4 = new Tweet("PHP é mto bom", $user1->getId());
$tweetsData[] = $tweet1;
$tweetsData[] = $tweet2;
$tweetsData[] = $tweet3;
$tweetsData[] = $tweet4;



$tweet4->addLike($user3->getId());
$tweet4->addLike($user2->getId());
$tweet4->addLike($user1->getId());
$tweet1->addLike($user2->getId());
$tweet3->addLike($user2->getId());
$tweet1->addLike($user3->getId());
$tweet2->addLike($user1->getId());
$tweet2->addLike($user3->getId());




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <div class="container">

        <?php foreach ($tweetsData as $tweet) : ?>
            <div class="tweet">
                <?php
                $user = findId($tweet->getUserId(), $usersData);
                $username = $user->getUsername();
                $content = $tweet->getContent();
                $likesString = $tweet->getLikes($usersData);
                ?>

                <span class="username">@<?php echo $username; ?></span>
                <p class="content"><?php echo $content; ?></p>

                <?php if (!empty($likesString)) : ?>
                    <p class="likes"><?php echo $likesString; ?></p>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>
