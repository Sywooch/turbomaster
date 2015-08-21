<?php
use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
                                                                                                      
<title><?= Html::encode($this->title) ?></title>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin,cyrillic-ext);
#outlook a {padding:0;} body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
.ExternalClass {width:100%;} .ExternalClass, .ExternalClass p, .ExternalClass span, 
.ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 140%;}
.backgroundTable {margin:0; padding:0; width:100% !important;}
img {text-decoration:none; -ms-interpolation-mode: bicubic;} img a, a img {border:0px!important; color: #000000; text-decoration: none;}
span.autoLinks a {color: #ffffff!important; text-decoration: none!important;}
span.preheader {font-size: 0; line-height: 0; display: none;}
table {border-collapse: collapse;}
p {margin:0; padding:0; margin-bottom:0;}
.emailCopy p {margin: 0px 0px 0px 0px;}
.emailCopy a, .emailArticleHeading a, .emailImageHeading a, .emailButtonHeading a, .emailHeadline a {color: #b64a4e; text-decoration: underline;}
.emailCTA a {color: #000000; text-decoration: none; font-weight: bold;}
.emailGreenCTA a {color: #ffffff; text-decoration: none;}
.headlines p {margin: 0px 0px 1px 0px;}
@media screen and (max-device-width: 550px), screen and (max-width: 550px) {
    body {padding: 0px!important;}
    *[class="emailDisplayFullWidth"] {width: 100%!important; min-width: 100%!important; max-width: 100%!important; border: none!important; height: auto!important;}
    *[class="emailBlock"] {width: 100%!important; padding: 0px!important;}
    *[class="emailBlockButton"] {width: 100%!important; padding: 0px!important;}
    *[class="emailArticleHeading"] {padding: 0px!important; font-size: 22px!important; line-height: 32px!important;}
    *[class="emailImageHeading"] {padding: 20px 0 0 0!important; font-size: 22px!important; line-height: 32px!important;}
    *[class="emailButtonHeading"] {text-align: center; padding-bottom: 15px!important;}
    *[class="emailCopy"] {font-size: 14px!important; line-height: 142%!important;}
    *[class="emailSection"] {padding: 25px 20px 30px 20px!important;}
    *[class="emailTopBar"] {padding: 20px 20px!important;}
    *[class="emailHeadline"] {padding: 0 0 10px 0!important; font-size: 32px!important; line-height: 40px!important;}
    *[class="emailFooter"] {padding: 25px 20px 0 20px!important;}
    *[class="emailIcon"] {text-align: left!important;}
    *[class="emailSponsored"] {text-align: left!important; padding: 15px 0 15px 0!important;}
    *[class="emailButton"] {padding: 11px!important;}
    *[class="emailRemovePadding"] {padding: 0px!important;}
    body[yahoo="fix"] .emailCTA a {margin-top: 15px; display: block; border-radius: 4px; padding: 10px 15px 10px 15px; margin-left: -2px; background: #f2f2f2 url(http://i8.cmail2.com/ti/y/F2/F5A/E0D/103022/rarr.png) no-repeat 95% 50%; background-size: 20px 10px;}
}
</style>
</head>
<body yahoo="fix"  bgcolor="#eaeaea" style="margin-top:0; margin-bottom:0; margin-right:0; margin-left:0; padding-top:0;padding-bottom:0; padding-right:0;padding-left:0; min-width:100%!important; width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;">
<?php $this->beginBody() ?>
<span class="preheader" style="display:none!important; font-size:0; line-height:0;" ></span>
<table class="backgroundTable" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#eaeaea" style="border-collapse:collapse;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;width:100% !important;">
    <tr>
        <td class="emailRemovePadding" style="padding-top:0; padding-bottom:25px; padding-right:0; padding-left:0;">
            <table class="emailDisplayFullWidth" width="620" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; border-width:1px;border-style:solid; border-color:#eeeeee;">
                <!-- header -->
                <tr>
                    <td class="emailTopBar" bgcolor="#aaaaaa"  width="100%" style="padding-top: 10px; padding-bottom: 8px; padding-right: 30px; padding-left: 30px;" >
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="width:100%!important;border-collapse:collapse;">
                            <tr>
                                <td width="100%">
                                    <div style="display: block; width: 137px; height: 44px; background: url(http://turbotest.crocusbit.ru/images/logo-mini.png) no-repeat;"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- /header -->
    <?= $content ?>
                <!-- footer row -->
                <tr>
                    <td bgcolor="#aaaaaa" class="emailFooter" style="padding-top: 6px; padding-bottom: 6px; padding-right: 80px; padding-left: 30px; font-family: 'Open Sans',Arial,sans-serif; color: #333; font-size: 13px;">Email informator</td>
                </tr><!-- /footer row -->
            </table>
        </td>          
    </tr>
</table>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
