<?php if (isset($idslide)) : ?>
    <div class="slider-container">
        <div class="slider" id="revolutionSlider" data-plugin-revolution-slider
             data-plugin-options='{"startheight": 500}'>
            <ul>
                <li data-transition="fade" data-slotamount="13" data-masterspeed="300">
                    <img src="public/upload/slides/<?= $slide['slide_img1'] ?>" class="img-fluid" data-bgfit="cover"
                         data-bgposition="left top" data-bgrepeat="no-repeat">
                    <div class="tp-caption sft stb visible-lg" data-x="177" data-y="100" data-speed="300"
                         data-start="1000" data-easing="easeOutExpo"><img src="public/img/slides/slide-title-border.png"
                                                                          alt=""></div>
                    <div class="tp-caption top-label lfl stl" data-x="227" data-y="100" data-speed="300"
                         data-start="500" data-easing="easeOutExpo"></div>
                    <div class="tp-caption sft stb visible-lg" data-x="530" data-y="100" data-speed="300"
                         data-start="1000" data-easing="easeOutExpo"><img src="public/img/slides/slide-title-border.png"
                                                                          alt=""></div>
                    <!---->
                </li>
                <li data-transition="fade" data-slotamount="5" data-masterspeed="1000">
                    <img src="public/upload/slides/<?= $slide['slide_img2'] ?>" data-bgfit="cover"
                         data-bgposition="left top" data-bgrepeat="no-repeat">

                    <div class="tp-caption bottom-label sft stb" data-x="585" data-y="250" data-speed="500"
                         data-start="2000" data-easing="easeOutExpo"><?= $slide['slide_text2'] ?></div>
                </li>
                <li data-transition="fade" data-slotamount="5" data-masterspeed="1700">
                    <img src="public/upload/slides/<?= $slide['slide_img3'] ?>" data-bgfit="cover"
                         data-bgposition="left top" data-bgrepeat="no-repeat">

                    <div class="tp-caption bottom-label sft stb" data-x="585" data-y="250" data-speed="500"
                         data-start="2000" data-easing="easeOutExpo"><?= $slide['slide_text3'] ?></div>
                </li>
            </ul>
        </div>
    </div>
    <div class="home-intro" id="home-intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h2 class="search"
                        style="font-family: sans-serif;
                                font-size: 4.5rem;
                                margin-bottom: 4rem;
                                font-weight: 700;
                                ">
                        Hôm nay bạn tìm gì ?</h2>
                    <form method="get" action="<?php echo PATH_URL; ?>search/" method="get">
                        <input name="keyword" id="s" type="text"
                               placeholder='Hãy bắt đầu với từ khóa  "<?= $random_product_name ?>" xem sao'
                               style="background-color: hsla(0,0%,83.1%,.4);
                                position: relative;
                                width: 60%;
                                height: 4.125rem;
                                border: 2px solid #358e9d;
                                border-radius: 100vmax;
                                padding: 3rem;
                                font-size: 1rem
                                inpt:placeholder:{ font-family: sans-serif;font-weight: 200; } "
                               type="text" class="search-query">
                        <button type="submit" class="search_submit"
                                style="position: absolute;margin-top: 16px; margin-left: -70px; cursor: pointer; border: hidden ;  background-color: #0000">
                            <svg style="width: 22px; height: 22px;background-color: #0000" viewBox="0 0 21 21"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.8002 19.6905L17.9213 16.5856C19.5193 14.6641 20.3123 12.1989 20.1342 9.70609C19.9561 7.21325 18.8208 4.88587 16.9659 3.21104C15.1109 1.5362 12.68 0.643744 10.182 0.720377C7.68398 0.79701 5.31241 1.83678 3.56359 3.62217C1.81477 5.40756 0.824241 7.80016 0.79931 10.2992C0.774379 12.7983 1.71695 15.2102 3.4298 17.0301C5.14266 18.8501 7.49307 19.9369 9.98907 20.0634C12.4851 20.1898 14.9332 19.346 16.8212 17.7085L19.6462 20.7575C19.7892 20.9041 19.9838 20.9889 20.1884 20.9941C20.3931 20.9992 20.5916 20.9242 20.7418 20.785C20.8919 20.6458 20.9818 20.4535 20.9921 20.2491C21.0025 20.0446 20.9325 19.8442 20.7972 19.6905H20.8002ZM2.57025 10.5415C2.57025 8.96444 3.03792 7.42275 3.91412 6.11143C4.79031 4.80011 6.03567 3.77807 7.49273 3.17454C8.94979 2.57101 10.5531 2.41306 12.0999 2.72074C13.6467 3.02842 15.0675 3.78787 16.1827 4.90306C17.2979 6.01824 18.0574 7.43908 18.365 8.98588C18.6727 10.5327 18.5148 12.136 17.9112 13.5931C17.3077 15.0501 16.2857 16.2955 14.9744 17.1717C13.663 18.0479 12.1214 18.5155 10.5442 18.5155C8.42997 18.5134 6.40288 17.6726 4.90777 16.1777C3.41265 14.6828 2.57159 12.6558 2.56921 10.5415H2.57025Z"
                                    fill="#80949D"></path>

                            </svg>
                        </button>

                    </form>

                </div>
                <!--				<div class="col-md-4">-->
                <!--					<div class="get-started">-->
                <!---->
                <!--						<a href="search" class="btn btn-lg btn-primary">Đi đến trang tìm kiếm!</a>-->
                <!---->
                <!--					</div>-->
                <!--				</div>-->
            </div>
        </div>
    </div>
<?php endif; ?>