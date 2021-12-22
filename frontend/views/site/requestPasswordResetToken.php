<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
        <h2>Reset<br>Password</h2>
        <hr>
        <div class="row">
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'options' => ['autocomplete' => 'off'],]); ?>
                <table>
                    <tr>
                        <td>
                            <?= $form->field($model, 'email')->textInput(['class' => 'input-lg', 'style' => 'height:75px', 'placeholder' => 'Email'])->label(false) ?>
						</td>
                    </tr>
                </table>
                <div class="form-group">
                    <?= Html::submitButton('Reset', ['style' => 'background-color: white; color: black; border-style: outset; border-color: white; font-size: 1em; font-size: 1em; width: 100px; height: 50px']) ?>
                    <br> <br>
                    <!--<a href="/site/resend-verification-email"> <span style="font-size:0.9em">Resend verification </span></a>-->
					<?= Html::a('Resend verification', ['site/resend-verification-email']) ?>
                </div>
                <?php ActiveForm::end(); ?>
        </div>
</div>
<hr>
