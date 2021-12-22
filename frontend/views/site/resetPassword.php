<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">
    <h2>Reset <br> Password</h2><hr>
        <p></p>
        <div class="arrangeformdiv">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form', 'options' => ['autocomplete' => 'off'],]); ?>
            <table>
                <tr>
                    <td>
						<?= $form->field($model, 'password')->passwordInput(['autofocus' => true, 'class' => 'input-lg', 'placeholder' => 'Enter New Password'])->label(false) ?>
					</td>
                </tr>
            </table>
			<div class="form-group">
				<?= Html::submitButton('Save', ['style' => 'background-color: black; color: white; border: none; font-size: 1em; width: 100px; height: 50px']) ?>
			</div>
            <br><br>
            <!--<a href="/site/resend-verification-email">    <span style="font-size:0.9em">Resend verification </span></a>-->
			<?= Html::a('Resend verification', ['site/resend-verification-email']) ?>
            <?php ActiveForm::end(); ?>
        </div>
</div>
<hr>