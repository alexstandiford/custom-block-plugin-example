<?php

if ( ! isset( $template ) || ! $template instanceof \Custom_Blocks\Blocks\Hello_World ) {
	return;
}

?>
<h1 class="hello-world">Hey, this is a custom callback, and it is inside my template!</h1>