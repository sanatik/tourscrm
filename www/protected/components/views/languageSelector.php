<ul>
    <?php

    foreach ($languages as $key => $lang) {
        if ($key != $currentLang) {
            echo CHtml::tag('li', array(), CHtml::link($key, $this->getOwner()->createMultilanguageReturnUrl($key)));
        } else {
            echo CHtml::tag('li', array('class' => 'active'), CHtml::link($key, $this->getOwner()->createMultilanguageReturnUrl($key)));
        }
    }
    ?>
</ul>