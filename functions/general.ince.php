<?php
function outputErrors($errors) {
	$output = '<p style="color:red">' . implode('</li><li>', $errors) . '</p>';
	return $output;
}