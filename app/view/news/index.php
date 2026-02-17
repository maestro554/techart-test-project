<?php
    require __DIR__ . "/../layout/header.php"
?>

    <main class="main">
        <div class="main__last-new" style="background-image: url('/src/sql/img/<?=$lastNew["image"]?>');">
            <div class="wrapper">
                <div class="last-new__text">
                    <h1><?=$lastNew["title"]?></h1>
                    <?=$lastNew["announce"]?>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="main__news-board">
                <div class="news-board__title">
                    <h1>Новости</h1>
                </div>
                <div class="news-board__container">
                    <?php foreach($news as $item): ?>
                        <div class="news-board__item__container">
                            <div class="news-board__item">
                                <div class="news-board__item--date">   
                                        <p><?=$item["date"]?></p>   
                                </div>
                                <div class="news-board__item--title">
                                    <h2>
                                        <?=$item["title"]?>
                                    </h2>
                                </div>
                                <div class="news-board__item--announce">
                                    <p>
                                        <?=$item["announce"]?>
                                    </p>
                                </div>
                            </div>
                            <div class="news-board__item--button-container">
                                <a href="/article?id=<?=$item["id"]?>&page=<?=$page?>" class="news-board__item--button">Подробнее</a> 
                            </div>
                        </div>
                    <?php endforeach;?> 

                </div>
                <div class="news-board__pagin">
                    <?php if ($startPage > $maxButtons): ?>
                        <a href="?page=<?=$startPage - 1?>" class="pagin__first-item"></a>
                    <?php endif; ?>

                    <?php for ($i = $startPage; $i <= $endPage; $i++):?>
                        <a href="?page=<?=$i?>" class="<?= $i == $page ? 'pagin__item_active' : 'pagin__item'?>"><?=$i?></a>
                    <?endfor;?>

                    <?php if ($endPage < $totalPages): ?>
                        <a href="?page=<?=$endPage + 1?>" class="pagin__last-item"></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

<?php 
require __DIR__ . "/../layout/footer.php";
?>