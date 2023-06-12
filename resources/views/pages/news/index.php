<h1>Новости</h1>
<br>
<h2>Категории</h2>
<hr>
<ul>
    <?php
        foreach ($categories as $category) :?>
            <li>
                <a href="<?= route('page.categoryNews', ['titleCategory' => $category['title']]) ?>"><?= $category['name'] ?></a>
            </li>
    <?php endforeach; ?>
</ul>
