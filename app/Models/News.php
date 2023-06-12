<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /* Категории новостей */
    const NEWS_CATEGORY_SPORT = [
        'id' => 1,
        'name' => 'Спорт',
        'title' => 'sport',
    ];
    const NEWS_CATEGORY_AUTO = [
        'id' => 2,
        'name' => 'Автомобили',
        'title' => 'auto',
    ];
    const NEWS_CATEGORY_TRAVEL = [
        'id' => 3,
        'name' => 'Путешествия, туризм',
        'title' => 'travel',
    ];
    const NEWS_CATEGORY_ART = [
        'id' => 4,
        'name' => 'Искусство',
        'title' => 'art',
    ];
    const NEWS_CATEGORY_NATURE = [
        'id' => 5,
        'name' => 'Природа',
        'title' => 'nature',
    ];
    const NEWS_CATEGORY_INCIDENTS = [
        'id' => 6,
        'name' => 'Происшествия',
        'title' => 'incidents',
    ];

    private array $_categories = [
        self::NEWS_CATEGORY_SPORT['id'] => self::NEWS_CATEGORY_SPORT,
        self::NEWS_CATEGORY_AUTO['id'] => self::NEWS_CATEGORY_AUTO,
        self::NEWS_CATEGORY_TRAVEL['id'] => self::NEWS_CATEGORY_TRAVEL,
        self::NEWS_CATEGORY_ART['id'] => self::NEWS_CATEGORY_ART,
        self::NEWS_CATEGORY_NATURE['id'] => self::NEWS_CATEGORY_NATURE,
        self::NEWS_CATEGORY_INCIDENTS['id'] => self::NEWS_CATEGORY_INCIDENTS,
    ];

    private array $_news = [
        self::NEWS_CATEGORY_SPORT['id'] => [
            1 => [
                'id' => 1,
                'categoryId' => self::NEWS_CATEGORY_SPORT['id'],
                'title' => 'Фактор Акинфеева: ЦСКА в серии пенальти обыграл «Краснодар» и завоевал Кубок России',
                'text' => 'ЦСКА победил «Краснодар» в финале Кубка России по футболу. Основное время матча завершилось вничью: на гол Фёдора Чалова с пенальти, заработанного Константином Кучаевым, ответил Джон Кордоба, замкнувший подачу Кристиана Рамиреса. А в серии послематчевых 11-метровых удача сопутствовала армейцам: Игорь Акинфеев парировал удары Жоау Батчи и Олакунле Олусегуна и позволил команде впервые с 2013 года завоевать трофей.',
                'slug' => '',
            ],
            2 => [
                'id' => 2,
                'categoryId' => self::NEWS_CATEGORY_SPORT['id'],
                'title' => 'Нападающий «Рейнджерс» Панарин радикально сменил имидж',
                'text' => ' социальной сети опубликована фотография 31-летнего хоккеиста с его поклонником. Снимок сделан в родном городе нападающего Коркине. На фото Панарин предстал в необычном видел. Артемий побрился налысо, избавившись от длинных кудрявых волос.',
                'slug' => '',
            ],
        ],
        self::NEWS_CATEGORY_AUTO['id'] => [
            1 => [
                'id' => 1,
                'categoryId' => self::NEWS_CATEGORY_AUTO['id'],
                'title' => 'Китайские автомашины заняли большую часть рынка России в 2023 году',
                'text' => 'В мае текущего года, доля китайских автомобилей в импорте в Россию продолжила уверенно расти, превысив отметку в 75,2%. Эти данные были опубликованы Русско-Азиатским Союзом промышленников и предпринимателей (РАСПП) в их официальном Telegram-канале. Таким образом, Китай продолжает укреплять свои позиции на рынке РФ, становясь основным поставщиком новых автомобилей в страну.',
                'slug' => '',
            ],
        ],
        self::NEWS_CATEGORY_TRAVEL['id'] => [
            1 => [
                'id' => 1,
                'categoryId' => self::NEWS_CATEGORY_TRAVEL['id'],
                'title' => '',
                'text' => '',
                'slug' => '',
            ],
        ],
    ];

    /**
     * Метод для получения новостей какой-то конкретной категории
     *
     * @param int $idCategory ID категории
     * @return ?array Массив новостей данной категории
     */
    public function getCategoryNews(int $idCategory): ?array
    {
        return array_key_exists($idCategory, $this->getNews())
                ? $this->getNews()[$idCategory]
                : null;
    }

    /**
     * Метод для получения конкретной новости категории
     *
     * @param int $idCategory
     * @param int $idNews
     * @return ?array
     */
    public function getOneNewsCategory(int $idCategory, int $idNews): ?array
    {
        return $this->getNews()[$idCategory][$idNews] ?: null;
    }

    /**
     * Метод для получения информации о категории по её заголовку
     *
     * @param string $titleCategory
     * @return ?array
     */
    public function getCategoryByTitle(string $titleCategory): ?array
    {
        $category = array_filter($this->getCategories(), function ($category) use($titleCategory) {
            return $category['title'] === $titleCategory;
        });

        return current($category) ?: null;
    }

    public function getCategories(): array
    {
        return $this->_categories;
    }

    public function getNews(): array
    {
        return $this->_news;
    }
}
