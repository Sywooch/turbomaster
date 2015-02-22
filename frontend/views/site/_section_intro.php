<?php
use yii\helpers\Html;
?>

<section id="main-intro">
    <div class="container-fluid">
        <div class="row">
            <div class="intro-bg">
                <div class="texture-overlay"></div>
                    <div class="col-md-6 nopadding">
                    </div>
                    <div class="col-md-4 nopadding">
                         <?= $this->render('/layouts/_form_search', []); ?> 
                    </div>
                </div>            
            </div>
        </div>
    </div>
</section><!-- / #intro -->