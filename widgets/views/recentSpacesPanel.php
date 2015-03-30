<div class="panel panel-default" id="recent-spaces-panel">

    <!-- Display panel menu widget -->
    <?php $this->widget('application.widgets.PanelMenuWidget', array('id' => 'recent-spaces-panel')); ?>

	<div class="panel-heading">
        <?php echo Yii::t('RecentSpacesModule.base', '<strong>Recent</strong> spaces'); ?>
    </div>
	<div class="panel-body">
        <?php if (count($spaces) === 0): ?>
            <div class="placeholder"> <?php echo Yii::t('RecentSpacesModule.base', 'No spaces.') ?></div>
        <?php else:
          
            // run through the array of users
            /** @var Space $space */
            foreach ($spaces as $space) :
                // check if the user is valid
                if ($space != null) :  ?>
                 
				    <a href="<?php echo $space->getUrl(); ?>">
				        <img src="<?php echo $space->getProfileImage()->getUrl(); ?>"  class="img-rounded tt img_margin" height="40"
				            width="40" alt="40x40" data-src="holder.js/40x40" style="width: 40px; height: 40px;" data-toggle="tooltip"
				            data-placement="top" title="" 
				            data-original-title="<strong> <?php echo CHtml::encode($space->name); ?></strong><br><?php echo CHtml::encode($space->name); ?>">
							</a>
				
                        <?php
                endif;
            endforeach ?>
		  <hr />
             <?php
            // Button Get a list of most active users
            echo CHtml::link(Yii::t('RecentSpacesModule.base', 'Get a list'), $this->createUrl('//recent_spaces/recentSpaces/list'), array(
                'class' => 'btn btn-info',
                'data-toggle' => 'modal',
                'data-target' => '#globalModal'
            ));
            ?>
        <?php endif ?>
    </div>
</div>

