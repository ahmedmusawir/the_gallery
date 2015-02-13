<?php include '_includes/header.php'; ?>
 
 <!-- CONTAINER STARTS HERE -->
    <section class="container">
      
        <form action="index.php" method="POST" role="form">
        	<legend class="alert alert-warning">Here You Can Find Info on Your Favorite Actors</legend>
        
        	<div class="form-group">
        		<label for="q">Pick a Letter</label>
        		 <select name="q" class="form-control" id="q">
                	<?php
                	$word = str_split('abcdefghijklmnopqrstuvwxyz');
	                	foreach ($word as $letter) {
	                		# code...
	                		echo "<option value={$letter}>{$letter}</option>";
	                	}
                	?>
                </select>
        	</div>
        
        	<button type="submit" class="btn btn-primary">Submit</button>
        </form>
		<hr>
        <?php if(isset($actors)) : ?>
        <ul>
	        	<?php
	        		if($actors){

			        	foreach ($actors as $a) {
			        		# code...
			        		echo "<li>
			        		<a class='btn btn-default' href='actor.php?actor_id={$a->actor_id}'>{$a->first_name} {$a->last_name}</a>
			        		</li>";
			        	}
			    
			        
					    }else {
					        	echo "<hr>";
					        	echo "<h2 class='alert alert-danger'>No Actors Found, Plz Try a Different Letter ...</h2>";
						}
				?>
		</ul>	
        <?php endif; ?>
        
    </section>
    <!-- CONTAINER ENDS HERE -->
<?php include '_includes/footer.php'; ?>
