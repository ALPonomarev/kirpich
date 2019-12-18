<?php
	session_start();
	?>
	<header>
	<?php    
    require_once("header.php");
	?>
	</header>

<body>
	<div class="old_feedback">
	<form action="do_review.php" method="post" name="review">
		<textarea id="window_rev"  maxlength="480" rows="10" cols="120" name="review_add"  aria-required="true" placeholder="Оставьте Ваш отзыв"></textarea>

		<br>
		<input type="submit" name="add_review" value="Отправить отзыв">
	</form>
	</div>
	
<!--  -->

</body>
<footer>
	<?php
    require_once("footer.php");
	?>
</footer>








