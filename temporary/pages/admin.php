<div class="panel-window">
    <h2>Panel administratora</h2>
    <div class="panel-box">
        <div class="panel-options">
            <a href="?action=admin&adminpanel=home">
                <button type="button">Strona główna</button>
            </a>
            <a href="?action=admin&adminpanel=articles">
                <button type="button">Artykuły</button>
            </a>
            <a href="?action=admin&adminpanel=users">
                <button type="button">Użytkownicy</button>
            </a>
        </div>
        <div class="panel-field">
            <?php
                require_once("temporary/adminpanel/{$page['adminpanel']}.php");
            ?>
        </div>
    </div>
</div>