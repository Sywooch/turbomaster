
<div id="sidebar">
 <div class="sidebar-menu" style="">

  <div class="block">

    <h3 style="margin-top: 4px;">Бренды</h3>

    <ul class="navigation smaller">
      <li style="margin-bottom: 40px;"><?= CHtml::link('Все бренды', array('/admin/brand/index'), array('style'=>'color: #333;')); ?></li>
    </ul>  

    <h3 style="margin-top: 4px;">По категориям</h3>

    <ul class="navigation smaller">  
    <? 
    if($this->beginCache('adminListBrand', array('duration'=>10))) 
    { 
      $categories = Category::model()->findAll(array('order'=>'name'));
      foreach ($categories as $category) {        
        echo '<li>' .CHtml::link($category->name, array('/admin/brandizer/index', 'category_id'=>$category->id)) .'</li>' ."\n";     
    }
    $this->endCache(); 
    } ?>        
    </ul>
      

  </div><!-- /block -->
 </div><!-- /sidebar-menu -->
</div><!-- /sidebar -->