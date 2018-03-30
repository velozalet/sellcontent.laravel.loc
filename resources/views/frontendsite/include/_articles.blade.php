<?php
//dump($all_articles);
?>
<!-- Articles Section -->
<div id="portfolio_anchor_section" class="portfolio-section" style="margin-top:133px;">
    <div class="container-fluid">
        <h1 class="wow slideInLeft" data-wow-duration="2.5s" data-wow-delay="0.3s" data-wow-offset="120">
            <b style="color:#50cae8;">Files(Books) for sale</b>
        </h1>

        <p class="wow slideInLeft" data-wow-duration="3.5s" data-wow-delay="0.5s" data-wow-offset="120" style="font-size:15px;">
            Files for sale. See what we have and choose the right one for yourself.
        </p>

        <div class="col-lg-12 col-md-12 text-center">
            <?php if( isset( $all_articles ) && is_object( $all_articles ) ):?>
            <ul>
                <?php for( $i=0, $cnt=count($all_articles); $i < $cnt; ++$i ):?>
                <li id="portfolio_id_<?=$all_articles[$i]->id;?>" class="portfolio-block" data-alias="<?=$all_articles[$i]->alias;?>" data-filter="<?=$all_articles[$i]->price;?>">
                    <ul class="demo-3 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s" data-wow-offset="120">
                        <li>
                            <a href="{{ route( 'article_show_single', ['id' => $all_articles[$i]->id] ) }}">
                                <figure>
                                    <img src="<?=asset('img/file_cover_images/'.$all_articles[$i]->images);?>" alt="<?=$all_articles[$i]->alias;?>">
                                    <figcaption>
                                        <h2><?=$all_articles[$i]->alias;?> - <b style="color:#c9ff05;">$ <?=$all_articles[$i]->price;?></b></h2>
                                        <p><?=str_limit( $all_articles[$i]->desctext, Config::get('settings.limit_description_prev_file') );?></p>
                                        <h5 style="color:#c9ff05;">Category Book: <b style="text-transform:uppercase"><?=$all_articles[$i]->articlesCategories->title;?></b></h5>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endfor;?>
            </ul>
            <?php endif;?>
        </div>
    </div> <!--/.container-fluid-->
</div> <!--/#services_anchor_section-->
<!--/Articles Section -->