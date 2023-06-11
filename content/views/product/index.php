<?php require('content/views/shared/header.php'); ?>
    <div role="main" class="main shop">
        <div class="container">
            <hr class="tall">
            <div class="row">
                <ul class="breadcrumb">
                    <li><a href="<?php echo PATH_URL; ?>home">Home</a></li>
                    <li><a
                            href="category/<?php echo $subcategories['id'] . '-' . $subcategories['slug']; ?>"><?php echo $breadCrumb ?></a>
                    </li>
                    <li class="active"><?php echo $product['product_name'] ?></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="owl-carousel" data-plugin-options='{"items": 1}'>
                                <div>
                                    <div class="thumbnail">
                                        <img alt="<?= $product['product_name'] ?>"
                                             class="img-responsive img-rounded img-fluid"
                                             src="public/upload/products/<?php echo $product['img1'] ?>">
                                    </div>
                                </div>
                                <?php if (strlen($product['img2']) > 1) { ?>
                                    <div>
                                        <div class="thumbnail">
                                            <img alt="<?= $product['product_name'] ?>"
                                                 class="img-responsive img-rounded img-fluid"
                                                 src="public/upload/products/<?php echo $product['img2'] ?>">
                                        </div>
                                    </div>
                                <?php }
                                if (strlen($product['img3']) > 1) { ?>
                                    <div>
                                        <div class="thumbnail">
                                            <img alt="<?= $product['product_name'] ?>"
                                                 class="img-responsive img-rounded img-fluid"
                                                 src="public/upload/products/<?php echo $product['img3'] ?>">
                                        </div>
                                    </div>
                                <?php }
                                if (strlen($product['img4']) > 1) : ?>
                                    <div>
                                        <div class="thumbnail">
                                            <img alt="<?= $product['product_name'] ?>"
                                                 class="img-responsive img-rounded img-fluid"
                                                 src="public/upload/products/<?php echo $product['img4'] ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="summary entry-summary">
                                <h1 class="shorter"><strong><?php echo $product['product_name'] ?></strong></h1>
                                <p class="price">
                                    <?php if ($product['saleoff'] != 0) { ?>
                                        <del><span
                                                class="amount"><?php echo number_format($product['product_price'], 0, ',', '.'); ?></span>
                                        </del>
                                        <ins><span
                                                class="amount"><?php echo number_format(($product['product_price']) - (($product['product_price'] * $product['percentoff']) / 100), 0, ',', '.'); ?>
                                        VNĐ</span></ins>
                                    <?php } else { ?>
                                        <ins><span
                                                class="amount"><?php echo number_format($product['product_price'], 0, ',', '.'); ?>
                                        VNĐ</span></ins>
                                    <?php } ?>
                                </p>
                                <div class='rating-stars text-center'>

                                    <input id="productID" type="hidden"
                                           value="<?= $product['id'] ?>">
                                    <input id="userID" type="hidden" value="<?= $user_nav ?>">
                                    <ul id='stars'>
                                        <li class='star' title='Poor' data-value='1'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Fair' data-value='2'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Good' data-value='3'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Excellent' data-value='4'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='WOW!!!' data-value='5'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                    </ul>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        /* 1. Visualizing things on Hover - See next part for action on click */
                                        $('#stars li').on('mouseover', function () {
                                            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                                            // Now highlight all the stars that's not after the current hovered star
                                            $(this).parent().children('li.star').each(function (e) {
                                                if (e < onStar) {
                                                    $(this).addClass('hover');
                                                } else {
                                                    $(this).removeClass('hover');
                                                }
                                            });
                                        }).on('mouseout', function () {
                                            $(this).parent().children('li.star').each(function (e) {
                                                $(this).removeClass('hover');
                                            });
                                        });


                                        /* 2. Action to perform on click */
                                        $('#stars li').on('click', function () {
                                            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                                            var stars = $(this).parent().children('li.star');

                                            for (i = 0; i < stars.length; i++) {
                                                $(stars[i]).removeClass('selected');
                                            }

                                            for (i = 0; i < onStar; i++) {
                                                $(stars[i]).addClass('selected');
                                            }
                                            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                                            var productID = $('#productID').val();
                                            var userID = $('#userID').val();
                                            // console.log(ratingValue);
                                            //
                                            $.ajax({
                                                url: 'index.php?controller=product&action=rating',
                                                method: 'POST',
                                                data: {
                                                    ratingValue: ratingValue,
                                                    productID: productID,
                                                    userID: userID
                                                },
                                                success:function(data) {
                                                    if (data){
                                                        alert('Ban da danh gia: '+ratingValue + 'trên 5');
                                                    }else{
                                                        alert('Lỗi');
                                                    }
                                                }

                                            });

                                        });

                                    });
                                </script>

                                <p style="color: black" class="taller"><?php echo $product['product_description'] ?>
                                    . </p>
                                <form enctype="multipart/form-data" method="post" class="cart"
                                      action="cart/add/<?php echo $product['id']; ?>">


                                    <input type="hidden" name="slug" value="<?php echo $product['slug']; ?>">
                                    <div class="quantity">
                                        <input type="number" class="input-text qty text" title="Nhập Để Đổi Số Lượng"
                                               value="1" name="number_cart" min="1" step="1" max="100">
                                    </div>
                                    <button class="btn btn-primary btn-icon" role="button" type="submit"><i
                                            class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                    </button>
                                </form>
                                <div class="product_meta">
                                <span class="posted_in">Danh Mục Con: <a rel="tag"
                                                                         href="category/<?php echo $subcategories['id'] . '-' . $subcategories['slug']; ?>"><?php echo $breadCrumb ?></a></span>
                                </div>
                                <hr class="tall">
                                <div class="feedback">
                                    <a href="index.php?controller=feedback&action=index&product_id=<?= $product['id'] ?>"><b>Nhấn
                                            vào đây</b></a> để gửi phản hồi về sản phẩm này.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabs tabs-product">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#productDetail" data-toggle="tab">Chi tiết về sản
                                            phẩm</a>
                                    </li>
                                    <li><a href="#productInfo" data-toggle="tab">Thông tin khác</a></li>
                                    <li><a href="#productReviews" data-toggle="tab">BLuận (<?= $comments_total ?>)</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="productDetail">
                                        <p style="color: black;"><?php echo $product['product_detail'] ?></p>
                                    </div>
                                    <div class="tab-pane" id="productInfo">
                                        <table class="table table-striped push-top">
                                            <tbody>
                                            <tr>
                                                <th>
                                                    Size:
                                                </th>
                                                <td>
                                                    <?php echo $product['product_size'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Colors
                                                </th>
                                                <td>
                                                    <?php echo $product['product_color'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Material
                                                </th>
                                                <td>
                                                    <?php echo $product['product_material'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Total View
                                                </th>
                                                <td>
                                                    <?php echo $product['totalView'] ?> View
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Giảm giá
                                                </th>
                                                <td>
                                                    <?php if ($product['saleoff'] != 0) echo $product['percentoff'];
                                                    else echo '0'; ?> %
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="productReviews">
                                        <ul id="result" class="comments">
                                            <?php foreach ($comments as $comment) : ?>
                                                <li>
                                                <div class="comment">

                                                    <div class="img-thumbnail">
                                                        <image style="max-width: 80px;" alt=""
                                                               src="public/upload/images/<?= $comment['link_image'] ?>">
                                                        </image>
                                                    </div>
                                                    <div class="comment-block">
                                                        <div class="comment-arrow"></div>
                                                        <div>
                                                            <span style="color:black;"><?= $comment['createDate'] ?></span>

                                                            <strong><?= $comment['author'] ?></strong>
                                                        </div>
<!--                                                        <span class="comment-by">-->
<!---->
<!--                                                        </span>-->
                                                        <p style="color: black"><?= $comment['content'] ?></p>
                                                    </div>
                                                </div>
                                                </li><?php endforeach; ?>
                                        </ul>
                                        <hr class="tall">
                                        <h4>Thêm bình luận</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="index.php?controller=comment" id="submitReview"
                                                      method="post">


                                                    <input name="product_id" type="hidden"
                                                           value="<?= $product['id'] ?>">
                                                    <input name="user_id" type="hidden"
                                                           value="<?php echo $user_nav ? $user_nav : '0'; ?> ">
                                                    <div class="row">
                                                        <?php if (!isset($user_nav)) : ?>
                                                            <div class="form-group">
                                                                <div class="col-md-6">
                                                                    <label>Tên bạn *</label>
                                                                    <input type="text" value=""
                                                                           data-msg-required="Please enter your name."
                                                                           maxlength="100" class="form-control"
                                                                           name="author" id="author"
                                                                           placeholder="Please enter your name.."
                                                                           required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Email của bạn *</label>
                                                                    <input type="email" value=""
                                                                           data-msg-required="Please enter your email address."
                                                                           data-msg-email="Please enter a valid email address."
                                                                           maxlength="100" class="form-control"
                                                                           name="email"
                                                                           id="email"
                                                                           placeholder="Please enter your email..."
                                                                           required>
                                                                </div>
                                                            </div>
                                                        <?php else : ?>
                                                            <input name="author" type="hidden"
                                                                   value="<?= $user_login['user_name'] ?>">
                                                            <input name="email" type="hidden"
                                                                   value="<?= $user_login['user_email'] ?>">
                                                            <input name="link_image" type="hidden"
                                                                   value="<?= $user_login['user_avatar'] ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <?php if (isset($user_nav)) : ?>
                                                                    <label>Bạn đang đăng nhập với tài khoản
                                                                        <strong><?= $user_login['user_name'] ?></strong>.
                                                                        Bạn muốn <a
                                                                            href="admin.php?controller=home&action=logout">đăng
                                                                            xuất</a> ?</label>
                                                                <?php else : ?>
                                                                    <label>Bạn có muốn <strong><a
                                                                                href="admin.php?controller=home&action=login">đăng
                                                                                nhập</a></strong> để bình luận bằng tài
                                                                        khoản của bạn.!</label>
                                                                <?php endif; ?>
                                                                <textarea maxlength="5000"
                                                                          data-msg-required="Please enter your message."
                                                                          rows="10" class="form-control" name="content"
                                                                          id="message"
                                                                          placeholder="Nhập nhận xét hoặc tin nhắn hoặc bình luận của bạn về sản phẩm ....."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit" value="Xác nhận gửi"
                                                                   class="btn btn-primary"
                                                                   data-loading-text="Loading...">
                                                        </div>
                                                    </div>
                                                </form>

                                                <!-- <div class="row">
                                                <input name="product_id" id="product_id" type="hidden" value="<?= $product['id'] ?>">
                                                <input name="user_id" id="user_id" type="hidden" value="<?php echo $user_nav ? $user_nav : '0'; ?> ">
                                                <?php if (!isset($user_nav)) : ?>
                                                    <input name="link_image" type="hidden" id="link_image"
                                                        value="author-comment.png">
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <label>Tên bạn *</label>
                                                            <input type="text" value=""
                                                                data-msg-required="Please enter your name." maxlength="100"
                                                                class="form-control" name="author" id="author"
                                                                placeholder="Please enter your name.." required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Email của bạn *</label>
                                                            <input type="email" value=""
                                                                data-msg-required="Please enter your email address."
                                                                data-msg-email="Please enter a valid email address."
                                                                maxlength="100" class="form-control" name="email" id="email"
                                                                placeholder="Please enter your email..." required>
                                                        </div>
                                                    </div>
                                                <?php else : ?>
                                                    <input name="author" type="hidden" id="author"
                                                        value="<?= $user_login['user_name'] ?>">
                                                    <input name="email" type="hidden" id="email"
                                                        value="<?= $user_login['user_email'] ?>">
                                                    <input name="link_image" type="hidden" id="link_image"
                                                        value="<?= $user_login['user_avatar'] ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <?php if (isset($user_nav)) : ?>
                                                            <label>Bạn đang đăng nhập với tài khoản
                                                                <strong><?= $user_login['user_name'] ?></strong>. Bạn muốn
                                                                <a href="admin.php?controller=home&action=logout">đăng
                                                                    xuất</a>
                                                                ?</label>
                                                        <?php else : ?>
                                                            <label>Bạn có muốn <strong><a
                                                                        href="admin.php?controller=home&action=login">đăng
                                                                        nhập</a></strong> để bình luận bằng tài khoản của
                                                                bạn.!</label>
                                                        <?php endif; ?>
                                                        <textarea maxlength="5000"
                                                            data-msg-required="Please enter your message." rows="10"
                                                            class="form-control" name="content" id="message"
                                                            placeholder="Nhập nhận xét hoặc tin nhắn hoặc bình luận của bạn về sản phẩm ....."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: center;">
                                                    <button id="send-comment"
                                                        class="btn btn-primary" data-loading-text="Loading...">Xác nhận
                                                        gửi</button>
                                                </div>
                                            </div> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fb-comments"
                         data-href="<?php echo PATH_URL . 'product/' . $product['id'] . '-' . $product['slug']; ?>"
                         data-width="100%" data-numposts="5"></div>
                    <hr class="tall"/>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Sản phẩm <strong>Liên quan danh mục</strong></h2>
                        </div>
                        <?php $product_related = get_all('products', array(
                            'limit' => '8',
                            'where' => $subcategories['id'] . '=sub_category_id and id<>' . $product['id'], //liên quan theo category
                            'offset' => '0',
                            'order_by' => 'totalView DESC'
                        )); ?>
                        <ul class="products product-thumb-info-list">
                            <?php if (empty($product_related)) : ?>
                                <h3 class="col-sm-12">Không có sản phẩm liên quan nào.</h3>
                            <?php endif; ?>
                            <?php foreach ($product_related as $related_product) : ?>
                                <li class="col-sm-3 col-xs-12 product">
                                    <?php if ($related_product['saleoff'] != 0) : ?>
                                        <a href="type/3-san-pham-dang-giam-gia">
                                            <span class="onsale">-<?php echo $related_product['percentoff']; ?>%</span>
                                        </a>
                                    <?php endif; ?>
                                    <span class="product-thumb-info">
                                <form action="cart/add/<?php echo $related_product['id']; ?>" method="post">
                                    <input type="hidden" name="number_cart" value="1">
                                    <a class="add-to-cart-product"><button type="submit"
                                                                           href="cart/add/<?php echo $related_product['id']; ?>"><i
                                                class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button></a>
                                </form>
                                <a
                                    href="product/<?php echo $related_product['id']; ?>-<?php echo $related_product['slug']; ?>">
                                    <span class="product-thumb-info-image">
                                        <span class="product-thumb-info-act">
                                            <span class="product-thumb-info-act-left"><em>Lượt xem</em></span>
                                            <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i>
                                                    Chi tiết</em></span>
                                        </span>
                                        <img alt="<?= $related_product['product_name'] ?>" class="img-responsive"
                                             src="public/upload/products/<?php echo $related_product['img1']; ?>">
                                    </span>
                                </a>
                                <span class="product-thumb-info-content">
                                    <a
                                        href="product/<?php echo $related_product['id']; ?>-<?php echo $related_product['slug']; ?>">
                                        <h4 title="<?php echo $related_product['product_name']; ?>">
                                            <?php if (strlen($related_product['product_name']) > 50) echo substr($related_product['product_name'], 0, 57) . '...';
                                            else echo $related_product['product_name']; ?>
                                        </h4>
                                        <span class="price">
                                            <?php if ($related_product['saleoff'] != 0) { ?>
                                                <del><span
                                                        class="amount"><?php echo number_format($related_product['product_price'], 0, ',', '.'); ?></span></del>
                                                <ins><span
                                                        class="amount"><?php echo number_format(($related_product['product_price']) - (($related_product['product_price'] * $related_product['percentoff']) / 100), 0, ',', '.'); ?>
                                                    VNĐ</span></ins>
                                            <?php } else { ?>
                                                <ins><span
                                                        class="amount"><?php echo number_format($related_product['product_price'], 0, ',', '.'); ?>
                                                    VNĐ</span></ins>
                                            <?php } ?>
                                        </span>
                                    </a>
                                </span>
                            </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php $get_sidebar_with_only_product = 0;
                    require('content/views/shared/sidebar.php'); ?>
                </div>
            </div>
        </div>
    </div>

<?php
require('content/views/shared/footer.php');