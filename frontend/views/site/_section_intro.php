<?php
use yii\helpers\Html;

$class_bg  = rand(1, 2);
?>

<section id="main-intro">
    <div class="container-fluid">
        <div class="row">
            <div class="intro-bg bg-<?= $class_bg ?>">
                <div class="texture-overlay"></div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-4">
                         <?= $this->render('/layouts/_form_search', []); ?> 
                    </div>
                </div>            
            </div>
        </div>
    </div>
</section><!-- / #intro -->