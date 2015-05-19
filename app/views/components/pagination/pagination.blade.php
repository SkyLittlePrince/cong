
<?php
require_once(app_path() . "/views/components/pagination/ZurbPresenter.php");

$zurbPresenter = with(new ZurbPresenter($paginator));
?>

<div class="pagination">
	<ul class="links">
	    <?php echo $zurbPresenter->render(); ?>
	</ul>
	<div class="to-page">
	    <?php echo $zurbPresenter->toPage(); ?>
	</div>
</div>






