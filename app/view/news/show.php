<?php
    require __DIR__ . "/../layout/header.php";
?>

<div class="wrapper">
    <main class="main-show">
        <div class="main__page-path">
            <span>Главная /</span>
            <p><?=$newsItem["title"]?></p>
        </div>
        <div class="main__new">
            <div class="main__new--title">
                <h1><?=$newsItem["title"]?></h1>
            </div>
            <div class="main__new--date">
                <p><?=$newsItem["date"]?></p>
            </div>
            <div class="new-block">
                <div class="new-block__info">
                    <div class="new-block--announce">
                        <h2><?=$newsItem["announce"]?></h2>
                    </div>
                    <div class="new-block--text">
                        <?=$newsItem["content"]?>
                    </div>
                </div>
                <div class="new-block__image">
                    <img src="/src/sql/img/<?=$newsItem["image"]?>" alt="">
                </div>
            </div>
            <div class="main__back-button_container">
                <a class="main__back-button" href="/?page=<?=$currentMainPage?>">Назад к новостям</a>
            </div>
        </div>
    </main>
</div>

<?php
    require __DIR__ . "/../layout/footer.php";
?>