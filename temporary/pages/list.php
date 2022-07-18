<?php
$row = $this->db->getRecords(ArticlesTable::NAME, ArticlesTable::TAG_COLUMN, $_GET['section']);
?>
<main>
    <div class="section-news">
        <section>
            <h4>SPIS ARTYKUŁÓW</h4>
            <article>
                <ul>
                    <?php for ($i = 0; $i < count($row); $i++) { ?>
                    <li>
                        <?php echo '<a href="?action=article&article=' . $row[$i]['article_id'] . '"> -> ' . $row[$i]['article_title'] . ' ' . $row[$i]['article_header'] . ' Autor: ' . $row[$i]['article_author'] . ' Data: ' . $row[$i]['article_createddate'] . '</a>'; ?>
                    </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
    </div>
</main>