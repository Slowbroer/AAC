<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-09-27
 * Time: 15:14
 */
?>


<ul class="nav nav-list ">
    <?php foreach($lists as $list){ ?>
    <li ><a href="<?= \yii\helpers\Url::toRoute('blog/info').'&id='.$list['id'] ?>"><?= $list['title'] ?></a></li>
    <?php } ?>
</ul>




