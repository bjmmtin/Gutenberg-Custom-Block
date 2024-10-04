<?php
/*
Plugin Name: CTA Modal
Description: The 'CTA Modal' plugin allows you to display a modal window when a user interacts with a button on your WordPress site. It's a simple yet effective way to engage users and provide additional content or actions without leaving the current page.
Version: 2.5
Author: Rena Thomas
Requires PHP at least: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function faust_cta_modal_block_register_block() {
    // Automatically loads the block's JS and CSS files according to the 'block.asset.php' file
    $block_assets = include( __DIR__ . '/block.asset.php' );

    // Register the block script
    wp_register_script(
        'faust-cta-modal-block',
        plugins_url( 'block.js', __FILE__ ),
        $block_assets['dependencies'], // Dependencies from block.asset.php
        $block_assets['version']       // Version from block.asset.php
    );

    // Register the block styles (editor-specific styles)
    wp_register_style(
        'faust-cta-modal-editor-style',
        plugins_url( 'editor.css', __FILE__ ),
        array(),
        $block_assets['version']
    );

    // Register the front-end styles
    wp_register_style(
        'faust-cta-modal-style',
        plugins_url( 'style.css', __FILE__ ),
        array(),
        $block_assets['version']
    );

    // Register the block
    register_block_type( 'faust/faust-cta-modal-block', array(
        'editor_script' => 'faust-cta-modal-block',  // Block editor JS
        'editor_style'  => 'faust-cta-modal-editor-style', // Block editor CSS
        'style'         => 'faust-cta-modal-style', // Enqueue front-end styles
        'render_callback' => 'render_cta_popup_block', // Render callback
        'attributes' => array(
            'ctatitle' => array(
                'type' => 'string',
                'default' => 'Find out if you Qualify for an Asbestos Cancer Lawsuit',
            ),
            'ctadescription' => array(
                'type' => 'string',
                'default' => 'Secure skilled legal representation for you and your family. Our dedicated attorneys work to resolve your claim efficiently, minimizing courtroom involvement. Contact us today to pursue the compensation you deserve.',
            ),
        ),
    ));
}

// Hook: Registers the block assets on the 'init' action
add_action( 'init', 'faust_cta_modal_block_register_block' );

function render_cta_popup_block($attributes) {
    ob_start();
    ?>

    <link rel="stylesheet" href="https://cms.mesowatch.com/wp-content/plugins/faust-cta-modal-block/style.css" />
    <div class="cta-popup-modal" >
        <div class='cta-popup'>
            <img src="<?php echo esc_url(plugins_url('images/icon_warning.png', __FILE__)); ?>" alt="Warning Icon" style="max-width: 66px; margin: auto;" />
            <h2 style="font-family: Zilla Slab; font-size: 25px; font-weight: 400; color: #fff;">
                Find out if you Qualify for a Asbestos Cancer Lawsuit
            </h2>
            <button class='cta-popup-button' onclick="document.getElementById('modal-cta').style.display='block'">
                Get Help Today—Free Case Review
            </button>
        </div>
        
        <!-- Modal -->
         <div id="modal-cta" class='modal-cta'>
             <div  class="modal-cta-content"  onclick="document.getElementById('modal-cta').style.display='none'">
                 <div class="modal-content" onclick="event.stopPropagation()">
                    <div style='padding: 10px; position: absolute; width: 100%'><span onclick="document.getElementById('modal-cta').style.display='none'" class='modal-close-button' >&times;</span></div>
                    <div class="modal-descript-mini">
                        <div style='display: flex; align-items: center;margin-top: 1rem; margin-bottom: 1rem;'>
                            <img alt="Icon Law" width="50" height="46" decoding="async" data-nimg="1" src="<?php echo esc_url(plugins_url('images/codicon_law.png', __FILE__)); ?>" style="color: transparent; width: 50.38px; height: 46.41px;">
                            <h2 class="modal-descript-mini-title">Contact a Leading Asbestos Cancer Attorney</h2>
                        </div>
                        <p class="modal-descript-mini-description">Secure skilled legal representation for you and your family. Our dedicated attorneys work to resolve your claim efficiently, minimizing courtroom involvement. Contact us today to pursue the compensation you deserve.</p>
                    </div>
                     <div class='modal-descript'>
                         <img src="<?php echo esc_url(plugins_url('images/codicon_law.png', __FILE__)); ?>" alt="Warning Icon" style='color: transparent; margin: auto auto 2rem; width: 178.75px; padding-top: 10rem;'/>
                         <h2 class='modal-descript-title'><?php echo esc_html($attributes['ctatitle']); ?></h2>
                         <p class='modal-descript-description'><?php echo esc_html($attributes['ctadescription']); ?></p>
                     </div>
                     <!-- Form -->
                     <div class="modal-form" >
                         <h2 class="modal-form-header">Your Information</h2>
                         <form method="post"  style="width: 100%; text-align: center;">
                             <div class="" style="max-width: 80%; padding: 15px 0px; margin: auto; text-align: left;">
                                 <div role="group" class='css-ojeslb' style="width: 100%; position: relative;">
                                     <input type="text" class="modal-form-input"  placeholder="" id="field_Z2ZfZm9ybV9maWVsZDo3OjE=" required="" aria-required="true" value="">
                                     <label formlabel="true" for="field_Z2ZfZm9ybV9maWVsZDo3OjE=" id="field-:r2:-label" class="modal-form-label">Full Name<span style="color: red;">*</span></label>
                                 </div>
                             </div>
                             <div class="" style="max-width: 80%; padding: 15px 0px; margin: auto; text-align: left;">
                                 <div role="group" class="css-ojeslb">
                                     <input class="modal-form-input" type="email"  placeholder="" id="field_Z2ZfZm9ybV9maWVsZDo3OjM=" value="">
                                     <label id="field-:r3:-label" for="field-:r3:" class="modal-form-label">Email</label>
                                 </div>
                             </div>
                             <div class="" style="max-width: 80%; margin: auto; text-align: left; padding: 15px 0px;">
                                 <div role="group" class="css-ojeslb">
                                     <input type="tel" class="modal-form-input" placeholder="" maxlength="13" id="field_Z2ZfZm9ybV9maWVsZDo3OjQ=" value="">
                                     <label formlabel="true" for="field_Z2ZfZm9ybV9maWVsZDo3OjQ=" id="field-:r4:-label" class="modal-form-label">Phone Number</label>
                                 </div>
                             </div>
                             <div class="" style="max-width: 80%; padding: 15px 0px; margin: auto; text-align: left;">
                                 <div role="group" class="css-ojeslb">
                                     <div class="chakra-select__wrapper">
                                         <select name="Z2ZfZm9ybV9maWVsZDo3OjU=" aria-label="Floating label select" id="field_Z2ZfZm9ybV9maWVsZDo3OjU=" class="modal-form-select">
                                             <option value="Please Select">Please Select</option>
                                             <option value="Mesothelioma">Mesothelioma</option>
                                             <option value="Lung Cancer">Lung Cancer</option>
                                             <option value="Ovarian Cancer">Ovarian Cancer</option>
                                             <option value="Other">Other</option>
                                         </select>
                                     </div>
                                     <label formlabel="true" for="field_Z2ZfZm9ybV9maWVsZDo3OjU=" id="field-:r5:-label" class="modal-form-label">Select Diagnosis</label>
                                 </div>
                             </div>
                             <div class="newsletter_inputField__kgBhD gfield gfield-TEXTAREA undefined form-floating" style="max-width: 80%; padding: 15px 0px 20px; text-align: left; margin: auto;">
                                 <div role="group" class="css-ojeslb"> 
                                     <textarea rows="6"  placeholder="" id="field_Z2ZfZm9ybV9maWVsZDo3OjY=" class="modal-form-text"></textarea>
                                     <label formlabel="true" for="field_Z2ZfZm9ybV9maWVsZDo3OjY=" id="field-:r6:-label" class="modal-form-label">Additionnal Case Details</label>
                                 </div>
                             </div>
                             <button type="submit" class="cta-submit-button" id="formsubmitbtn" >Get Help Today—Free Case Review</button>
                         </form>
                         <div style='display: flex; justify-content: center;'><p class='modal-extra-info'>We won't share any of your data with a 3rd party</p></div>
                     </div>
                 </div>
             </div>
         </div>
    </div>
    <?php
    return ob_get_clean();
}
