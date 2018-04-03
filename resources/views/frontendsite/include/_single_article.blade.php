<?php
//dd($single_article);

//dd($is_user_cannot_view_hidden_content);
//dd($id_users_bought_this_content);

/* Получим данные Юзера,если он зарегин и авторизирован, иначе NULL. ($if_current_user_registered->id/$if_current_user_registered->name/$if_current_user_registered->email) */
$if_current_user_registered = Auth::user();  //также можно использовать конструкцию: if( Auth::check() ) { //вернет TRUE если юзер авторизировался в данный момент }
?>

<!-- Single article Section -->
<div id="singlearticle_anchor_section" class="singlearticle-section" style="margin-top:145px;">

    <!-- Вывод ошибок списком если таковы будут при сохранении(добавлении)/редактировании/удалении данных -->
    @if( count($errors) > 0 )
        <div class="alert alert-danger text-center"> <!--class="box error-box"-->
            <img src="<?=asset('img/attention.png');?>" alt="" style="display:inline-block; float:left;">
            <ul style="display:inline-block; text-align:left;"> @foreach( $errors->all() as $error ) <li>{{ $error }}</li> @endforeach </ul>
        </div>
    @endif
    <!-- Вывод данных сессии.Будем выводить содержание ее ячейки 'status' при сохранении(добавлении)/редактировании/удаления данных. Сообщения об этом будем сами формировать и записывать в сессию -->
    @if( session('status') )
        <div class="alert alert-success text-center"> <!--class="box success-box"-->
            <i class="fa fa-check" style="font-size:48px; color:green; display:inline-block;"></i>
            <p style="display:inline-block;font-size:16px;">{{ session('status') }}</p>
        </div>
    @endif
    <!-- Вывод ошибок сессии.Если таковые будут иметь место -->
    @if( session('error') )
        <div class="box error-box">
            <p>{{ session('error') }}</p>
        </div>
    @endif

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

                                    <!--If the user is logged in and he don`t bought this article(book),then we display the "Bue this book"  button-->
                                    <?php if( Auth::check() ):?>
                                        <?php if( !in_array($if_current_user_registered->id, $id_users_bought_this_content) ):?>
                                            <a href="" type="button" class="btn btn-success article-btn-readmore" data-toggle="modal" data-target="#formBueUserModalWindow"> Bue this book </a>
                                        <?php endif;?>
                                    <?php endif;?>

                                    <!--If the user is logged in and he bought this article(book),then we display the "Download" button-->
                                    <?php if( Auth::check() ):?>
                                        <?php if( in_array($if_current_user_registered->id, $id_users_bought_this_content) ):?>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3" style="margin-top:22px;">
                                                    <a href="<?=url('/download/'.$single_article[0]->file_path);?>" type="button" class="btn btn-success" target="_blank"> Download this file </a>
                                                </div>
                                            </div>
                                        <?php endif;?>
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


<!--Modal window-->
<div id="formBueUserModalWindow" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Buy this book - <b><?=$single_article[0]->alias;?></b> for $ <b><?=$single_article[0]->price;?> </h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/checkout') }}" method="POST" id="payment-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id_customer" name="id_customer" value="<?=$if_current_user_registered->id?>">
                    <input type="hidden" id="name_customer" name="name_customer" value="<?=$if_current_user_registered->name?>">
                    <input type="hidden" id="email_customer" name="email_customer" value="<?=$if_current_user_registered->email?>">
                    <input type="hidden" id="price_article" name="price_article" value="<?=$single_article[0]->price;?>">
                    <input type="hidden" id="id_article" name="id_article" value="<?=$single_article[0]->id;?>">

                    <label for="select_currency">Please, selct currency:</label>
                    <select class="form-control" id="select_currency" name="select_currency" style="margin-bottom:22px;">
                        <option value="usd"> USD ($)</option>
                        <option value="eur">EUR (€) </option>
                    </select>
                    <div class="form-row">
                        <label for="card-element">
                            Credit or debit Your card:
                        </label>
                        <div id="card-element" style="border:1px solid #46b8da;">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display Element errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-info" style="margin-top:22px;">Submit Payment</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="display:none;">Close</button>
            </div>
        </div>

    </div>
</div>
<!--/Modal window-->