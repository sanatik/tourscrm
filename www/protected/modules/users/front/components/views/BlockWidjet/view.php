<div class="my_widget">
    <div class="title">Мои аккаунт</div>

    <h2><?=$model->data_name?></h2>

    <div class="data"><strong>БИН/ИИН:</strong> <?=$model->data_bin?></div>
    <div class="data" align="right"><a href="<?=Yii::app()->createUrl('/users/default/logout')?>">Выход</a></div>
</div>