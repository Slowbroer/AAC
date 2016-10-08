<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-09-27
 * Time: 15:14
 */
use \yii\bootstrap\Html;
?>


<!--<ul class="list-group">-->
<!--    --><?php //foreach($lists as $list){ ?>
<!--    <li class="list-group-item">-->
<!--        <span class="badge"></span>-->
<!--        <a href="--><?php //echo \yii\helpers\Url::toRoute('blog/info').'&id='.$list['id'] ?><!--">--><?//= $list['title'] ?><!--</a>-->
<!--    </li>-->
<!--    --><?php //} ?>
<!--</ul>-->

<!--<div class="list-group">-->
<!--    --><?php //foreach($lists as $list){ ?>
<!--        <a class="list-group-item" href="--><?php //echo \yii\helpers\Url::toRoute('blog/info').'&id='.$list['id'] ?><!--">--><?//= $list['title'] ?><!--</a>-->
<!--    --><?php //} ?>
<!--</div>-->

<div class="panel panel-success" style="margin: 20px auto;width: 95%">
  <?php foreach($lists as $list){ ?>
    <div class="panel-heading">
        <a href="<?php echo \yii\helpers\Url::toRoute('blog/info').'&id='.$list['id'] ?>"><?= $list['title'] ?></a>
        <a style="float: right;padding-left: 10px" href="<?php echo \yii\helpers\Url::toRoute('blog/edit').'&id='.$list['id'] ?>">编辑</a>
        <a style="float: right" href="#" onclick="del_blog(<?php echo $list['id'] ?>)">删除</a>
    </div>
    <div class="panel-body"><?php echo Html::encode($list['brief'])?></div>
  <?php } ?>
</div>

<script type="text/javascript">
function del_blog(id)
{
    $.ajax(
        {

            url:'index.php?r=blog/del',
            data:"id="+id,
            type:"POST",
            success:function(){
                recent_blog();

            },
            error:function(){
                alert("delete failed")
            }

        }
    );
}
</script>




