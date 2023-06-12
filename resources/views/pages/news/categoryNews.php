<h2>Новости категории "<?= $category['name'] ?>"</h2>

<?php
    if ($categoryHasNews):?>
    <ul>
        <?php
            foreach ($categoryNews as $news) :?>
                <li>
                    <a href="<?= route('page.oneNews', ['titleCategory' => $category['title'], 'id' => $news['id']]) ?>">
                        <?= $news['title'] ?>
                    </a>
                </li>
        <?php endforeach; ?>
    </ul>
<?php
    else:?>
        <p>К сожалению, в эту категорию пока не добавили новостей</p>
<?php endif; ?>
<button><a href="<?= $_SERVER['HTTP_REFERER'] ?>">Назад</a></button>
<button><a href="<?= route('home') ?>">На главную</a></button>
