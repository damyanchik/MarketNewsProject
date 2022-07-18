<!DOCTYPE html>
<html lang="pl">
    <head>
        <link rel="stylesheet" href="public/style.css" type="text/css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Language" content="pl" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <title>Market.news</title>
    </head>

    <body>
        <header>
            <h1>Market.news</h1>
        </header>
            <nav>
                <p> <?php if (isset($_SESSION['person']) && ($_SESSION['person'] === 'User' xor $_SESSION['person'] === 'Admin'))
                        echo $_SESSION['login'] . ',' . ' ' . 'jesteś zalogowany!'; ?> </p>
                <div class="navigation-buttons">
                    <a href="?action=news">
                        <button class="news-button" type="button">NOWOŚCI</button>
                    </a>
                    <a href="?action=list&section=country">
                        <button type="button">KRAJ</button>
                    </a>
                    <a href="?action=list&section=world">
                        <button type="button">ŚWIAT</button>
                    </a>
                    <a href="?action=list&section=business">
                        <button type="button">BIZNES</button>
                    </a>
                    <a href="?action=list&section=policy">
                        <button type="button">POLITYKA</button>
                    </a>
                    <a href="?action=list&section=trends">
                        <button type="button">TRENDY</button>
                    </a>
                    <a href="?action=list&section=finance">
                        <button type="button">FINANSE</button>
                    </a>
                    <a href="?action=list&section=investments">
                        <button type="button">INWESTYCJE</button>
                    </a>
                </div>
                <div class="navigation-menu-button">
                    <button type="button">MENU</button>
                    <div class="menu-list">
                        <ul>
                            <a href="?action=search">
                                <li>
                                    Szukaj
                                </li>
                            </a>
                                <?php if (!isset($_SESSION['person'])) { ?>
                            <a href="?action=auth">
                                <li>
                                    Zaloguj się
                                </li>
                            </a>
                            <a href="?action=registration">
                                <li>
                                    Zarejestruj się
                                </li>
                            </a>
                                <?php } else if ($_SESSION['person'] === 'Admin') { ?>
                            <a href="?action=admin">
                                <li>
                                    Panel administratora
                                </li>
                            </a>
                                <?php } if (isset($_SESSION['person']) && ($_SESSION['person'] === 'User' xor $_SESSION['person'] === 'Admin')) { ?>
                            <a href="?action=settings">
                                <li>
                                    Ustawienia
                                </li>
                            </a>
                            <a href="?action=logout">
                                <li>
                                    Wyloguj się
                                </li>
                            </a>
                                <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        <div class="header-placeholder">
        </div>
            <?php
                require_once ("pages/{$page['action']}.php");
            ?>
    </body>
</html>