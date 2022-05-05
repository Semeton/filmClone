<?php

//use slavkovrn\imagecarousel\imageCarouselWidget;
use coderius\swiperslider\SwiperSlider;
use yii\bootstrap4\Carousel;
use yii\bootstrap4;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<style type="text/css">
.row img {
    border-radius: 12px !important;
    height: 900px;
    margin: 0px auto !important;
    align-items: center;
    align-content: center;

}

a.genre {
    display: block;
    text-align: center !important;
    letter-spacing: 3px;
    font-size: 2rem;
    margin: 1.4% 0;
}
</style>


<div class="hold">

    <?=
    Carousel::widget([
        'items' =>[ 
                
                '<img src="../../web/images/bg.jpg" class="img-responsive" style="width:100%;;"/>',
                '<img src="../../web/images/bg.jpg" class="img-responsive" style="width:100%;;"/>',
                '<img src="../../web/images/bg.jpg" class="img-responsive" style="width:100%;;"/>'

        ]]);

?>

</div>




<div class="site-index">

    <a href="../movies/index" class="genre">Action</a>
    <div class="container">
        <div class="row">
            <div class="">
                <img src="../../web/images/bg.jpg" class="img-responsive">
            </div>
            <!-- <div class="col-2">
                <img src="../../web/images/bg.jpg" class="img-responsive">
            </div> -->
            <!-- <div class="col-sm-2">
                <img src="images/bg.jpg" class="img-responsive">
            </div>
            <div class="col-sm-2">
                <img src="images/bg.jpg" class="img-responsive">
            </div>
            <div class="col-sm-2">
                <img src="images/bg.jpg" class="img-responsive">
            </div>
            <div class="col-sm-2">
                <img src="images/bg.jpg" class="img-responsive">
            </div> -->
        </div>

    </div>


    <a href="" class="genre"> Comedy</a>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <img src="../../web/images/bg.jpg" class="img-responsive">
            </div>
        </div>

    </div>


    <a href="" class="genre">Horror</a>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <img src="../../web/images/bg.jpg" class="img-responsive">
            </div>
        </div>

    </div>

    <a href="" class="genre">Drama</a>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <img src="../../web/images/bg.jpg" class="img-responsive">
            </div>
        </div>


        <a href="" style="display: block; text-align:center; margin:2%;">see all Genres</a>

    </div>