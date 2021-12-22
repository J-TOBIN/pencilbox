<?php
/* @var $this \yii\web\View */

/* @var $content string */

use common\models\IndividualInvestor; /* this can be removed */
use common\models\User;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use common\models\EcwitiCoinHistory;
use common\models\CoinRain;
use common\models\EcwitiWallet; 
use common\models\Setting;





$directoryAsset = AppAsset::register($this);
$this->beginPage();

?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
      @import url("//hello.myfonts.net/count/37a14b");
      @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

      @font-face {
          font-family: 'Noyh-Regular';
          src: url('/fonts/37A14B_0_0.eot');
          src: url('/fonts/37A14B_0_0.eot?#iefix') format('embedded-opentype'), url('/fonts/37A14B_0_0.woff2') format('woff2'), url('/fonts/37A14B_0_0.woff') format('woff'), url('webfonts/37A14B_0_0.ttf') format('truetype');
      }

      input, select, textarea {
          color: black;
          border-color: black;
          background-color: white;
      }

      #example {
          color: black;
      }

      * {
          box-shadow: none;
          outline: none;
      }

      input {
          border: 2px solid black;
      }

      input:invalid {
          border: 2px solid black;
      }

      mark {
          background-color: white;
          color: black;
          text-decoration: underline;
      }
    </style>

    <?php
	
   /*  $this->registerJsFile(Yii::getAlias('@web') . '/js/jquery.countdown.js', ['depends' => \yii\web\JqueryAsset::className()]);

    $rain = \common\models\CoinRain::find()->orderBy(['id' => SORT_DESC])->one();
    $date = '';

    if ($rain) {
      $date = date('Y-m-d H:i:s T', $rain->next_rain);
    } else {
      $date = date('Y-m-d H:i:s T', time());
    }

    $this->registerJs('
      console.log("Coin Rain countdown to:");
      console.log("'.$date.'");
 $("#getting-started")
                    .countdown("' . $date . '", function(event) {
                        $(this).text(
                            event.strftime(\'%D days %H:%M:%S\')
                        );
                    });', \yii\web\View::POS_END); */
    ?>
    <!--<link rel="preload" href="MyFontsWebfontsKit.css" as="style" onload="this.rel='stylesheet'">
    <link href="https://fonts.googleapis.com/css?family=Signika+Negative" rel="stylesheet">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">-->
    <link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon-120x120.png">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/site.css">

    <style>
      span.red {
          display: -webkit-box;
          display: -moz-box;
          display: -ms-flexbox;
          display: -webkit-flex;
          display: flex;
          align-items: center;
          justify-content: center;
          background-size: cover;
          background-position: center;
          background-image: url(../images/animate.gif);
          /*background-repeat: none;*/


          border-radius: 3em;

          -moz-border-radius: 3em;
          -webkit-border-radius: 3em;
          border: 0.1em solid white;
          margin: 10px;

          box-shadow: 0.100em 0.100em 0.100em 0.100em rgba(15, 28, 63, 0.125);
          border-radius: 50%;
          color: white;
          display: inline-block;
          line-height: 2.8em;
          margin-right: 15px;
          text-align: center;
          width: 2.8em;
          letter-spacing: -0.03em;
      }
.site-login h2 {
    margin-top: 30px;
}
      /* The device with borders */
      .smartphone {
          position: relative;
          /* width: 135px;
          height: 200px; */
          margin: -10px;
          border: 16px black solid;
          border-top-width: 60px;
          border-bottom-width: 60px;
          border-radius: 36px;
      }

      /* The horizontal line on the top of the device */
      .smartphone:before {
          content: '';
          display: block;
          width: 60px;
          height: 5px;
          position: absolute;
          top: -30px;
          left: 50%;
          transform: translate(-50%, -50%);
          background: #333;
          border-radius: 10px;
      }

      /* The circle on the bottom of the device */
      .smartphone:after {
			content: '';
			display: block;
			width: 35px;
			height: 35px;
			position: absolute;
			left: 50%;
			bottom: -65px;
			transform: translate(-50%, -50%);
			background: #333;
			border-radius: 50%;
      }

      /* The screen (or content) of the device */
      .smartphone .content {
          width: 135px;
          height: 200px;
          background-image: url(../images/Tl9vwHcqCpCmu8o_LF-aQbJ-D_BhLPcS1614632667.png);
          background-size: cover;
          background-position: left;

      }
	.site-request-password-reset h2 {
		margin-top: 2.5rem;
	}
	.field-passwordresetrequestform-email input {
		border: none;
	}
	@media (min-width: 550px)
	{
		h3 {
			font-size: 6rem;
			letter-spacing: -.440rem;
		}
	}
	@media (min-width: 550px)
	{
		h2 {
			font-size: 2.4rem;
		}
	}
	a:hover{
		text-decoration:none;
	}
	.field-resendverificationemailform-email input {
		border: none;
	}
	.form-group.required input {
		border: none;
	}
    </style>
  </head>
  <body style="color: black">
    <?php $this->beginBody(); ?>
    <div class="container">

      <div class="row" style="margin-left:0;margin-top:5rem;">
        <a href="<?= Url::to(['/']) ?>">
          <h3> <!-- V_ERROR: Element “div” not allowed as child of element “h3” in this context -->
            <div class="smartphone">
              <div class="content">
                <span class="red">
                  <span style="color:white;">
                    <i>Orrlia</i>
                  </span>
                </span>
              </div>
            </div>
          </h3>

          <h2>
            <span style="color:white;font-family: 'Bebas Neue', cursive;font-size: 1.5em;text-shadow: 2px 2px black;">Learn <br>your <br>value</span></i>
          </h2>
        </a>
      </div>

      <div class="row" style="margin-top:5rem;">
        <hr class="f">
        <p>

  <small>
            <?= Html::a('<strong><u>About</u></strong>', ['/site/about', 'type' => 'about']) ?> |
            <?= Html::a('<strong><u>Contact</u></strong>', ['/site/contact', 'type' => 'company']) ?>

          </small>
        </p>
        <hr class="f">
      </div>

      <button onclick="TestsFunction()" title="Ecwiti coin statistics"
              style="-webkit-appearance: none; border-radius: 0;  -webkit-border-radius:0px; background: black; color: white; border: 1px; font-size: 0.8em;">
        <b>Stats</b>
      </button>

      <div id="TestsDiv" style="display:block; margin-left:0px;margin-top:0rem;">
        <p style="display: inline; font-size: 0.8em; text-align: left;width: 100%;">
          <br>
        <!--  <a href="<?= Url::to(['rain/history']) ?>"><b>Advertisers</b></a>
          <br>
          <u><a href="<?= Url::to(['rain/history']) ?>">
            <span id="getting-started" style="text-align: left;width: 100%;"></span>
            <!--  // don't need this headhing

            <mark><b>Rain history</b></mark>
             // -->
          </a>


        <?php // $coinRain = CoinRain::find()->andFilterWhere(['cycle' => $cycle])->orderBy(['cycle' => SORT_ASC])->one();   ?>

        <p style="font-size: 0.8em; text-align: left;width: 100%;">
        </u><b>Creators</b><br>
    <u> <?php
	
         /* echo \frontend\views\widgets\WalletStatusWidget::widget([
              'number' => common\CoinRain::getTradeTicker(true, null, false, true),
              'link' => ['site/overview-traded', 'cycle' => "0", 'to_date' => 1]
          ]); */

          ?></u>

          <br>
        <b>Jobs</b>

          <!-- this should be collected coin, the coin that the Ecwiti applicaiton is receiving into it's wallet from trades.  we should a table on the next page like
            received coin: into ecwiti wallet from: the name of the ecwiti that has purchased the other ecwiti
                  date time-->
                  <br>
              <u>    <?php
//                  $last_rainTime = CoinRain::find()->orderBy(['id' => SORT_DESC])->one();
//                  $coinSumToDistribute = 0;
//                  $transactions = EcwitiWallet::find()
//                      ->where(['>', 'id', ($last_rainTime ? $last_rainTime->last_ecwiti_wallet_id : 0)])
//                      ->andWhere(['IS NOT', 'offer_id', null])
//                      ->select(['gbp', 'id'])->all();
//                  foreach ($transactions as $item) {
//                      $coinSumToDistribute = bcadd($coinSumToDistribute, $item['gbp']);
//                  }
//                  if ($last_rainTime) {
//                      $remained = bcsub($last_rainTime->total_amount, $last_rainTime->rained_amount);
//                      $coinSumToDistribute = bcadd($coinSumToDistribute, $remained);
//                  }
                  /* echo \frontend\views\widgets\WalletStatusWidget::widget([
                    //'number' => $coinSumToDistribute,
                    'number' => common\CoinRain::getCollectedTicker(true, null, false, true),
                    'link' => ['site/overview-collected', 'cycle' => "0", 'to_date' => 1]
                  ]); */
                  // echo \common\Helper::abbr_format($coinSumToDistribute) ;
                 ?></u>
          <br>

        </u><b>Designs</b><br>
        <u>  <?php
		
          /* $coinRain_allRows = CoinRain::find()->asArray()->all();
          $rainedSum = 0;
          foreach ($coinRain_allRows as $r) {
            $rainedSum = bcadd($rainedSum, $r['rained_amount']);
          }
          echo \frontend\views\widgets\WalletStatusWidget::widget([
              'number' => $rainedSum,
              'link' => ['site/overview-rained', 'cycle' => "0", 'to_date' => 1]
          ]); */
		 
          ?></u>

          <br>
        </u><b>Advertisers</b><br>
        <u><?php
		 
          /* echo \frontend\views\widgets\WalletStatusWidget::widget([
              'number' => common\CoinRain::getGeneratedTicker(true, null, false, true),
              'link' => ['site/overview-generated', 'cycle' => "0", 'to_date' => 1]
          ]); */
          ?></u>
          <br>
        </u><b>Applicants</b><br>
        <u><?php
          /* echo \frontend\views\widgets\WalletStatusWidget::widget([
              'number' => common\CoinRain::getGeneratedTicker(true, null, false, true),
              'link' => ['site/overview-generated', 'cycle' => "0", 'to_date' => 1]
          ]); */
          ?></u>


          <br>
          <!-- <b><mark>Ecwiti(s)</mark></b><br>
          <?php
         /*  $nrOfUsers = Yii::$app->cache->get('nrOfUsers2');
          if ($nrOfUsers === false) {
            //$nrOfUsers = \common\models\User::find()->where(['status' => \common\models\User::STATUS_ACTIVE])->count();
            $nrOfUsers = \common\models\IndividualAficionado::find()->count();
            Yii::$app->cache->set('nrOfUsers2', $nrOfUsers, 3600); // 3600 sec = 1 hour
          } */
//echo "<a href='../dashboard/market'>$nrOfUsers</a>";

          ?>

-->
        </p>

      </div>

      <div class="row" style="margin-top:0rem;">
        <hr class="f">
      </div>

      <?php if (Yii::$app->user->isGuest): ?>
        <a href="<?= Url::to(['site/signup']) ?>"><span style="font-size:50px" title="Join"><i class="fa fa-plus"></i></span></a>


         <!-- <a href="<?= Url::to(['dashboard/index']) ?>"><span style="font-size:50px" title="Login">&#9776;</span></a> -->
      <!--  <a href="<?= Url::to(['site/signup']) ?>"><span style="font-size:50px" title="Join">⨝&#xFE0E;</span></a> -->
       <a href="<?= Url::to(['dashboard/index']) ?>"><span style="font-size:50px" title="Login"><i class="fa fa-sign-in"></i></span></a>

    <!--   <a href="<?= Url::to(['dashboard/market']) ?>"><span style="font-size:50px" title="The Ecwiti Market">⚖&#xFE0E;</span></a>-->
          <a href="<?= Url::to(['dashboard/market']) ?>"><span style="font-size:50px" title="The Ecwiti Market"><i class="fa fa-users"></i></span></a>
		  <a href="<?= Url::to(['dashboard/market']) ?>"><span style="font-size:50px" title="The Ecwiti Market"><i class="fa fa-search"></i></span></a>

        <?php
        if (\Yii::$app->session->hasFlash('message')) {
          echo '<br>' . \Yii::$app->session->getFlash('message') . "<br>";
        }
		
        ?>

      <?php endif; ?>

      <?php if (!Yii::$app->user->isGuest): ?>

        <div class="row" style="display: inline-block; text-align: left;width: 100%;">
          <p style="font-size: 0.8em; text-align: left;"><?= Yii::$app->user->identity->email ?></p>
          <?php
		 
          $main_user_id = Yii::$app->user->id;
          $type = null;
          if (!empty(Yii::$app->user->identity->group_id)) {
           // $type = \common\models\User::ACC_AFICIONADO_INDIVIDUAL;
            $main_user_id = Yii::$app->user->identity->group_id;
            echo " <b>Ecwiti terminal</b><br>";
          } elseif (!empty(Yii::$app->user->identity->investor_id)) {
            //$type = \common\models\User::ACC_INVESTOR_INDIVIDUAL;
            $main_user_id = Yii::$app->user->identity->investor_id;
            echo " <b>Asset terminal</b><br>";
          }

          $result = $img = '';
          $brand = $investor = null;
          /* if ($type == \common\models\User::ACC_AFICIONADO_INDIVIDUAL) {
            $brand = \common\models\IndividualAficionado::findOne(['user_id' => Yii::$app->user->id]);
            $investor = User::findOne(['investor_id' => Yii::$app->user->identity->group_id]);
            $investor = \common\models\IndividualInvestor::findOne(['user_id' => $investor->id]);
            $ecwitiCoin = \common\models\EcwitiCoin::findOne(['user_id' => Yii::$app->user->identity->group_id]);
          } elseif ($type == \common\models\User::ACC_INVESTOR_INDIVIDUAL) {
            $investor = IndividualInvestor::findOne(['user_id' => Yii::$app->user->id]);
            $brand = User::findOne(['group_id' => Yii::$app->user->identity->investor_id]);
            $brand = \common\models\IndividualAficionado::findOne(['user_id' => $brand->id]);
            $ecwitiCoin = \common\models\EcwitiCoin::findOne(['user_id' => Yii::$app->user->identity->investor_id]);
          } elseif (empty(Yii::$app->user->identity->investor_id) && empty(Yii::$app->user->identity->group_id)) {
            $brand = User::findOne(['group_id' => Yii::$app->user->id]);
            if ($brand) {
              $brand = \common\models\IndividualAficionado::findOne(['user_id' => $brand->id]);
            }
            $investor = User::findOne(['investor_id' => Yii::$app->user->id]);
            if ($investor) {
              $investor = \common\models\IndividualInvestor::findOne(['user_id' => $investor->id]);
            }
            $ecwitiCoin = \common\models\EcwitiCoin::findOne(['user_id' => Yii::$app->user->id]);
          } */

          /* if ($brand && $investor) {
            $ecwiti = empty($brand['ecwiti_market_value']) ? "Pending" : '' . $brand['ecwiti_market_value'];
            if (!is_numeric($ecwiti) && \common\models\BuyBack::find()->where(['aficionado_id' => $brand->id])->count()) {
              $ecwiti = "REACQUIRED";
            } */

            //<mark>Aficionado</mark> </b><br>" .
            //can we display the aficionado (the investor) of the Ecwiti here. If the Ecwiti has no aficionado (investor) display Pending

            //$result .= "<b>Value</b><br>" .
                    //(is_numeric($ecwiti) ? \frontend\views\widgets\WalletStatusWidget::widget(['number' => $ecwiti]) : $ecwiti)
                    //. "";
// removed br from between the "" above //
          // removed //     $result .= "<b><mark>Wanted Level</mark></b><br>" . \common\AficionadoHelper::streaks($brand['investor']);
          // removed //     $result .= "<br><b><mark>Reputation</mark></b><br>" . \common\InvestorHelper::streaks($investor['investment']);
           /*  if ($ecwitiCoin) {
              $system = \common\models\CoinSystem::find()->orderBy(['id' => SORT_DESC])->one();
              $is_unlimited = \common\Helper::has_unlimited_coin();
              if ($is_unlimited) {
                $result .= "<br><b>Coin Status</b><br>" .
                        "<span style='width: 100%;position: absolute'><b>&#x221E;</b></span>";
              } else {
                $result .= "<br><b><mark>Coin Status</mark></b><br>" .
                        "<span style='width: 100%;position: absolute'><b>&lt; &#x221E;</b></span>"; */
                /* $result .= "<br><b><mark>Current Coin</mark></b><br>" .
                  "<span style='width: 100%;position: absolute'>" .
                  \frontend\views\widgets\WalletStatusWidget::widget(['number' => $ecwitiCoin->current_ecwicoin]) .
                  "</span>"; */
              /* }
              $result .= "<br><b>Available Coin</b><br>" .
                      "<span style='width: 100%;position: absolute'><u>" .
                      \frontend\views\widgets\WalletStatusWidget::widget([
                          'number' => $ecwitiCoin->current_ecwicoin,
                          'link' => ['ecwiti-social-profile/available-coins']
                      ]) .
                      "</span></u>";
              $result .= "<br><b>Received Coin</b><br>" .
                      "<span style='width: 100%;position: absolute'><u>" .
                      \frontend\views\widgets\WalletStatusWidget::widget([
                          'number' => $ecwitiCoin->received_ecwicoin,
                          'link' => ['ecwiti-social-profile/coin-change-history', 'type' => 1]
                      ]) .
                      "</span></u>";
              $result .= "<br><b>Spent Coin</b><br>" .
                      "<span style='width: 100%;position: absolute'><u>" .
                      \frontend\views\widgets\WalletStatusWidget::widget([
                          'number' => $ecwitiCoin->spent_ecwicoin,
                          'link' => ['ecwiti-social-profile/coin-change-history', 'type' => 2]
                      ]) .
                      "</span><br></u>";
            } */
          //}
          ?>
          <p style="font-size: 0.8em; text-align: left;width: 100%;">

            <?PHP //= \common\Helper::status() ?>
            <?php
			
            if (\Yii::$app->session->hasFlash('message')) {
              echo '<br>' . \Yii::$app->session->getFlash('message') . "<br>";
            }
            ?>
            <?= $result ?>
          </p>

        </div>

        <?= $content ?>

        <hr>

        <!--
        <?=
		
        \yii\helpers\Html::a('<input type="submit" value="Ecwiti Brand Market" style="color: white; font-size: 0.8em; background-color: black; text-align: left; -webkit-appearance: none; -moz-appearance: none; appearance:none;" class="input-lg"> ',
                ['dashboard/ecwiti-market'])
        ?>
                <br>

        <?=
        \yii\helpers\Html::a('<input type="submit" value="Ecwiti Investor Market" style="color: white; font-size: 0.8em; background-color: black; text-align: left; -webkit-appearance: none;-moz-appearance: none; appearance:none;" class="input-lg"> ',
                ['dashboard/ecwiti-market'])
        ?>
                <br>
        -->

        <?= yii\helpers\Html::beginForm(['site/logout', 'id' => 'team-form'], 'post') ?>
        <input type="submit" id="logout" value="Logout" class="input-lg" style="color: white; background-color: black; text-align: left; font-size: 1em; width:auto; height: 50px; -webkit-appearance: none;
               -moz-appearance: none;
               appearance:none; ">

        <?= Html::endForm() ?>
      <?php else: ?>
        <?php echo $content; ?>
      <?php endif; ?>

      <div class="row" style="margin-top:5rem;">
        <hr class="f">
        <p>
          <small>
      <!--      <?= Html::a('<strong>COMPANY</strong>', ['/site/menu', 'type' => 'company']) ?> | -->
            <?= Html::a('<strong>LEGAL</strong>', ['/site/menu', 'type' => 'legal']) ?> |
            <?= Html::a('<strong>FAQ</strong>', ['/site/faq', 'type' => 'faq']) ?>
          </small>
        </p>
      </div>

    </div>
    <?php $this->endBody() ?>
    <script>
      function TestsFunction() {
        var T = document.getElementById("TestsDiv"),
                displayValue = "";

        if (T.style.display == "")
          displayValue = "none";

        T.style.display = displayValue;
      }
    </script>
  </body>
</html>
<?php $this->endPage() ?>
