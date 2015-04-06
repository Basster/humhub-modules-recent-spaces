<div>
  <ul class="media-list">
    <?php /** <@var Space[] $spaces */ ?>
    <?php foreach ($spaces as $space) : ?>
      <?php if ($space !== null) : ?>
        <li>
          <a href="<?php echo $space->getUrl(); ?>">
            <div class="media">
              <img src="<?php echo $space->getProfileImage()->getUrl(); ?>" class="media-object img-rounded pull-left"
                   height="40"
                   width="40" alt="40x40" data-src="holder.js/40x40" style="width: 40px; height: 40px;"
                   data-toggle="tooltip"
                   data-placement="top" title=""
                   data-original-title="<strong> <?php echo CHtml::encode($space->name); ?></strong><br><?php echo CHtml::encode($space->name); ?>">

              <div class="media-body">
                <strong><?php echo CHtml::encode($space->name); ?></strong><br/>
                <?php echo CHtml::encode(Helpers::truncateText($space->description, 40)); ?>
              </div>
            </div>
          </a>
        </li>
      <?php endif ?>
    <?php endforeach; ?>
  </ul>
</div>