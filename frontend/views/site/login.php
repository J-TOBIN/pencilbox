<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss('.input-lg{border: none; font-size: 0.8em; text-align: left;}');
?>
<div id="anchor">
<div class="site-login">
<h2>LOGIN</h2>
<hr>
	<div class="arrangeformdiv">
		<?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['autocomplete' => 'off'],]); ?>

		<table>
			<tr>
				<td><?= $form->field($model, 'username')->textInput(['class' => 'input-lg', 'style' => 'height:75px', 'autocomplete' => 'off', 'placeholder' => 'Email'])->label(false) ?></td>
			</tr>
			<tr>
				<td>
					<?= $form->field($model, 'password')->passwordInput(['class' => 'input-lg', 'style' => 'height:75px', 'placeholder' => 'Password'])->label(false) ?>
				
				</td>
			</tr>

		</table>


		<?= Html::submitButton('Login', ['style' => 'background-color: white; color: black; border-style: outset; border-color: white; font-size: 1em; width: 100px; height: 50px']) ?>
		<br>
		<button type="button" onclick="document.location.href=&quot;/site/social&quot;" style="background-color: white; color: black; border-style: outset; border-color: white; font-size: 1em; width: 100px; height: 50px;"> Social</button>

		<br> <br>
		<!--<a href="/site/request-password-reset"> <span style="font-size:0.9em">Reset password </span></a>-->
		<?= Html::a('Reset password', ['site/request-password-reset']) ?>
		<br>
		<!--<a href="/site/resend-verification-email"><span style="font-size:0.9em">Resend verification </span></a>-->
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