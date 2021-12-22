<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="anchor">
<div class="site-signup">
      <p></p>

        <h2>JOIN</h2>
        <hr>
        <div class="row">
            <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],]); ?>
            <table>
                <tr>
					<td>
						<?= $form->field($model, 'username')->textInput(['class' => 'input-lg', 'style' => 'height:75px', 'placeholder' => 'Username'])->label(false) ?>
					</td>
				</tr>
				<tr>
                    <td>
						<?= $form->field($model, 'email')->textInput(['class' => 'input-lg', 'style' => 'height:75px', 'placeholder' => 'Email'])->label(false) ?>
					</td>
                </tr>
				<tr>
                    <td>
						<?= $form->field($model, 'password')->passwordInput(['class' => 'input-lg', 'style' => 'height:75px','placeholder' => 'Password'])->label(false) ?>
					</td>
                </tr>
                  <!--<tr>
                      <td>
                    <?php //= $form->field($model, 'confirm_password')->passwordInput(['class' => 'input-lg', 'style' => 'height:75px', 'placeholder' => 'Confirm password'])->label(false) ?>
					</td>
                  </tr>-->
               </tr>
            </table>
            <?= Html::submitButton('Join', ['style' => 'background-color: white; color: black; border-style: outset; border-color: white; font-size: 1em; width: 100px; height: 50px']) ?>
            <br>
            <?= Html::button(' Social', [
                'onclick' => new \yii\web\JsExpression('document.location.href="' . \yii\helpers\Url::to(['social']) . '"'),
                'style' => 'background-color: white; color: black; border-style: outset; border-color: white; font-size: 1em; width: 100px; height: 50px;'
            ]) ?>
  <br>  <br>
                      <!--<a href="/site/request-password-reset">
					  <span style="font-size:0.9em">Reset password </span></a>-->
					  <?= Html::a('Reset password', ['site/request-password-reset']) ?>
                    <br>
					<!--<a href="/site/resend-verification-email">    <span style="font-size:0.9em">Resend verification </span></a>-->
					<?= Html::a('Resend verification', ['site/resend-verification-email']) ?>
            <?php ActiveForm::end(); ?>
        </div>
</div>
    <hr>
    <script>
    var my_element = document.getElementById("anchor");

    my_element.scrollIntoView({
      behavior: "smooth",
      block: "start",
      inline: "nearest"
    });
    </script>
