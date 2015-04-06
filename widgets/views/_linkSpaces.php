<div class="panel-body">
  <?php /** <@var Space[] $spaces */ ?>
  <?php foreach ($spaces as $space) : ?>
    <?php if ($space !== null) : ?>
      <a href="<?php echo $space->getUrl(); ?>">
        <img src="<?php echo $space->getProfileImage()->getUrl(); ?>" class="img-rounded tt img_margin"
             height="40"
             width="40" alt="40x40" data-src="holder.js/40x40" style="width: 40px; height: 40px;"
             data-toggle="tooltip"
             data-placement="top" title=""
             data-original-title="<strong> <?php echo CHtml::encode($space->name); ?></strong><br><?php echo CHtml::encode($space->name); ?>">
      </a>
    <?php endif ?>
  <?php endforeach; ?>
</div>