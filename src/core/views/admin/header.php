<!DOCTYPE html>
<html lang="<?=gila::config('language')?>">

<head>
    <base href="<?=gila::base_url()?>">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?=gila::config('admin_logo')?:'assets/gila-logo.png'?>">

    <title>Gila CMS - Administration</title>

    <?=view::css('lib/font-awesome/css/font-awesome.min.css')?>
    <?=view::css('src/core/assets/simple-sidebar.css')?>
    <?=view::css('lib/gila.min.css')?>
    <style>
    #sidebar-wrapper .g-nav li{ color:#fff;}
    #sidebar-wrapper .g-nav li a{ color:#ccc; }
    #sidebar-wrapper .g-nav li a i{ margin: 0 4px; }
    #sidebar-wrapper .g-nav li ul li a{ color:#444; }
    #sidebar-wrapper .g-nav li ul{ box-shadow:1px 1px 4px black;border:0 }
    #sidebar-wrapper .g-nav li a:hover{ background:var(--main-dark-color);color:white }
    .g-nav li ul{min-width: 200px}
    .dark-orange li ul{ background-color: #fff;}
    .dark-orange li ul li{ color: var(--main-color); }
    .dark-orange li ul li a{ color: var(--main-color); }
    .dark-orange li ul li a:hover{ color:white; }
    .widget-area-dashboard{display: grid; grid-template-columns: auto auto auto; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); grid-gap: 20px;}
    .widget-area-dashboard > * {box-shadow: 0px 1px 6px #999; margin:0}
    .widget-area-dashboard .widget{background:white}
    .widget-area-dashboard .widget-title {border-bottom: 1px solid #ddd; padding: var(--main-padding); background: var(--main-bg-color); color: var(--main-color); }
    </style>

    <?=view::script("lib/jquery/jquery-3.3.1.min.js")?>
    <?=view::script("lib/gila.min.js")?>


</head>

<body style="background:#f5f5f5">

    <div id="wrapper">

        <!-- Sidebar g-nav vertical -->
        <div id="sidebar-wrapper">
            <div style="position: relative;height: 100px;">
                <a href="admin">
                    <img style="max-width:180px;max-height:60px" src="<?=gila::config('admin_logo')?:'assets/gila-logo.png'?>" class="centered">
                </a>
            </div>
            <ul class="g-nav vertical">
                <?php
                    foreach (gila::$amenu as $key => $value) {
                        if(isset($value['access'])) if(!gila::hasPrivilege($value['access'])) continue;
                        if(isset($value['icon'])) $icon = 'fa-'.$value['icon']; else $icon='';
                        echo "<li><a href='".gila::url($value[1])."'><i class='fa {$icon}'></i> ".__("$value[0]")."</a>";
                        if(isset($value['children'])) {
                            echo "<ul class=\"dropdown\">";
                            foreach ($value['children'] as $subkey => $subvalue) {
                                if(isset($subvalue['access'])) if(!gila::hasPrivilege($subvalue['access'])) continue;
                                if(isset($subvalue['icon'])) $icon = 'fa-'.$subvalue['icon']; else $icon='';
                                echo "<li><a href='".gila::url($subvalue[1])."'><i class='fa {$icon}'></i> ".__("$subvalue[0]")."</a></li>";
                            }
                            echo "</ul>";
                        }
                        echo "</li>";
                    }
                ?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="g-group fullwidth bordered" style="vertical-align:baseline; background:white;">
                <a href="#menu-toggle" class="btn btn-white g-group-item" id="menu-toggle" title="Toggle Menu"><i class='fa fa-bars'></i></a>
                <a href="<?=gila::config('base')?>" class="btn btn-white g-group-item" title="Homepage" target="_blank"><i class='fa fa-home'></i></a>
            <span class="g-group-item fullwidth text-align-right pad">


                <ul class="g-nav">
                <li>
                    <i class="fa fa-user"></i> <?=session::key('user_name')?> <i class="fa fa-angle-down"></i>
                    <ul class="text-align-left" style="right:0">
                        <li><a href="<?=gila::config('base')?>admin/profile"><?=__("My Profile")?></a></li>
                        <li><a href="<?=gila::config('base')?>admin/logout"><?=__("Loggout")?></a></li>
                    </ul>
                </li>
                </ul>
            </span>
        </div>
        <div class="md-12">

            <div style="background:#d6d6d6; padding:12px" class="row caption">
                <div style="padding-left: 15px;">
                    <?php
                    echo ucwords(router::controller());
                    if($item = router::action()) echo ' \\ '.ucwords($item);
                    if($item = router::get(null,1)) echo ' \\ '.(ucwords($item))?>
                </div>
            </div>
            <div class="wrapper bordered" style="background:white;margin:10px" id='main-wrapper'>
