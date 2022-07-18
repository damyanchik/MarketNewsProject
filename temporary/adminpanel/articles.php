<?php
    $row = $this->db->getRecords(ArticlesTable::NAME);
    $editID = $_POST['selectArticle'] ?? null;
if (isset($_POST['sendArticle']) || isset($_POST['deleteRecord'])) {
    header('refresh: 0');
}

if (isset($_POST['deleteArticle'])) {
    echo '<h2>Czy chcesz usunąć pozycję o ID:' . $_POST['deleteArticle'] . '?</h2>';
    echo '<form method="post"><button name="deleteRecord" type="submit" value="' . $_POST['deleteArticle'] . '">Tak</button><button>Nie</button></form>';
}

if (isset($_POST['newArticle']) || isset($_POST['selectArticle'])) {
?>
<h2>
    <?php
        if (isset($_POST['newArticle'])) {
            echo 'Nowy artykuł';
            $buttonName = 'sendArticle';
            $titleValue = $headerValue = $tagValue = $contentValue = $idValue = null;
        } else if (isset($_POST['selectArticle'])) {
            echo 'Edycja artykułu';
            $buttonName = 'editArticle';
            $editArticle = $this->db->getRecords(ArticlesTable::NAME, UsersTable::ID_COLUMN, $editID);
            $titleValue = $editArticle[0]['article_title'];
            $headerValue = $editArticle[0]['article_header'];
            $tagValue = $editArticle[0]['article_tag'];
            $contentValue = $editArticle[0]['article_content'];
            $idValue = $editArticle[0]['article_id'];
        }
    ?>
</h2>

<div class="article-field">
    <form method="post" class="article-editor">
        <label>Tytuł artykułu:</label>
        <input type="text" name="articleTitle" <?php echo 'value="' . $titleValue . '"'; ?>>
        <label>Nagłówek artykułu:</label>
        <input type="text" name="articleHeader" <?php echo 'value="' . $headerValue . '"'; ?>>
        <label>Tag artykułu:</label>
        <select name="articleTag">
            <option value="country"><?php echo $tagValue; ?></option>
            <option value="country">country</option>
            <option value="world">world</option>
            <option value="business">business</option>
            <option value="policy">policy</option>
            <option value="trends">trends</option>
            <option value="finances">finances</option>
            <option value="investments">investments</option>
        </select>
        <label>Tekst artykułu</label>
        <textarea name="articleContent" ><?php echo $contentValue; ?></textarea>
        <button type="submit" name="<?php echo $buttonName; ?>" class="button-send-article" <?php echo 'value="' . $idValue . '"'; ?>>Wyślij</button>
    </form>
</div>
<?php } ?>
<h2>Działania na artykułach</h2>

<div class="articles-panel">
    <div class="articles-header">
        <form method="post" class="search-article">
            <input type="text">
            <button>Szukaj</button>
        </form>
        <form method="post">
            <button type="submit" name="newArticle">Stwórz artykuł</button>
        </form>
    </div>
    <table>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Artykuł</th>
            <th>Autor</th>
            <th>Tag</th>
            <th>Data edycji</th>
            <th>Data utworzenia</th>
        </tr>
        <?php for ($i = 0; $i < count($row); $i++) { ?>
            <tr>
                <td>
                    <form method="post">
                        <button type="submit" name="deleteArticle" title="Usuwanie artykułu" value=" <?php echo $row[$i]['article_id']; ?> ">
                            <img src="images/delete.svg">
                        </button>
                        <button type="submit" name="selectArticle" title="Edycja artykułu" value=" <?php echo $row[$i]['article_id']; ?> ">
                            <img src="images/edit.svg">
                        </button>
                    </form>
                </td>
                <td>
                    <span>
                        <?php echo $row[$i]['article_id'] ?>
                    </span>
                </td>
                <td>
                    <span>
                        <?php echo $row[$i]['article_title'] ?>
                    </span>
                </td>
                <td>
                    <span>
                        <?php echo $row[$i]['article_author'] ?>
                    </span>
                </td>
                <td>
                    <span>
                        <?php echo $row[$i]['article_tag'] ?>
                    </span>
                </td>
                <td>
                    <span>
                        <?php echo $row[$i]['article_editeddate'] ?>
                    </span>
                </td>
                <td>
                    <span>
                        <?php echo $row[$i]['article_createddate'] ?>
                    </span>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>