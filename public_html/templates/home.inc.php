<?php $count=0;?>
<div class="row travel-contain">
<?php foreach ($travelContents as $travelPost) :?>

	
	
		
		<div class="large-3 medium-6 small-12 columns travel-div">
			<figure class="fig-cont">

				<a class="home-mid-a" alt="<?php $travelPost->title?>" href="./?page=travelhighlight&amp;id=<?= $travelPost->id;?>">

				<img class="home-thumb" src="images/poster/thumbnails/<?php echo $travelPost->poster;?>" alt="">
					<div class="fig-container">
					<figcaption class="figcap-home">
						<?php echo $travelPost->title; ?>
					</figcaption>'
					</div>
				</a>
			</figure>
		</div>
	
<?php endforeach; ?>
</div>

