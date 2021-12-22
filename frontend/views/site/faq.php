<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Faq';
$this->registerCss('.input-lg{border: none; font-size: 0.8em; text-align: left;}');

// FAQ can be edited in Backend, in section Settings
// Note:
// =====
// Use standard HTML tags. Their list and explanation can be found here: https://www.w3schools.com/tags/tag_img.asp (see the left column)
//
// When inserting images to FAQ (via Backend), use following <img> tag:
// <img src="../../web/howitworks.jpg" alt="Description, can be a sentence for Google Search">
// Why does the img path begin with "../../" ?
// - Because this file faq.php is in folder ECWITI/frontend/views/site/faq.php
// - But the img is located in the public folder ECWITI/frontend/web
// - So we have to navigate there using more "../" which means "go 1 folder up"
// Also check basics of SEO and how to write a valid HTML code

?>

<div class="site-login">
     <div class="addcustomfaq">
	 <p></p>
		<h2>FAQ</h2>
		<hr>
		<p id="market"><strong>What is Ecwiti.net</strong> <br>A market where you are the asset</p>
		<p><strong>What is an asset</strong><br>A useful or valuable thing or person. An item owned by another, regarded as having value</p>
		<p id="ecwiti"><strong>What is an Ecwiti</strong> <br>Someone that has joined Ecwiti.net and listed on the Ecwiti market</p>
		<p id="aficionado"><strong>What is an Aficionado</strong> <br>A owner of an Ecwiti. Aficionado's are Ecwiti's that socially endorse, appreciate and recognise others through acquisition</p>
		<p><strong>Why become an Aficionado</strong><br>Because you expect that an Ecwiti will appreciate or because you wish to "consume" the pleasure of owning a particular Ecwiti. Such assets also may give the aficionado status and power. Owning an Ecwiti may give one bragging rights</p>
		<p id="ascribed"><strong>What is an ascribed value</strong> <br>The last offer accepted to acquire the Ecwiti and become the aficionado of that Ecwiti</p>
		<p id="value"><strong>What drives valuation of an Ecwiti</strong> <br>The achievements of the Ecwiti - the more successful, the more in demand they might be</p>
		<p><strong>Why become an Ecwiti</strong><br>Ecwiti.net allows a completely new way to raise your value for personal projects, development and growth. Individuals can fuel their success by leveraging their social capital through becoming an Ecwiti. Aficionado’s may provide capital, support and social impact increasing chances of overall individual success</p>
		<p><strong>How do people find me</strong><br>When you register (or as we prefer to call it Ecwitize) you receive a QR code. You can send this QR code to your friends. Your friends can scan this code and view your profile at Ecwiti.net. You can also send invites to your friends too</p>
		<p><strong>How do I ecwitize</strong><br>Simply enter your name, upload your photo and connect your preferred social media</p>
		<p><strong>What qualifications are needed</strong> <br>Ecwiti.net is created for everyone. No qualifications are required</p>
		<p><strong>Do I have to give personal info<br></strong>No. However, we recommend accurate and genuine information is provided</p>
		<p><strong>Do I have to upload ID</strong><br>No. However, we recommend that accurate and genuine information is provided</p>
		<p><strong>What are the platform fees </strong><br>There is no fee to ecwitize. For transactions, Ecwiti.net will take a percentage of coin per transaction</p>
		<p><strong>What are the benefits</strong><br>An Ecwiti grants immediate access to itself. If someone wants to invest in someone – one can come to the platform, find the individual of interest, buy the respective Ecwiti in exchange for an agreed amount of coin. You can benefit financially and personally. Let's say you invest in a promising Ecwiti. Some time later they become more successful, a world-renowned CEO. Now you can sell your Ecwiti for a profit. You can liaise with them, maybe get advice from them. Your own demand may be greater too because you are or were the Aficionado of a world-renowned CEO</p>
		<p><strong>EcwiNET</strong><br>A new way to prioritize messages. Only those that have entered into an Ecwiti-Aficionado relationship can message each other. Alternative an Ecwiti can request coin from any sender before any message enters their inbox</p>
		<p><strong>EcwiWALL</strong><br>Only those that have entered into an Ecwiti-Aficioando relationship can participate in the comments section of each other’s wall. This encourages those that want to have a voice to align themselves with the Ecwiti they most value</p>
		<p id="ecwiticoin"><strong>What is coin</strong><br>This is our currency. You receive coin when: i.) your own Ecwiti is sold to a new Aficionado; ii.) you sell an Ecwiti you have previously acquired to a new Aficionado; iii.) you enter a voucher code; iv.) you perform an action that has a related coin reward. You may also receive coin from coin rain</p>
		<p><strong>What is coin rain</strong> <br>An unspecified amount of coin collected by Ecwiti.net as a tax from trades will be given back to Ecwiit's daily</p>
		<!-- <p id="levelup"><strong>What is levelling up </strong><br />As you invest and become the Aficionado of Ecwiti&rsquo;s you will level up</p> --> <!-- <p><strong>What is a wanted level</strong> <br />As an Ecwiti gains more Aficionado's it's wanted level will increase</p> -->
		<div class="row"><hr></div>
		<div class="row">&nbsp;</div>
		<p><img src="../images/animatephone.gif" width="95%"></p>
		<p>Ecwitize <a href="signup"><u>now</u></a> for free and receive 30 coins to start</p>
		<div class="row"><hr></div>
		</div>
</div>

<script>
var my_element = document.getElementById("anchor");

my_element.scrollIntoView({
  behavior: "smooth",
  block: "start",
  inline: "nearest"
});
</script>
