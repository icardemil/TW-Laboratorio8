
<?php

/* @var $this yii\web\View */
$temp = Yii::$app->user->identity;
$this->title = 'MarcaChart';
if($temp != null){
    if($temp->rol == 'admin')
    {
        echo '<h1><p class="bg-success">Bienvenido administrador</p></h1>';
    }
    else{
        if($temp->rol == 'user')
        {
            echo '<h1><p class="bg-warning">Bienvenido esclavo</p></h1>';
        }
    }
}
else{
    echo '<h1><p class="bg-danger">Logeate wey</p></h1>';
}
?>
<div class="site-index">
</div>
