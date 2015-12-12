<?php
	function alert($message, $redirect) {
		echo "
			<script>
				alert(\"$message\");
				window.location = \"$redirect\";
			</script>
			";
	}
?>