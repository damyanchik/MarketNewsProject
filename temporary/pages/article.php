<?php
    $row = $this->db->getRecords(DatabaseProperties::ARTICLESTAB_NAME, DatabaseProperties::ARTICLESTAB_ID, $_GET['article']);
    $rowsCom = $this->db->getRecords(DatabaseProperties::COMMENTSTAB_NAME, DatabaseProperties::COMMENTSTAB_ARTICLE_ID, $_GET['article']);
    ?>
<main>
    <article class="article-view">
        <h2><?php echo $row[0]['article_title']; ?></h2>
        <h3><?php echo $row[0]['article_header']; ?></h3>
        <p><?php echo $row[0]['article_content']; ?></p>
        <p class="article-details"><?php echo 'Data utworzenia:' . ' ' . $row[0]['article_createddate']; ?></p>
        <p class="article-details"><?php echo 'Autor tekstu:' . ' ' . $row[0]['article_author']; ?></p>
    </article>
    <form method="post" class="create-comment">
        <p>Dodaj komentarz do artykułu:</p>
        <textarea name="commentField">Komentarz</textarea>
        <button type="submit" name="createComment">Dodaj komentarz</button>
    </form>
    <?php for ($i = (count($rowsCom) - 1); $i >= 0; $i--) { ?>
    <div class="comment-list">
        <?php $rowsUsers = $this->db->getRecords(DatabaseProperties::USERSTAB_NAME, DatabaseProperties::USERSTAB_ID, $rowsCom[$i]['comment_author_id']); ?>
        <h4>
            <?php echo 'Autor: ' . $rowsUsers[0]['user_login'] . ' Data: ' . $rowsCom[$i]['comment_createddate'];
            if ($rowsUsers[0]['user_login'] === $_SESSION['login']) {
                echo ' ' . '<form method="post"><button name="deleteComment" value="' . $rowsCom[$i]['comment_id'] . '">Usuń</button></form>';
            } ?>
        </h4>
        <p><?php echo $rowsCom[$i]['comment_content'];  ?></p>
    </div>
    <?php } ?>
</main>

