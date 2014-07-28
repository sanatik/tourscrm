
<?php if($category->background){ ?>
    <style>
        body{
            background: url("/upload/branding/<?=$category->background?>") no-repeat fixed;

            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
<?php } ?>