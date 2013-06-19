simm
====

##SIMple php render of Mustache template

A request once I met is exporting mysql result records into an Excel-read-able xml file for downloading, under PHP 4.*.
It is just a template work but I just couldn't recall any one familiar in php. And Mustache default php render requirs PHP >= 5.2

So this one works in PHP 4, simply but not much efficient

##Usage

	simm($template, $items);
	
##Example	
	
	<?php
	require_once 'simm.php';
	$sample = '<h1>{{header}}</h1>
		{{#bug}}
		{{/bug}}
		{{#items}}
		  {{#first}}
			<li><strong>{{name}}</strong></li>
		  {{/first}}
		  {{#link}}
			<li><a href="{{url}}">{{name}}</a></li>
		  {{/link}}
		{{/items}}
		{{#empty}}
		  <p>The list is empty.</p>
		{{/empty}}
		';
	$jsonstr = '{
		  "header": "Colors",
		  "items": [
			  {"name": "red", "first": true, "url": "#Red"},
			  {"name": "green", "link": true, "url": "#Green"},
			  {"name": "blue", "link": true, "url": "#Blue"}
		  ],
		  "empty": true
		}';

	$jsonarr = JSON_decode($jsonstr, true);
	
	echo simm($sample, $jsonarr);
	
	?>
