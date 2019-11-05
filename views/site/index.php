<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::$app->name.' v1.0';
?>

<div class="site-index">

    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <?php
          if (Yii::$app->user->isGuest){

            echo '<h2>Connexion</h2>';
            $form = ActiveForm::begin([ 'id' => 'login-form' ]);
            echo $form->field($model, 'username')->textInput(['autofocus' => true]);
            echo $form->field($model, 'password')->passwordInput();
            echo $form->field($model, 'rememberMe')->checkbox([]);
            echo Html::submitButton('Connexion', ['class' => 'btn btn-primary', 'name' => 'login-button']);
            ActiveForm::end();

          } else {
            // user role is 'admin'
            if (Yii::$app->user->identity->isAdmin()){
                echo $this->render('_admin', ['exercices' => $exercices]);

            } else {
              // user role is 'user'
                echo $this->render('_user', ['realisations' => $realisations]);
            }
            ?>
            <?php
            // otherwise (other or unknown roles)
          }
          ?>

        </div><!-- .col-md-6 -->

      </div><!-- .row -->
    </div><!-- .container -->

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
              <h2></h2>
              <p></p>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
            </div>
        </div>

    </div>
</div>
