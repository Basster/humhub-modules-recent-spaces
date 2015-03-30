<div class="modal-dialog modal-dialog-normal animated fadeIn">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;</button>
            <h4 class="modal-title">
                <?php
                echo Yii::t('RecentSpacesModule.views_recentSpaces_list', '<strong>Recent</strong> spaces');
                ?>
            </h4>
        </div>
        <br>

        <ul class="media-list">
            <?php
            $i = 0;
            foreach ($spaces as $spaceRow) {
                // check if the profile is valid
                if ($spaceRow != null) {
                    // get the corresponding user
                    $space = Space::model()->findByPk($spaceRow['space_id']);
                    ?>
                    <li>
                        <a href="<?php echo $space->getUrl(); ?>">
                            <div class="media">
    						<span class="pull-left circle"><?php
                                echo $pages->getCurrentPage() * $pages->getPageSize() + (++$i);
                                ?>
    						</span>

                                <img
                                    src="<?php echo $space->getProfileImage()->getUrl(); ?>"
                                    class="img-rounded tt img_margin pull-left" height="50" width="50"
                                    alt="50x50" style="width: 50px; height: 50px;"
                                    data-src="holder.js/50x50">


                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <strong><?php echo CHtml::encode($space->name); ?></strong>
                                    </h4>

                                    <div class="recent-spaces">
                                        <?php if ($space->description): ?>
                                            <div class="description">
                                                <?php echo CHtml::encode($space->description); ?>
                                            </div>
                                        <?php endif ?>
                                        <div class="entry pull-left title">
                                                <span class="count"><?php echo $spaceRow['num_members']; ?></span> <?php echo Yii::t('RecentSpacesModule.views_recentSpaces_list', 'Members'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php
                }
            }
            ?>
        </ul>


        <div class="modal-footer" style="padding: 5px">
            <div class="pagination-container">
                <?php
                $this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'maxButtonCount' => 5,
                    'nextPageLabel' => '<i class="fa fa-step-forward"></i>',
                    'prevPageLabel' => '<i class="fa fa-step-backward"></i>',
                    'firstPageLabel' => '<i class="fa fa-fast-backward"></i>',
                    'lastPageLabel' => '<i class="fa fa-fast-forward"></i>',
                    'header' => '',
                    'htmlOptions' => array(
                        'class' => 'pagination'
                    ),
                    'id' => 'link_pager'
                ));
                ?>
            </div>
        </div>

    </div>
</div>

<script>
    $("ul#link_pager li a").on('click', function (e) {
        e.preventDefault();
        loadlistData($(this).attr('href'));
    });

    function loadlistData(url) {
        var search = $('#search').val();
        var url = url || '<?php echo Yii::app()->createUrl('admin/controller/action')?>';
        $.ajax({
            type: "GET", url: url, success: function (data) {
                $("#globalModal").html(data);
            }
        });
    }
</script>
