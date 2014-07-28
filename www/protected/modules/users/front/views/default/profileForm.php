<div class="personal_cabinet">
                <h1>Личный кабинет</h1>
                    <hr>

					<?php $this->widget('BlockWidjet'); ?>
				

                <div class="my_block">
                    <h2>Мой аккаунт</h2>
                    <hr>
                    <ul>
                        <li><a href="editProfile">Изменить информацию профиля</a></li>
                        <li><a href="ChangePassword">Изменить пароль</a></li>
                        <li><a href="ChangePassword">Изменить пароль</a></li>
                    </ul>
                </div>

                <div class="my_block">
                    <h2>Мои заказы</h2>
                    <hr>

                    <ul>
                        <li><a href="<?=Yii::app()->createUrl('/shop/default/index')?>">Создать заказ</a></li>
                        <li><a href="MyOrders">Мои покупки</a></li>
                    </ul>
                </div>

            </div>