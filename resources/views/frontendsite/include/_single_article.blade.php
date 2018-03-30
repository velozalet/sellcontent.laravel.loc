<?php
//dump($single_article);
dump($is_user_cannot_view_hidden_content);

/* Получим данные Юзера,если он зарегин и авторизирован, иначе NULL. ($if_current_user_registered->id/$if_current_user_registered->name/$if_current_user_registered->email) */
$if_current_user_registered = Auth::user();  //также можно использовать конструкцию: if( Auth::check() ) { //вернет TRUE если юзер авторизировался в данный момент }
?>

<!-- Single article Section -->
<div id="singlearticle_anchor_section" class="singlearticle-section" style="margin-top:145px;">
    <div class="container-fluid">
        <h1 class="wow slideInLeft" data-wow-duration="2.5s" data-wow-delay="0.3s" data-wow-offset="120">
            <a href="" style="text-transform:uppercase; color:gray; text-decoration:none;"> <?=$single_article[0]->alias;?> </a>

        </h1>
        <p class="wow slideInLeft" data-wow-duration="3.5s" data-wow-delay="0.5s" data-wow-offset="120" style="font-size:15px;"> <?=$single_article[0]->alias;?> </p>

        <!--Single article-->
        <div class="col-lg-12 col-md-12">

            <?php if( isset($single_article) && is_object($single_article) ): ?>
            <ul id="ul_single_article" class="ul-single-article">
                <li id="li_single_article_id_<?=$single_article[0]->id;?>" class="li-single-article"
                    data-alias="<?=$single_article[0]->alias;?>"
                    data-articlescat="<?=$single_article[0]->articlesCategories->alias;?>">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 article-img">
                            <a href=""> <h4 class="text-center"><?=$single_article[0]->alias;?></h4> </a>
                            <img src="<?=asset('img/file_cover_images/'.$single_article[0]->images);?>" alt="<?=$single_article[0]->alias;?>">
                            <p class="date">
                                <span class="month"><?=date( 'M', strtotime($single_article[0]->created_at) );?></span>
                                <span class="day"><?=date( 'd', strtotime($single_article[0]->created_at) );?></span>
                            </p>
                        </div>
                        <div class="col-lg-12 col-md-12 article-desc">
                            <div class="article-desc-text"><?=$single_article[0]->desctext;?></div>
                            <div class="article-panel-info text-center">

                                <?php if( !Auth::check() ):?>
                                    <span style="color:red;padding:15px;outline:1px solid lightgray;display:block;margin-bottom:14px;font-size:15px;">
                                        (!) &nbsp;In order to buy the content you must <a href="{{ route( 'login') }}">register & login</a>
                                    </span>
                                <?php endif;?>
                                <ul>
                                    <button type="button" class="btn btn-primary article-btn-readmore" style="text-transform:uppercase"
                                            data-id="<?=$single_article[0]->articlesCategories->id;?>"
                                            data-alias="<?=$single_article[0]->articlesCategories->alias;?>">
                                        <?=$single_article[0]->articlesCategories->title;?>
                                    </button>
                                    <button type="button" class="btn btn-primary article-btn-readmore"><?=$single_article[0]->price;?> $</button>
                                    <?php if( Auth::check() ):?>
                                        <a href="" type="button" class="btn btn-success article-btn-readmore"> Bue this book </a>
                                    <?php endif;?>

                                    <?php if( Auth::check() && $is_user_cannot_view_hidden_content == false):?>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3" style="margin-top:22px;">
                                            <a href="/public/files_for_sale/<?=$single_article[0]->file_path;?>" type="button" class="btn btn-success" download> Download this file </a>
                                        </div>
                                    </div>
                                    <a href="<?=url('/download/'.$single_article[0]->file_path);?>" target="_blank">
                                        Click
                                    </a>
                                    <?php endif;?>
                                </ul>
                            </div>
                        </div>

                    </div> <!--/.row-->
                </li>
            </ul>
            <?php endif;?>

        </div> <!--/.col-*-->
        <!--Single article-->

    </div> <!--/.container-fluid-->
</div> <!--/#bloglist_anchor_section-->
<!-- /Single article Section -->