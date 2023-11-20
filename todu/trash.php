<div class="post-content custom-post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single_news.php?id=<?php echo $row['news_id'];?>">
                                    <img class="fixed-size-img" src='admin/upload/<?php echo $row['news_img']; ?>' alt=""/>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3 class="post-title">
                                        <a href='single_news.php?id=<?php echo $row['news_id'];?>'>
                                            <?php echo $row['title']; ?>
                                        </a>
                                    </h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php?cid=<?php echo $row['category']; ?>'>
                                                <?php echo $row['category_name']; ?>
                                            </a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php?aid=<?php echo $row['author']; ?>'>
                                                <?php echo $row['username']; ?>
                                            </a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $row['publish_date']; ?>
                                        </span>
                                    </div>
                                    <p class="post-description">
                                        <?php echo substr($row['description'],0,130). "..."; ?> 
                                        <!-- To only take 130 char in the description -->
                                    </p>
                                    <a class='read-more pull-right' href='single_news.php?id=<?php echo $row['news_id'];?>'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>