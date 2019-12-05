
              <?php
                /*
                 * This is the plant post format.
                 *
                 * So basically this is a plant bio post. if you don't want to use post formats,
                 * you can just copy this stuff in here and replace the post format thing in
                 * single.php.
                 *
                 * The other formats are SUPER basic so you can style them as you like.
                 *
                 * Again, If you want to remove post formats, just delete the post-formats
                 * folder and replace the function below with the contents of the "format.php" file.
                */
              ?>

              <article id="post-<?php the_ID(); ?>" <?php //post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting" class="plant-article">

            

            
                <?php
                // the content (pretty self explanatory huh)
                the_content(); ?>
                <div class="shelf-main">
                  <div class="shelf-content">
                    <div class="shelf-col-1">
                      <div class="plant-names">
                        <div class="names">
                          <h1 class="plant-name"><span class="main-frame frame-sm"> <span class= "inner-frame frame-content"><?php 
                          if(get_field('common_name')){ 
                            the_field('common_name');
                          } ?></span></span></h1> 

                          <h2 class="latin-name"> Latin Name: <?php 
                          if(get_field('latin_name')){ 
                            the_field('latin_name');
                          } ?>  </h2>
                        </div>
                      </div>

                  
                      <ul class="plant-care-list">
                        <li class="sunlight-item">
                          <img src="<?php echo get_template_directory_uri() ?>/library/images/icons/sunlight.svg" class="svg"/>
                          <p><?php if(get_field('sunlight')){ 
                          the_field('sunlight');
                          }?> </p>
                        </li>
                        <li class="water-item">
                          <img src="<?php echo get_template_directory_uri() ?>/library/images/icons/waterdrop.svg" class="svg"/>
                          <p><?php if(get_field('water_frequency')){ 
                          the_field('water_frequency');
                          }?> </p>
                        </li>
                        <li class="soil-item">
                          <img src="<?php echo get_template_directory_uri() ?>/library/images/icons/soil.svg" class="svg" 
                          />
                          <p> <?php if(get_field('soil_quality')){ 
                          the_field('soil_quality');
                          }?> </p>
                        </li>
                        <li class="grow-item">
                          <img src="<?php echo get_template_directory_uri() ?>/library/images/icons/growth.svg" class="svg"/>
                          <p><?php if(get_field('growth')){ 
                          the_field('growth');
                          }?> </p>
                        </li>
                      </ul> 
                    </div>
                    <div class="shelf-col-2">
                      <div class="frame leaning-frame <?php if(get_field('image_orientation') == 'Portrait'){
                              
                              echo 'img-portrait';
                            } else {
                              
                              echo 'img-landscape';
                          } ?> ">
                      <?php 
                      $image = get_field('plant_image');
                      if( !empty( $image ) ): ?>
                          
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="plant-image frame-content" />
                      </div>
                            
                      <?php endif; ?>
                    </div>
                  </div>
                  
                  <div class="shelf-1 shelf-grey"><!--This is just a Div used to create the shelf--></div>

                </div>

                <div class="plant-bio">
                  <p> <?php if(get_field('plant_details')){ 
                    the_field('plant_details');
                  }?> </p>
                </div>

                <!-- I want to add information here of three random plants that have the same catagory -->
                <div class="gallery gallery-of-3">
                  <?php 
                  $query_args = array (
                    'post_type' => 'plants',
                    'posts_per_page' => 3,
                    'orderby' => 'rand'
                  );

                  $result = new WP_query($query_args);

                  while ($result->have_posts()) : $result->the_post(); ?>

                  <article id="post-<?php the_ID(); ?>" role="article">
                    
                  <a href ="<?php the_permalink()?>">
                    <picture class="frame-sm">
                      <?php
                      $image = get_field('plant_image');
                                if( !empty( $image ) ): ?>
                      
                        <img 
                          src="<?php 
                          echo esc_url($image['url']); ?>" 
                          alt="<?php 
                          echo esc_attr($image['alt']); ?>"                 
                          width="300px" 
                          class="plant-image frame-content <?php if(get_field('image_orientation') =='Portrait'){
                                      echo 'img-portrait';
                                      } else {
                                      echo 'img-landscape';
                          } ?> " 
                        />
                        <div class="middle">
                          <div class="text"><?php the_title() ?> </div>
                        </div>
                                      
                      <?php endif; ?>	
                    </picture>
                  </a>											

                  </article>

                  <?php 
                  endwhile; 
                  wp_reset_query();?>
              
						    </div>
                

              </article> <?php // end article ?>
