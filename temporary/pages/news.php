<?php
$rowN = $this->db->getRecords(ArticlesTable::NAME);
$rowC = $this->db->getRecords(ArticlesTable::NAME, ArticlesTable::TAG_COLUMN, ArticlesTable::TAG_COUNTRY);
$rowW = $this->db->getRecords(ArticlesTable::NAME, ArticlesTable::TAG_COLUMN, ArticlesTable::TAG_WORLD);
$rowB = $this->db->getRecords(ArticlesTable::NAME, ArticlesTable::TAG_COLUMN, ArticlesTable::TAG_BUS);
$rowP = $this->db->getRecords(ArticlesTable::NAME, ArticlesTable::TAG_COLUMN, ArticlesTable::TAG_POLICY);
$rowT = $this->db->getRecords(ArticlesTable::NAME, ArticlesTable::TAG_COLUMN, ArticlesTable::TAG_TRENDS);
$rowF = $this->db->getRecords(ArticlesTable::NAME, ArticlesTable::TAG_COLUMN, ArticlesTable::TAG_FIN);
$rowI = $this->db->getRecords(ArticlesTable::NAME, ArticlesTable::TAG_COLUMN, ArticlesTable::TAG_INVEST);
?>
<main>
    <div class="news-list">
        <section>
            <h3>NA CZASIE</h3>
            <article>
                <span>Sprawdź najnowsze informacje!</span>
                <ul>
                    <?php
                        for ($i = (count($rowN) - 1); $i >= $this->newsOrder($rowN); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowN[$i]['article_id'] . '"> > ' . $rowN[$i]['article_title'] . ' ' . $rowN[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowN[$i]['article_author'] . ' Data: ' . $rowN[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h4>KRAJ</h4>
            <article>
                <span>Aktualne informacje z kraju!</span>
                <ul>
                    <?php for ($i = (count($rowC) - 1); $i >= $this->newsOrder($rowC); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowC[$i]['article_id'] . '"> > ' . $rowC[$i]['article_title'] . ' ' . $rowC[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowC[$i]['article_author'] . ' Data: ' . $rowC[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h4>ŚWIAT</h4>
            <article>
                <span>Bądź na czasie z wiadomościami ze świata!</span>
                <ul>
                    <?php for ($i = (count($rowW) - 1); $i >= $this->newsOrder($rowW); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowW[$i]['article_id'] . '"> > ' . $rowW[$i]['article_title'] . ' ' . $rowW[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowW[$i]['article_author'] . ' Data: ' . $rowW[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h4>BIZNES</h4>
            <article>
                <span>Najświeższe wiadomości z biznesu!</span>
                <ul>
                    <?php for ($i = (count($rowB) - 1); $i >= $this->newsOrder($rowB); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowB[$i]['article_id'] . '"> > ' . $rowB[$i]['article_title'] . ' ' . $rowB[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowB[$i]['article_author'] . ' Data: ' . $rowB[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h4>POLITYKA</h4>
            <article>
                <span>Ważne wiadomości polityczne!</span>
                <ul>
                    <?php for ($i = (count($rowP) - 1); $i >= $this->newsOrder($rowP); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowP[$i]['article_id'] . '"> > ' . $rowP[$i]['article_title'] . ' ' . $rowP[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowP[$i]['article_author'] . ' Data: ' . $rowP[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h4>TRENDY</h4>
            <article>
                <span>O tym się teraz mówi!</span>
                <ul>
                    <?php for ($i = (count($rowT) - 1); $i >= $this->newsOrder($rowT); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowT[$i]['article_id'] . '"> > ' . $rowT[$i]['article_title'] . ' ' . $rowT[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowT[$i]['article_author'] . ' Data: ' . $rowT[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h4>FINANSE</h4>
            <article>
                <span>Wiadomości finansowe!</span>
                <ul>
                    <?php for ($i = (count($rowF) - 1); $i >= $this->newsOrder($rowF); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowF[$i]['article_id'] . '"> > ' . $rowF[$i]['article_title'] . ' ' . $rowF[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowF[$i]['article_author'] . ' Data: ' . $rowF[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h4>INWESTYCJE</h4>
            <article>
                <span>Nowe i planowane inwestycje!</span>
                <ul>
                    <?php for ($i = (count($rowI) - 1); $i >= $this->newsOrder($rowI); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowI[$i]['article_id'] . '"> > ' . $rowI[$i]['article_title'] . ' ' . $rowI[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowI[$i]['article_author'] . ' Data: ' . $rowI[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
    </div>
</main>

