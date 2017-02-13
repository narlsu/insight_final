<div class="row">

	  	<h1><?= $travelPost->title;?></h1>
	  	<?php if ($travelPost->poster != ""): ?> 
	  	<div>
		<img src="images/poster/<?=$travelPost->poster;?>" alt="<?= $travelPost->title; ?>">
		</div>
	  		<?php else: ?>
	  			<p>No posters found.</p>
	  		<?php endif; ?>

	  <p><?= $travelPost->description;?></p>	  
	
	<?php if(isset($_SESSION['privilege']) && $_SESSION['privilege'] === 'admin'): ?>
	  
	  	<a href="./?page=travel.edit&amp;id=<?= $travelPost->id;?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Edit travel</a>
	  
	  	<a href="./?page=travel.delete&amp;id=<?= $travelPost->id;?>" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Delete Movie</a>
	  
  <?php endif; ?>
	<h3>Comments</h3>
	<?php if(count ($allComments) > 0) : ?>
		<?php foreach ($allComments as $comment) :?>
			<p><<?=$comment['id'] .'.'. $comment['email'] ?></p>
			<p><?= $comment['comment']; ?></p>

		<?php endforeach; ?>
	<?php endif; ?>

	<?php if(isset($_SESSION['user_id'])): ?>
  	<section>
  	
  		<h5 id="comments">Add Comments</h5>
  		<form method="post" action="./?page=comment.create" class="form-horizontal">
  		<input type="hidden" name="movie_id" value="<?= $travelPost->id; ?>">
  				<div class="form-group">
	              <label for="comment" class="col-sm-2 control-label">Comment</label>
	              <div class="col-sm-10">
					<textarea class="form-control" id="comment" placeholder="Add Comments" name="comment"><?=$newcomment->comment;?></textarea>	        
	                  <span class="text-danger"><?=$newcomment->errors['comment'];?></span>
	              </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-sm-offset-2 col-sm-10">
	              		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Add Comments</button>
	            	</div>
	          	</div>
  		</form>
  	</section>
  	<?php else: ?>
  		<p>You need to be <a href="./?page=login">Logged in </a>to add comments.</p>
  	<?php endif; ?>
  </div>