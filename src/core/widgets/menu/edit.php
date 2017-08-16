<!--link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css"-->
<!--script src="http://localhost/gila/lib/jquery/jquery-2.2.4.min.js"></script>
<script src="http://localhost/gila/lib/jquery/jquery-sortable.js"></script-->

<style>
.dragging, .dragging * {
  cursor: move !important;
}

.dragged {
  position: absolute;
  opacity: 0.4;
  z-index: 2000;
}

ol {
	padding-left: 16px;
	background: #ddd;
}
ol li {
	padding: 0px;
    margin-right: -1px;
    margin-bottom:-1px;
	border: 1px solid #bbb;
	background: #fff;
	min-height:20px;
    line-height: 3;
	list-style-type: none;
}
ol li i { margin:0 16px; }
ol li i.sort-item { cursor: ns-resize; }
ol li i.deletebtn { cursor: pointer; }

ol li p {
	display:inline;
	/*border-right: 1px solid #bbb;*/
	padding:0 12;
	width: 400px;
}
ol li.placeholder {
  position: relative;
}
ol li.placeholder:before {
  position: absolute;
  margin-right: 10px;
}

input {
    border: 0; display: inline-block; width: auto;
}
input:focus {
    outline: none;
}

.menu_headers div,
.menu_nested input {width:150px; display: inline-block;}
</style>



<div class="gm-12">

<div class="menu_headers">
    <a class="btn btn-primary" onclick="add_item()" style="width:48px">+</a>
    <div>Title</div>
    <div>Url</div>
</div>

<ol class="menu_nested serialization vertical" style="display: inline-block;">
    <?php
    $mm = gila::menu();
    echo_children ($mm);

    function echo_children ($mm)
    {
        foreach ($mm as $mi) {
            echo "<li data-url=\"{$mi['url']}\" data-title=\"{$mi['title']}\"><i class='sort-item'>||</i>";
            echo "<input class='_title' value='{$mi['title']}'/><input class='_url' value='{$mi['url']}'/><i class='deletebtn fa fa-remove'></i><ol>";
            if (isset($mi['children'])) echo_children ($mi['children']);
            echo "</ol></li>";
        }
    }

    /*
            g.require('<?=gila::config('base')?>lib/jquery/jquery-sortable.js',function(){
                g.require('<?=gila::config('base')?>src/core/assets/menu_edit.js');
            });*/
    /*
    var textareas = document.getElementsByTagName('textarea');
    var count = textareas.length;
    for(var i=0;i<count;i++){
        textareas[i].onkeydown = function(e){
            if(e.keyCode==9 || e.which==9){
                e.preventDefault();
                var s = this.selectionStart;
                this.value = this.value.substring(0,this.selectionStart) + "\t" + this.value.substring(this.selectionEnd);
                this.selectionEnd = s+1;
            }
        }
    }
    */

    ?>

</ol>
</div>
