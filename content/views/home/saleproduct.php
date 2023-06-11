<div role="main" class="main shop">
    <div class="container">
        <hr class="tall">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h2><a href="type/1-san-pham-hot">Sản Phẩm <strong>Gợi Ý</strong></a></h2>
                    </div>
                    <ul class="products product-thumb-info-list">
                        <?php if (empty($rc)) : ?>
                            <h3 class="col-sm-12">Không có sản phẩm nào trong danh mục này.</h3>
                        <?php endif; ?>
                        <?php foreach ($rc as $recommend) : ?>
                            <?php global $linkconnectDB;
                            $sql = "SELECT * FROM products WHERE id = '$recommend'";
                            $result = $linkconnectDB->query($sql); ?>
                            <?php if ($result->num_rows > 0) : ?>
                                <?php $row = $result->fetch_assoc() ?>
                                <li class="col-sm-3 col-xs-12 product">
<!--                                    --><?php //if ($row['saleoff'] != 0) : ?>
<!--                                        <a href="type/3-san-pham-dang-giam-gia">-->
<!--                                            <span class="onsale">---><?php //echo $rc['percentoff']; ?><!--%</span>-->
<!--                                        </a>-->
<!--                                    --><?php //endif; ?>
                                    <span class="product-thumb-info">
									<form action="cart/add/<?php echo $row['id']; ?>" method="post">
										<input type="hidden" name="number_cart" value="1">
										<a class="add-to-cart-product"><button type="submit"
                                                                               href="cart/add/<?php echo $row['id']; ?>"><i
                                                    class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button></a>
									</form>
									<a href="product/<?php echo $row['id']; ?>-<?php echo $row['slug']; ?>">
										<span class="product-thumb-info-image">
											<span class="product-thumb-info-act">
												<span
                                                    class="product-thumb-info-act-left"><em>Lượt xem: <?php echo $row['totalView']; ?></em></span>
												<span class="product-thumb-info-act-right"><em><i
                                                            class="fa fa-plus"></i> Chi tiết</em></span>
											</span>
											<img alt="<?= $row['product_name'] ?>" class="img-responsive"
                                                 src="public/upload/products/<?php echo $row['img1']; ?>">
										</span>
									</a>
									<span class="product-thumb-info-content">
										<a href="product/<?php echo $row['id']; ?>-<?php echo $row['slug']; ?>/">
											<h4 title="<?php echo $row['product_name']; ?>"><?php if (strlen($row['product_name']) > 20) echo substr($row['product_name'], 0, 20) . '...';
                                                else echo $row['product_name']; ?></h4>
											<span class="price" style="text-align: center">
												<?php if ($row['saleoff'] != 0) { ?>
                                                    <del><span
                                                            class="amount"><?php echo number_format($row['product_price'], 0, ',', '.'); ?></span></del>
                                                    <ins><span
                                                            class="amount"><?php echo number_format(($row['product_price']) - (($row['product_price'] * $row['percentoff']) / 100), 0, ',', '.'); ?> VNĐ</span></ins>
                                                <?php } else { ?>
                                                    <ins><span
                                                            class="amount"><?php echo number_format($row['product_price'], 0, ',', '.'); ?> VNĐ</span></ins>
                                                <?php } ?>
                                                </span>
										</a>
									</span>
								</span>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                    <div style="text-align: center; padding-bottom: 30px" class="col-md-12">
                        <a href="type/1-san-pham-hot" class="btn btn-primary">Xem thêm →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
