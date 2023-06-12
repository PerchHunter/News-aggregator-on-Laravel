<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /** Объект модели News */
    private News $NewsModel;

    public function __construct()
    {
        $this->NewsModel = new News;
    }

    /**
     * Главная страница раздела "Новости"
     */
    public function index()
    {
        $categories = $this->getNewsModel()->getCategories();

        return view('pages.news.index')->with('categories', $categories);
    }

    /**
     * Страница определённой категории новостей
     */
    public function getCategoryNews(string $titleCategory)
    {
        $category = $this->getNewsModel()->getCategoryByTitle($titleCategory);

        if (!$category) {
            return view('404');
        }

        $categoryNews = $this->getNewsModel()->getCategoryNews($category['id']);

        return view('pages.news.categoryNews')->with([
                'category' => $category,
                'categoryNews' => $categoryNews,
                'categoryHasNews' =>  !is_null($categoryNews)
            ]);
    }

    /**
     * Страница вывода конкретной новости
     */
    public function getOneNews($titleCategory, $idNews)
    {
        $category = $this->getNewsModel()->getCategoryByTitle($titleCategory);

        if (!$category) {
            return view('404');
        }

        $news = $this->getNewsModel()->getOneNewsCategory($category['id'], $idNews);

        if (!$news) {
            return view('404');
        }

        return view('pages.news.oneNews')->with(['category' => $category, 'news' => $news]);
    }

    /**
     * Геттер свойства
     */
    public function getNewsModel(): News
    {
        return $this->NewsModel;
    }
}
