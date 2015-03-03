<?php

if(count($facts) > 0 ) { 
    foreach($facts as $k => $fact) { ?>
        <div class="pane-item<?php if($k == 0) echo ' active'; ?>">
            <blockquote><?= $fact['content'] ?></blockquote>
        </div>
<?php 
    } 
}
?>

