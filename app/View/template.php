<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../src/main.css">
    <link rel="stylesheet" href="../src/account.css">
    <title><?= $title; ?></title>
</head>
<body>
    <header>
        <div>
            <img src='' alt='logo'>
        </div>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/write-article">Wrtie article</a></li>
                <li><a href="/user/list">User list</a></li>
            </ul>
        </nav>
        <div class="sign-cta">
            <a href="/user/signin">Sign In</a>
            <a href="/user/signup">Sign Up</a>
        </div>
    </header>

    <main>
        <?= $content; ?>
    </main>

</body>
</html>