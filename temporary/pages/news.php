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
                <img src="images/hot.svg" alt="Fire icon"><span>Sprawdź najnowsze informacje!</span>
                <ul>
                    <?php
                        for ($i = (count($rowN) - 1); $i >= $this->newsOrder($rowN); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowN[$i]['article_id'] . '"><h4>' . $rowN[$i]['article_title'] . '</h4> ' . $rowN[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowN[$i]['article_author'] . ' Data: ' . $rowN[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h3>KRAJ</h3>
            <article>
                <img src="images/buildings.svg" alt="Buildings icon"><span>Aktualne informacje z kraju!</span>
                <ul>
                    <?php for ($i = (count($rowC) - 1); $i >= $this->newsOrder($rowC); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowC[$i]['article_id'] . '"><h4>' . $rowC[$i]['article_title'] . '</h4> ' . $rowC[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowC[$i]['article_author'] . ' Data: ' . $rowC[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h3>ŚWIAT</h3>
            <article>
                <img src="images/globe.svg" alt="Globe icon"><span>Bądź na czasie z wiadomościami ze świata!</span>
                <ul>
                    <?php for ($i = (count($rowW) - 1); $i >= $this->newsOrder($rowW); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowW[$i]['article_id'] . '"><h4>' . $rowW[$i]['article_title'] . '</h4> ' . $rowW[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowW[$i]['article_author'] . ' Data: ' . $rowW[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h3>BIZNES</h3>
            <article>
                <img src="images/briefcase.svg" alt="Briefcase icon"><span>Najświeższe wiadomości z biznesu!</span>
                <ul>
                    <?php for ($i = (count($rowB) - 1); $i >= $this->newsOrder($rowB); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowB[$i]['article_id'] . '"><h4>' . $rowB[$i]['article_title'] . '</h4> ' . $rowB[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowB[$i]['article_author'] . ' Data: ' . $rowB[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h3>POLITYKA</h3>
            <article>
                <img src="images/building.svg" alt="Building icon"><span>Ważne wiadomości polityczne!</span>
                <ul>
                    <?php for ($i = (count($rowP) - 1); $i >= $this->newsOrder($rowP); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowP[$i]['article_id'] . '"><h4>' . $rowP[$i]['article_title'] . '</h4> ' . $rowP[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowP[$i]['article_author'] . ' Data: ' . $rowP[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h3>TRENDY</h3>
            <article>
                <img src="images/chart.svg" alt="Chart icon"><span>O tym się teraz mówi!</span>
                <ul>
                    <?php for ($i = (count($rowT) - 1); $i >= $this->newsOrder($rowT); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowT[$i]['article_id'] . '"><h4>' . $rowT[$i]['article_title'] . '</h4> ' . $rowT[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowT[$i]['article_author'] . ' Data: ' . $rowT[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h3>FINANSE</h3>
            <article>
                <img src="images/coins.svg" alt="Coins icon"><span>Wiadomości finansowe!</span>
                <ul>
                    <?php for ($i = (count($rowF) - 1); $i >= $this->newsOrder($rowF); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowF[$i]['article_id'] . '"><h4>' . $rowF[$i]['article_title'] . '</h4> ' . $rowF[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowF[$i]['article_author'] . ' Data: ' . $rowF[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
        <section>
            <h3>INWESTYCJE</h3>
            <article>
                <img src="images/bank.svg" alt="Bank icon"><span>Nowe i planowane inwestycje!</span>
                <ul>
                    <?php for ($i = (count($rowI) - 1); $i >= $this->newsOrder($rowI); $i--) { ?>
                        <li>
                            <?php
                                echo '<a href="?action=article&article=' . $rowI[$i]['article_id'] . '"><h4>' . $rowI[$i]['article_title'] . '</h4> ' . $rowI[$i]['article_header'] . '</a>';
                                echo '<p class="article-date-author"> Autor: ' . $rowI[$i]['article_author'] . ' Data: ' . $rowI[$i]['article_createddate'] . '</p>';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </article>
        </section>
    </div>
</main>

