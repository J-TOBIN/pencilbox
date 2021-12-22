<body onload="window.location='#anchor';"><style>
    mark {
        background-color: inherit;
        color: black;
    }
</style>

<?php

use common\Helper;
use common\models\IndividualAficionado;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\IndividualAficionadoPrimaryMarket;


$result = '';
$typeText = \common\InvestorHelper::getType($model);
$portfolioUrl = "$typeText-investor/profile";

$result .= '<div class="row">
<div class="six columns">
<br>


<a id="anchor">
<h2>Ecwiti<br>QR<br>View</h2>
<p style="font-size: 15px"><strong>&#x2148;</strong> Learn your value

<hr>

';


$parentOfUser = Helper::getParentOfInvestor($model['user_id']);
$user = User::findOne(['id' => $model['user_id']]);

$template = \common\models\Setting::get('ecwiti_qr_template');
$replacements = [];

if (strpos($template, '{image}')) {
    $path = Yii::$app->basePath . '/uploads/pictures/' . $model['confirmed_picture'];
    try {
        if (Yii::$app->request->getQueryParam('qr') == 1) {
            $path = Yii::$app->basePath . '/uploads/qr/' . $parentOfUser->slug . '.png';
        }
        $publishedPath = $this->assetManager->publish($path);
        if ($publishedPath) {
            $replacements['{image}'] = '
                    <a class="gallery-item" href="' . Url::to($publishedPath[1], true) . '">
                    <img src="' . Url::to($publishedPath[1], true) . '" width="95%" height="auto"></a>';
        }
    } catch (Exception  $e) {
        $replacements['{image}'] = '<img src="' . Url::to(Yii::getAlias('@web') . '/profile.png', true) . '" width="95%" height="auto">';
    }
}
$privacy = \common\models\EcwitiSocialProfilePrivacy::find()
    ->where(['user_id' => $user['investor_id']])
    ->one();

$esp = \common\EcwitiSocialProfileHelper::getEsp($user['investor_id']);

if ($esp) {
    if ($privacy && $privacy->card === 0) {
        $creator = Html::a($esp->firstname . ' ' . $esp->surname, ['/ecwiti-social-profile/card', 'espSlug' => $esp->slug]);
    } else {
        $creator = "Private";
    }
} else {
    $creator = "Private";
}
$replacements['{ecwiti_name}'] = "<b><mark>Ecwiti</mark> </b><br>" . $creator . "<br>";

if (strpos($template, '{ecwiti_status}') !== false) {
    $esp = \common\EcwitiSocialProfileHelper::getEsp($user['investor_id']);
    $ec_status = "ID NOT SUPPLIED";
    if ($esp->id_file) {
        $ec_status = "NO CERTIFICATE";
        if (!empty($esp->verification)) {
            $ec_status = "VERIFIED";
        }
    }
    $replacements['{ecwiti_status}'] = "<b><mark>Status</mark> </b><br>" . $ec_status . "<br>";
}


if (strpos($template, '{value}') !== false) {

    $ecwiti = empty($brand['ecwiti_market_value']) ?
        (empty($model['bought_back']) ? "Pending" : "REACQUIRED") : $brand['ecwiti_market_value'];
    $ecwitiAbbr = "";
    if (is_numeric($ecwiti)) {
        $link = ["/dashboard/ecwiti-value", 'slug' => $brand['slug'], 'brandType' => User::ACC_AFICIONADO_INDIVIDUAL];
        $replacements['{value}'] = "<b><mark>Value</mark> </b><br>"
            . \frontend\views\widgets\WalletStatusWidget::widget(['number' => $ecwiti, 'link' => $link])
            . "<br>";
    } else {
        $replacements['{value}'] = "<b><mark>Value</mark> </b><br>"
            . Html::a($ecwiti,
                ["/dashboard/ecwiti-value", 'slug' => $brand['slug'], 'brandType' => User::ACC_AFICIONADO_INDIVIDUAL],
                [
                    'class' => 'number_span'
                ]
            )
            . "<br>";
    }
}

if (strpos($template, '{wallet_details}') !== false && $parentOfUser) {
    $ecwitiCoin = \common\models\EcwitiCoin::findOne(['user_id' => $parentOfUser->id]);
    if (!empty($ecwitiCoin)) {
        $replacements['{wallet_details}'] = \frontend\views\widgets\WalletStatusWidget::widget(['ecwitiCoin' => $ecwitiCoin]);
    }
}

if (strpos($template, '{industry}') !== false) {
    $esp = \common\EcwitiSocialProfileHelper::getEsp($user['investor_id']);
    $about = $esp->about;
    $primaryMarket = $about['market'];
    $primaryMarket = \common\models\IndividualInvestorPrimaryMarket::findOne(['id' => $primaryMarket]);
    $primaryMarket = $primaryMarket ? $primaryMarket->name : 'Not selected';
    $replacements['{industry}'] = "<b> <mark> Industry </mark> </b><br>" . $primaryMarket;
}

if (strpos($template, '{covid}') !== false) {
    $replacements['{covid}'] = Helper::covidStatus($parentOfUser);
}

if (strpos($template, '{country}') !== true) { // i have changed this to true because aficionado was not displaying when country was not set //
    if (!empty($brand['investors'])) {
        $investor = \common\InvestorHelper::getUser($brand['investors']);
        $replacements['{aficionado}'] = "<b><mark>Aficionado</mark></b><br>" . Html::a($investor->brand_name, ['/dashboard/investor-ecwiti-market', 'name' => $investor->public_id, 'backbutton' => true]) . "<br>";
    } else {
        $replacements['{aficionado}'] = "<b><mark>Aficionado</mark></b><br> Pending<br>";
    }
}

//location
if (strpos($template, '{country}') !== false) {
    $esp = \common\EcwitiSocialProfileHelper::getEsp($user['investor_id']);
    $about = $esp->about;
   // $location = $model['confirmed_location'] ? $model['confirmed_location'] : $model['location'];
    $location = (!empty($about['location']) && in_array($about['location'], Yii::$app->params['countries']) ? $about['location'] : "Not selected");

    $replacements['{country}'] = "<b> <mark>Country</mark> </b><br>" . $location . "<br>";
}

$updated_at = Yii::$app->formatter->asDate($model['updated_at']);
$replacements['{updated_date}'] = "<b> <mark>Last Updated Date</mark> </b><br>" . $updated_at . "<br>";

$replacements['{online_status}'] = "<b> <mark> Status  </mark> </b><br>" . \common\Helper::isOnline($model['user_id']) . "<br>";
if (!empty($brand)) {
    $replacements['{sex}'] = "<b> <mark> Sex  </mark> </b><br>" . $brand['confirmed_sex'] . "<br>";
}

if (strpos($template, '{social}') !== false) {
    $replacements['{social}'] = '<b><mark>Social Media</mark></b><br>'
        . Html::a('<i>E</i>', ['/ecwiti-social-profile/card', 'espSlug' => $esp->slug], ['target' => '_blank']) . ' '
        . Yii::$app->controller->renderPartial('/common/social_market', ['model' => $model]) . "<br>";
}

$replacements['{id}'] = "<p><b><mark>ID</mark></b><br>" . $model['public_id'] . "<br>";

$replacements['{nudges}'] = "<b><mark>Nudges</mark> </b><br>" . Html::a($brand['pokes'], ["/aficionado-individual/pokes", 'slug' => $brand['slug']]) . "<br>";

$replacements['{reputation}'] = "<b><mark>Reputation </mark> </b><br>" . \common\InvestorHelper::streaks($model['investment']) . "<br>";
$replacements['{wanted_level}'] = "<b><mark>Wanted Level</mark> </b><br>" . \common\AficionadoHelper::streaks($brand['investor']) . "<br>";

if (strpos($template, '{received_offers}') !== false) {
    $offers = \common\models\Offer::find()
        ->where(['to' => $brand['user_id']])
        ->count();

    $replacements['{received_offers}'] = "<b> <mark> Offers Received </mark> </b><br>" .
        $offers . "<br>";
}
if (strpos($template, '{sent_offers}') !== false) {
    $offersMade = \common\models\Offer::find()
        ->where(['to' => $model['user_id']])
        ->count();

    $replacements['{sent_offers}'] = "<b> <mark> Offers Made </mark> </b><br>" .
        $offersMade . "<br>";
}

//watcher
$replacements['{watchers}'] = "<b><mark>Watchers</mark> </b><br>" . Html::a($brand['watchers'], ["/aficionado-individual/watched-by-investors", 'slug' => $brand['slug']]) . "<br>";

$replacements['{ecwitized_date}'] = '<b> <mark> Ecwitized </mark></b><br>'
    . Yii::$app->formatter->asDate($model['published']);

if (strpos($template, '{last_offer}') !== false) {
    $last_offer = \common\models\Offer::find()
        ->where(['brand' => $brand['id']])
        ->orderBy(['created_at' => SORT_DESC])
        ->one();
    $isPublic = empty($privacy) || empty($privacy->offer_history) || $privacy->offer_history == 0;

    if (!$isPublic) {
        $last_offer = 'Private';
    } elseif (!empty($last_offer)) {
        $last_offer = \frontend\views\widgets\WalletStatusWidget::widget([
            'number' => $last_offer->amount,
            'link' => [
                'offer/history', 'slug' => $parentOfUser->slug
            ]
        ]);
    } else {
        $last_offer = 'Pending';
    }

    $replacements['{last_offer}'] = "<b> <mark> Last offer </mark> </b><br>" .
        $last_offer
        . "<br>";
}

$result .= strtr($template, $replacements);

if (!empty($brand)) {
    $result .= Html::a("<input type=\"submit\" value=\"More\" class='submit' style='background-color: white; color: black;  width: 45%; font-size: 17px; height: 2em; -webkit-appearance:none;border-style: outset; border-color: white; -moz-appearance:none'> ", ['/dashboard/card', 'brandSlug' => $brand['slug'], 'investorSlug' => $model['slug']]) . "<br>";
}
$result .= Html::a(" <input type=\"submit\" value=\"Portfolio\" class='submit' style='background-color: white; color: black; width: 45%; font-size: 17px; height: 2em; -webkit-appearance:none;border-style: outset;border-color: white; -webkit-appearance: none;-moz-appearance:none'> ", [$portfolioUrl, 'slug' => $model['slug']]) . "<br>";

$result .= Html::a(" <input type=\"submit\" value=\"Social\" class='submit' style='background-color: white; color: black; width: 45%; font-size: 17px; height: 2em; -webkit-appearance:none;border-style: outset;border-color: white; -webkit-appearance: none;-moz-appearance:none'> ",
        ["/media/choose-type", 'slug' => $model['slug'], 'accountType' => $model['type']]) . "<br>";

if (!empty($brand)) {
//    $result .= Html::a("<input type=\"submit\" value=\"TM/Patent\" class='submit' style='background-color: black; color: white; width: 45%; font-size: 17px; height: 2em; -webkit-appearance:none;'> ", ['/aficionado-individual/profile', 'slug' => $brand['slug']]) . "<br>";
    $result .= Html::a(" <input type=\"submit\" value=\"Watch\" class='submit' style='background-color: white; color: black; width: 45%; font-size: 17px; height: 2em; -webkit-appearance:none;border-style: outset;border-color: white; -webkit-appearance: none;-moz-appearance:none'> ", ["/dashboard/influencer-watchlist", 'slug' => $brand['slug']]) . "<br>";
    $result .= Html::a(" <input type=\"submit\" value=\"Buy Me\" class='submit' style='background-color: white; color: black; width: 45%; font-size: 17px; height: 2em; -webkit-appearance:none;border-style: outset;border-color: white; -webkit-appearance: none;-moz-appearance:none'> ", ["/offer/create", 'slug' => $brand['slug']]) . "<br>";
}


// display if it is not called by offer
if (!isset($offer)) {

    $isWatching = \common\models\Poke::find()
        ->where(['poked' => $model['user_id']])
        ->andWhere(['poker' => Yii::$app->user->id])
        ->one();

    $watchlist = \common\models\InvestorInvestorWatch::find()
        ->where(['watched' => $model['user_id']])
        ->andWhere(['watcher' => Yii::$app->user->id])
        ->one();

    if ($isWatching) {
        $result .= "<input type=\"submit\" value=\"U NUDGED\" class='submit' style='background-color: black; color: white; width: 25%; font-size: 17px; height: 2em; -webkit-appearance:none;'> <br>";
    }

    if ($watchlist) {
        $result .= "<input type=\"submit\" value=\"U NUDGED\" class='submit', style='background-color: black; color: white; width: 25%; font-size: 17px; height: 2em; -webkit-appearance:none;'> <br>";
    }
    //  $result .= Html::a(" <input type=\"submit\" value=\"Nudge\" class='submit' style='background-color: black; color: white; width: auto; font-size: 17px; height: 2em; -webkit-appearance:none;'> ", ["/dashboard/watch-investor", 'slug' => $model['slug'], 'onclick' => Url::remember()]) . "<br>";
}


if (isset($nudgedTime)) {
    $result .= ' NUDGED ON ' . Yii::$app->formatter->asDate($nudgedTime);
}


$result .= "<br><br><hr>";

$result .= '</div></div>';

echo $result;

?>
