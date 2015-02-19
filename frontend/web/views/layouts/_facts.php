<?php
use common\models\Fact;

$facts = Fact::find()->asArray()->all();
$factsArray = [];
foreach($facts as $fact) { $factsArray[] = ['content' => $fact['content']]; }
$jsFactsArray = json_encode($factsArray);
?>

<div class="h3">ТурбоФакты</div>
        <p id="fact-holder"><?= $factsArray[0]['content'] ?></p>
        <ins>
            <a href="#" onclick="return prevFact()">
                <img src="/images/rewind-back.png" width="16" height="16" alt="Назад">
            </a>
            <a href="#" onclick="return nextFact()">
                <img src="/images/rewind-forward.png" width="16" height="16" alt="Вперед">
            </a>
        </ins>

<script type="text/javascript">
//<![CDATA[
var turboFacts = <?= $jsFactsArray ?>;
var turboFactsCurrent = 0;
var factHolder = document.getElementById('fact-holder');
nextFact = function(){ 
    turboFactsCurrent += 1; 
    if ( turboFacts.length <= turboFactsCurrent ) turboFactsCurrent = 0; 
    factHolder.innerHTML = turboFacts[turboFactsCurrent].content; 
    return false; 
}
prevFact = function(){ 
    turboFactsCurrent -= 1; 
    if ( 0 > turboFactsCurrent ) turboFactsCurrent = ( turboFacts.length - 1 ); 
    factHolder.innerHTML = turboFacts[turboFactsCurrent].content; 
    return false; 
}
//]]>
</script>