<?php
//dump($all_articles_categories);
?>
<div id="portfolio_anchor_section" class="portfolio-section" style="margin-top:133px;">
    <div class="container-fluid">
        <h1 class="wow slideInLeft" data-wow-duration="2.5s" data-wow-delay="0.3s" data-wow-offset="120">
            <b style="color:#50cae8;">On this site you can buy books on programming.</b>
        </h1>
        <?php if( isset( $all_articles_categories ) && is_object( $all_articles_categories ) ):?>
        <p class="wow slideInLeft" data-wow-duration="3.5s" data-wow-delay="0.5s" data-wow-offset="120" style="font-size:22px;">
            <b>On this site you can buy books on programming. In our collection:</b>
            <?php for( $i=0, $cnt=count($all_articles_categories); $i < $cnt; ++$i ):?>
                <li class="wow slideInLeft" data-wow-duration="3.5s" data-wow-delay="0.<?=($i+3)?>s" data-wow-offset="120" style="font-size:22px;color:green;text-transform:uppercase;"><?=$all_articles_categories[$i]->title?></li>
            <?php endfor;?>
                <li class="wow slideInLeft" data-wow-duration="3.5s" data-wow-delay="1.9s" data-wow-offset="120" style="font-size:22px;color:green;">and another books...</li>
        </p>
        <?php endif;?>
    </div> <!--/.container-fluid-->
</div> <!--/#services_anchor_section-->