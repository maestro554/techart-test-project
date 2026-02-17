<?php

require_once __DIR__ . "/../model/News.php";

class NewsController {

    public function index() {

        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $newsPerPage = 4;
        $offset = ($page - 1) * $newsPerPage;
        
        $newsModel = new News();
        $news = $newsModel->getLatest($newsPerPage, $offset);
        foreach($news as &$new) {
            $new["date"] = date("d.m.Y", strtotime($new["date"]));
        }

        $lastNew = $newsModel->getLatest(1)[0];

        $totalNews = $newsModel->getCount();
        $totalPages = ceil($totalNews / $newsPerPage);
        $maxButtons = 3;
        $startPage = floor(($page - 1) / $maxButtons) * $maxButtons + 1;
        $endPage = min($startPage + $maxButtons - 1, $totalPages);

        require __DIR__ . "/../../app/view/news/index.php";
    }
// Все переменные ($news, $page, $totalPages, $startPage, $endPage) будут доступны во view

    public function show($id) {
        $newsModel = new News();
        $newsItem = $newsModel->getById($id);
        $newsItem["date"] = date("d.m.Y", strtotime($newsItem["date"]));

        $currentMainPage = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

        require __DIR__ . "/../../app/view/news/show.php";
    }
}
