<div class="h_fon">
    <h1 class="ib"><em class='h1_left_pic'></em><?=Yii::t('search', 'Поиск');?>
    </h1>
</div>
<article id="text">

    <form action="<?=$this->createUrl('/search/default/index')?>">
        <input type="search" name="query" style="width:80%;" value="<?=$query?>">
        <button type="submit"><?=Yii::t('search', 'Поиск');?></button>
    </form>

    <p><i><?=Yii::t('search', 'По Вашему запросу ничего не найдено!');?></i></p>
</article>
