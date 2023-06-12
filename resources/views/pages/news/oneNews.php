<h3><?= $news['title'] ?></h3>
<hr>
<p><?= $news['text'] ?></p>
<button><a href="<?= $_SERVER['HTTP_REFERER'] ?>">Назад</a></button>
<button><a href="<?= route('home') ?>">На главную</a></button>
