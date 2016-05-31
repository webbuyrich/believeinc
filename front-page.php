<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package believeinc
 */

get_header(); ?>
    
    
        <div class="row">

            <?php masterslider("ms-1"); ?>

               
        </div>
        
            <div class="row news">
                <div class="container">
                    <div class="row-fluid">
                        <h1 class="page-header">NEWS</h1>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4><i class="fa fa-fw fa-check"></i> Bootstrap v3.2.0</h4>
                            </div>
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                                <a href="#" class="btn btn-default">Learn More</a>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4><i class="fa fa-fw fa-check"></i> Bootstrap v3.2.0</h4>
                            </div>
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                                <a href="#" class="btn btn-default">Learn More</a>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4><i class="fa fa-fw fa-check"></i> Bootstrap v3.2.0</h4>
                            </div>
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                                <a href="#" class="btn btn-default">Learn More</a>
                            </div>
                        </div>
                    </div>            
                </div>                   
            </div>
        
        
<?php

get_footer();
