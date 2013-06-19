<?php
require_once('simm.php');

//test
$samplestr1 = '{{object}}aaaccc{{object}}aaaaaa{{object}}';
$samplestr = 'aaa{{#person}}ID is {{id}} and name is {{name}}...{{/person}}ccc{{{object}}}aaaaaa{{#ask}}kkkk{{object}}kk{{/ask}}wwwwwwwwww';
$it = array ( 
	"person" => array ( 
		array("id" => "001","name" => "aaa"),
		array("id" => "002","name" => "bbb"),
		array("id" => "003")
		),
	"object" => "app<le",
	"ask" => true
);
//echo simm($samplestr, $it);

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

//print_r($jsonarr);

echo simm($sample, $jsonarr);

?>