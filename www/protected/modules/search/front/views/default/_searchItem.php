
<tr>
    <td>
        <?php if ($data instanceof ProgrammsContent) { ?>
            <strong><a
                    href="<?=Yii::app()->createUrl('/programms/default/ProgrammView', array('sefname' => $data->sefname))?>">
                    <?php echo $data->title?>
                </a></strong>
            <br/><?php echo $data->text ?>
        <?php } else { ?>
            <strong><a
                    href="<?=$this->createUrl('/pages/default/telecompanyView', array('sefname' => $data->category->sefname))?>">
                    <?php echo $data->title?>
                </a></strong>
            <br/><?php echo $data->text ?>
        <?php } ?>
    </td>
</tr>
<tr>
    <td>
        <hr>
    </td>
</tr>