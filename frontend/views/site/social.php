<body onload="window.location='#anchor';"><?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Ecwiti.net';
$this->registerCss('.input-lg{border: none; font-size: 0.8em; text-align: left;}');

$googleSignUpUrl = \yii\helpers\Url::to(['site/google-signup'], true);
$facebookSignUpUrl = \yii\helpers\Url::to(['site/facebook-signup'], true);
$dashboardUrl = \yii\helpers\Url::to(['dashboard/index'], true);
$google_client_id = Yii::$app->params['google_app']['client_id'];
$fb_client_id = Yii::$app->params['facebook_app']['client_id'];
$js = <<<JS
var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '$google_client_id',
        cookiepolicy: 'single_host_origin',
        // Request scopes in addition to 'profile' and 'email'
        //scope: 'additional_scope'
      });
      attachSignin(document.getElementById('googleLogin'));
    });
  };

  function attachSignin(element) {
    console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
          var text = "Signed in: " +
              googleUser.getBasicProfile().getName() +
              ' - '+ googleUser.getBasicProfile().getEmail() +
              ' - '+ googleUser.getBasicProfile().getId();
          console.log(text);
          element.innerText = " Please wait a moment ...";
          $.ajax({
            url:'$googleSignUpUrl',
            method: 'POST',
            data: {
              email: googleUser.getBasicProfile().getEmail(),
              id: googleUser.getBasicProfile().getId(),
              token: googleUser.getAuthResponse().id_token
            },
            success: function(){
              document.location.href = '$dashboardUrl';
            },
            error: function() {
              alert('error in login by google');
            }
          })
        }, function(error) {
          alert(JSON.stringify(error, undefined, 2));
        });
  }
  startApp();

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '$fb_client_id',
      cookie     : true,
      xfbml      : true,
      version    : 'v8.0'
    });

    FB.AppEvents.logPageView();

  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
JS;

$this->registerJs($js, $this::POS_END);
$js = <<<JS
$('#facebookLogin').click(function() {
  FB.login(function(response) {
        if (response.authResponse) {
         console.log('Welcome!  Fetching your information.... ');
         var token = response.authResponse.accessToken;
         FB.api('/me?locale=en_US&fields=name,email,link', function(response) {
           console.log(response);
           //console.log(response.link);
           console.log('Good to see you, ' + response.name + '.');
            $.ajax({
            url:'$facebookSignUpUrl',
            method: 'POST',
            data: {
              email: response.email,
              id: response.id,
              name: response.name,
              token: token
            },
            success: function(){
              document.location.href = '$dashboardUrl';
            },
            error: function() {
              alert('error in login by facebook');
            }
          })
         });
        } else {
         console.log('User cancelled login or did not fully authorize.');
        }
    }, { scope: ['email','user_link'] });
});
JS;
$this->registerJs($js);
$this->registerJsFile("https://apis.google.com/js/api:client.js");

$this->registerCss('.input-lg{color: black; background-color: white; border-style: outset; border-color: white; height: 50px; text-align: left; font-size: 1.0em; text-align: left; -webkit-appearance: none;
-moz-appearance:none;
appearance:none; } ');

?>
      <a id="anchor">
<div class="site-social">  <p></p>
    <div class="row">


        <h2>LOGIN</div>
    </h2>
    <hr>
    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['autocomplete' => 'off'],]); ?>
        <?= Html::button('Google', [
            'id' => 'googleLogin',
            'class' => 'input-lg',
        ]) ?>
        <br>
        <?= Html::button('LinkedIn', [
            'onclick' => new \yii\web\JsExpression('document.location.href="' . \yii\helpers\Url::to(['linkedin-login']) . '"'),
            'id' => 'linkedinLogin',
            'class' => 'input-lg',
        ]) ?>
        <br>
        <?= Html::button('Facebook', [
            'id' => 'facebookLogin',
            'class' => 'input-lg',
        ]) ?>
        <br>
        <?= Html::button('GitHub', [
            'onclick' => new \yii\web\JsExpression('document.location.href="' . \yii\helpers\Url::to(['github-login']) . '"'),
            'id' => 'githubLogin',
            'class' => 'input-lg',
        ]) ?>
        <br>
        <?= Html::button('Stack Overflow', [
            'onclick' => new \yii\web\JsExpression('document.location.href="' . \yii\helpers\Url::to(['stackoverflow-login']) . '"'),
            'id' => 'stackLogin',
            'class' => 'input-lg',
        ]) ?>
        <br>
        <?= Html::button('Twitter', [
            'onclick' => new \yii\web\JsExpression('document.location.href="' . \yii\helpers\Url::to(['twitter-login']) . '"'),
            'id' => 'twitterLogin',
            'class' => 'input-lg',
        ]) ?>
        <br>
        <?= Html::button('Bitbucket', [
            'onclick' => new \yii\web\JsExpression('document.location.href="' . \yii\helpers\Url::to(['bitbucket-login']) . '"'),
            'id' => 'bitbucketLogin',
            'class' => 'input-lg',
        ]) ?>
        <br>
        <?= Html::button('Reddit', [
            'onclick' => new \yii\web\JsExpression('document.location.href="' . \yii\helpers\Url::to(['reddit-login']) . '"'),
            'id' => 'redditLogin',
            'class' => 'input-lg',
        ]) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<hr>
