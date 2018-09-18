<!DOCTYPE html>
<html ng-app="myApp" <?php language_attributes(); ?> class="no-js">
<head>
    <base href="<?php bloginfo("url") ?>/">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php if(is_single()) wp_title(''); else bloginfo( 'name'); ?></title>	
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h3>Bootstrap</h3>
            </div>

            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p> -->
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
        </nav>
		
		<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
          <div class="container">
                <button id="sidebarCollapse" class="navbar-toggler collapsed float-left" type="button" data-toggle="collapse" data-target="#" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mx-auto" href="<?php bloginfo("url") ?>/">SURABAYAJOBFAIR</a>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <!-- <div class="navbar-nav-scroll"> -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=get_page_link(get_page_by_title( 'LOWONGAN TERPOPULER' ));?>">LOWONGAN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">EVENTS</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SERVICE</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="#">REKRUTMENT</a>
                                <a class="dropdown-item" href="#">IT CONSULTANT</a>
                                <a class="dropdown-item" href="#">TRAINING</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PERUSAHAAN</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown02">
                                <a class="dropdown-item" href="#">GAJI</a>
                                <a class="dropdown-item" href="#">UMR</a>
                                <a class="dropdown-item" href="#">REVIEW</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">BLOG</a>
                        </li>
                    </ul>
                    <!-- </div> -->
                    <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>