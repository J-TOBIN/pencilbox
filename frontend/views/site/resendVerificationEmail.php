<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Resend verification email';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-resend-verification-email">
      <p></p>
        <h2>Email<br>Verification<br>Reminder</h2>
        <hr>
		<div class="row">
			<?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form', 'options' => ['autocomplete' => 'off'],]); ?>
			<table>
				<tr>
					<td>
						<?= $form->field($model, 'email')->textInput(['class' => 'input-lg', 'style' => 'height:75px', 'placeholder' => 'Email'])->label(false) ?>
					</td>
				</tr>
			</table>
			<div class="form-group">
				<?= Html::submitButton('Resend', ['style' => 'background-color: white; color: black; border-style: outset; border-color: white; font-size: 1em; font-size: 1em; width: 100px; height: 50px']) ?>
				<br> <br>
				<!--<a href="/site/request-password-reset"> <span style="font-size:0.9em">Reset password </span></a>-->
				<?= Html::a('Reset password', ['site/request-password-reset']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
</div>
<hr>