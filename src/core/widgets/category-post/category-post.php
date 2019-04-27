<style>
.five-post{
	display:grid;
}
.five-post>li{
	grid-column-start: 2;
	grid-column-end: 3;
}
.five-post>li:first-child{
	grid-column-start: 1;
	grid-column-end: 2;
	grid-row-start: 1;
	grid-row-end: 5;
}
.five-post>li:first-child>img{
	width: 100%;
	height: auto;
}
</style>
<ul class="g-nav vertical five-post">
<?php
if(!@class_exists('blog')) if(file_exists("src/blog/controllers/blog.php")){
    include_once "src/blog/controllers/blog.php";
    new blog();
} else return;


$stacked_file = 'tmp/stacked-wdgt'.$widget_data->widget_id.'.jpg';
$posts = [];
$img = [];
$widget_data->n_post = @$widget_data->n_post?:5;
$widget_data->category = @$widget_data->category?:null;

foreach (core\models\post::getPosts(
    ['posts'=>$widget_data->n_post, 'category'=>$widget_data->category]) as $r ) {
  $posts[] = $r;
  $img[]=$r['img'];
}
list($stacked_file,$stacked) = view::thumb_stack($img, $stacked_file,80,80);

foreach ($posts as $key=>$r ) {
	echo "<li>";
	echo "<a href='".blog::get_url($r['id'],$r['slug'])."'>";
	if($key>0) {
		if($stacked[$key]==false){
			if($img=view::thumb_xs($r['img'])) {
				echo "<img src='$img' style='float:left;margin-right:6px'> ";
			} else echo "<div style='width:80px;height:40px;float:left;margin-right:6px'></div> ";
		} else {
			$i = $stacked[$key];
			echo "<div style='background:url($stacked_file) 0 -{$i['top']}px; width:{$i['width']}px;height:{$i['height']}px;float:left;margin-right:6px'></div> ";
		}
	} else {
		if($img=view::thumb_md($r['img'])) {
			echo "<img src='$img'><br>";
		}
	}
	echo "{$r['title']}</a></li>";
}

?>
</ul>
