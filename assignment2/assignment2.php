<!DOCTYPE html>
<html>
<body>

<h5> Show 1 to 100, show "foo" for those number which are divisable by 3, show "bar" which are divisable by 5, show "foobar" where a number divisable by 3 and 5. </h5>

<ul>
   <?php
      $start = 1;
	  $end = 100;
	  for(;$start <= $end; $start++) {
	?>
		<li> 
			<?php 
			   echo $start . "&nbsp";
			   if($start % 3 == 0) {
				   echo "foo";
			   } if($start % 5 == 0) {
				   echo "bar";
			   } if($start % 5 == 0 && $start % 3 == 0) {
				   echo "&nbsp; foobar";
			   }
		     ?> 
		</li>
	<?php
	  }
   ?>
</ul

</body>
</html>
