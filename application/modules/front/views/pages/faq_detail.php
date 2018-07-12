<div class="main_container">

<section class="banner inner_banner" style="background-image:url(<?php echo base_url(); ?>assets/images/FAQ-Banner.png);">

</section>

<section class="video_sec blog_wrap">
<div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-9">
            <div class="blog_box faq">
                <h2>Frequently Asked Questions?</h2>
                <div class=" blog_box_content">
                <?php foreach($faqs as $f) { ?>
                    <div class="faq_box">
                        <h3>Q: <?php echo $f['question']; ?></h3>
                        <p>A: <?php echo $f['answer']; ?></p>
                    </div>
                <?php } ?>
                   
                </div>
                
            </div>

        </div>
    </div>

</div>

</div>
</section>


<?php 
    echo getScholarshipForm();
    echo getTestimonails();
    echo getVideoGallerySection();
?>

</div>