
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
            echo '<h1><p class="bg-warning">Bienvenido usuario</p></h1>';
        }
    }
}
else{
    echo '<h1><p class="bg-danger">Ingrese al sitio presionando LOGIN</p></h1>';
}
?>
<div class="site-index">
</div>
