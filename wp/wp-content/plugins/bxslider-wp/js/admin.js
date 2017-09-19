/*** Wrapper module for js store ***/
var cs_local_storage = (function () {
    return {
        get: function (key) {
            if(store!=undefined){
                return store.get(key);
            }
            return false;
        },
        set: function (key, value) {
            if(store!=undefined){
                store.set(key, value);
            }
        },
        remove: function (key) {
            if(store!=undefined){
                store.remove(key);
            }
        },
        clear: function () {
            if(store!=undefined){
                store.clear(); /*** Clear all keys ***/
            }
        }
    };
})();

function bxslider_select(me) {
    me.select();

    // Work around Chrome's little problem
    me.onmouseup = function() {
        // Prevent further mouseup intervention
        me.onmouseup = null;
        return false;
    };
};

/*** Class for handling open and close expandable and slide elements. Use together with cs_local_storage ***/
function CsUiOpen(data){
    if(!data){
        data = {};
    }
    this.expandables = data;/*** data format should be object[slideshow_id][element_index] ***/
}
CsUiOpen.prototype.get = function(slideshow, key){
    if(this.expandables[slideshow]!=undefined){
        if(this.expandables[slideshow][key]!=undefined){
            return this.expandables[slideshow][key];
        }
    }
    return false;
}
CsUiOpen.prototype.set = function(slideshow, key, value){
    if(typeof(this.expandables[slideshow])!=='object'){
        this.expandables[slideshow] = {};
    }
    
    this.expandables[slideshow][key] = value;
}
CsUiOpen.prototype.remove = function(slideshow, key){
    if(this.expandables[slideshow]!=undefined){
        if(this.expandables[slideshow][key]!=undefined){
            delete this.expandables[slideshow][key];
        }
    }
}
CsUiOpen.prototype.getAll = function(){
    return this.expandables;
}
CsUiOpen.prototype.clear = function(){
    this.expandables = {};
}


jQuery(document).ready(function($){
    /*** SLIDE BOXES ***/
    (function() {
        var slideshow_id, cs_ui_open;
        
        slideshow_id = $('#bxslider-slides-meta-box .bxslider-sortables').data('post-id');
        
        cs_ui_open = new CsUiOpen(cs_local_storage.get('cs_slide_toggles'));/*** Handle persistent slide data ***/
        
        /*** Init - Sortable slides ***/
        $('.bxslider-sortables').sortable({
            handle:'.bxslider-header',
            placeholder: "bxslider-slide-placeholder",
            forcePlaceholderSize:true,
            delay:100,
            /*** Update form field indexes when slide order changes ***/
            update: function(event, ui) {
                $('.bxslider-sortables .bxslider-slide').each(function(boxIndex, box){ /*** Loop thru each box ***/
                    $(box).find('input, select, textarea').each(function(i, field){ /*** Loop thru relevant form fields ***/
                        var name = $(field).attr('name');
                        if(name){
                            name = name.replace(/\[[0-9]+\]/, '['+boxIndex+']'); /*** Replace all [index] in field_key[index][name] ***/
                            $(field).attr('name',name);
                        }
                    });
                });
            }
        });
        
        /*** Init - Slide ID and title ***/
        $('.bxslider-sortables .bxslider-slide').each(function(i){
            var body;
            
            body = $(this).find('.bxslider-body');

            $(this).data('cs_id',i);
            
            if(cs_ui_open.get(slideshow_id ,i)=='open'){
                body.slideDown(0);
            } else {
                body.slideUp(0);
            }
        });
        
        /*** Add - Slide box from a hidden html template ***/
        $('#bxslider-slides-meta-box').on('click', '.bxslider-add-slide', function(e){
            var id = $('.bxslider-sortables .bxslider-slide').length;
            var html = $('.bxslider-slide-skeleton').html();
            html = html.replace(/{id}/g, id);/*** replace all occurences of {id} to real id ***/
            
            $('.bxslider-sortables').append(html);
            $('.bxslider-sortables .bxslider-slide:last').find('.bxslider-thumbnail').hide().end().find('.bxslider-body').show();

            $('.bxslider-sortables .bxslider-slide').each(function(i){
                $(this).data('cs_id',i);
            });
            $('.expandable-body').each(function(i){
                $(this).data('cs_id',i);
            });
            
            e.preventDefault();
        });
        
        /*** Add image to slide ***/
        $('#bxslider-slides-meta-box').on('wpAddImage', '.bxslider-media-gallery-show', function(e, image_url, attachment_id){
            var current_slide_box, slide_thumb, slide_attachment_id;

            current_slide_box = $(this).parents('.bxslider-slide');/*** get current box ***/
            slide_thumb = current_slide_box.find('.bxslider-image-thumb');/*** find the thumb ***/
            slide_attachment_id = current_slide_box.find('.bxslider-image-id ');/*** find the hidden field that will hold the attachment id ***/
            
   
            slide_thumb.html('<img src="'+image_url+'" alt="thumb" />').show();
            slide_attachment_id.val(attachment_id);
        });
        
        $('#bxslider-slides-meta-box').on('wpAddImages', '.bxslider-multiple-slides', function(e, media_attachments){
            var cur_slide_count = $('.bxslider-sortables .bxslider-slide').length;
            
            console.log('media_attachments.length ' + media_attachments.length);
            for(i=0; i<media_attachments.length; ++i){
                
                $('#bxslider-slides-meta-box .bxslider-add-slide').trigger('click');
                
                $('.bxslider-sortables .bxslider-slide').eq(cur_slide_count+i).find('.bxslider-media-gallery-show').trigger('wpAddImage', [media_attachments[i].url, media_attachments[i].id]);
                console.log('media_attachments ' + media_attachments[i].url);
            }
            
        });
        
        /*** Toggle - slide body visiblity ***/
        $('#bxslider-slides-meta-box').on('click',  '.bxslider-header', function(e) {
            var id, box, body, cs_slide_toggles;
            
            box = $(this).parents('.bxslider-slide');
            body = box.find('.bxslider-body');
            
            id = box.data('cs_id');
            
            if(body.is(':visible')){
                body.slideUp(100);
                cs_ui_open.remove(slideshow_id , id);
            } else {
                body.slideDown(100);
                cs_ui_open.set(slideshow_id , id, 'open');/*** remember open section ***/ 
            }
            
            cs_local_storage.set('cs_slide_toggles', cs_ui_open.getAll());
        });
        
        /*** Delete - Remove slide box ***/
        $('#bxslider-slides-meta-box').on('click',  '.bxslider-delete', function(e) {

            var box = $(this).parents('.bxslider-slide');
            box.fadeOut('slow', function(){ box.remove()});

            e.preventDefault();
            e.stopPropagation();
        });
        
        /*** Switcher - switch between slide types ***/
        $('#bxslider-slides-meta-box').on('change', '.bxslider-slide-type-switcher', function(e){
            var box, body, image_box, video_box, custom_box, icon;
            
            box = $(this).parents('.bxslider-slide');
            body = box.find('.bxslider-body');
            image_box = body.find('.bxslider-image');
            video_box = body.find('.bxslider-video');
            custom_box = body.find('.bxslider-custom');
            icon = box.find('.bxslider-icon i');
            if($(this).val()=='video'){
                image_box.hide();
                video_box.show();
                custom_box.hide();
                icon.attr('class', 'icon-film');
            } else if($(this).val()=='custom'){
                image_box.hide();
                video_box.hide();
                custom_box.show();
                icon.attr('class', 'icon-font');
            } else {
                image_box.show();
                video_box.hide();
                custom_box.hide();
                icon.attr('class', 'icon-picture');
            }
            
        });
        $('.bxslider-slide-type-switcher').trigger('change');
        
    })();
    
    /*** EXPANDABLES ***/
    (function() {
        var slideshow_id, cs_ui_open;
        
        /*** Init ***/
        slideshow_id = $('#bxslider-slides-meta-box .bxslider-sortables').data('post-id');
        
        cs_ui_open = new CsUiOpen(cs_local_storage.get('cs_expandables'));
        
        $('#bxslider-slides-meta-box .expandable-body').each(function(i){
            $(this).data('cs_id', i);
            
            if(cs_ui_open.get(slideshow_id ,i)=='open'){
                $(this).slideDown(0);
            } else {
                $(this).slideUp(0);
            }
        });
        
        /*** Toggle - Expandable toggling ***/
        $('#bxslider-slides-meta-box').on('click', '.expandable-header', function(e){
            var body, id;
            
            body = $(this).next('.expandable-body');
            id = body.data('cs_id');
            
            if(body.is(':visible')){
                body.slideUp(100);
                cs_ui_open.remove(slideshow_id , id);
                
            } else {
                body.slideDown(100);
                cs_ui_open.set(slideshow_id , id, 'open');
                
            }
            
            cs_local_storage.set('cs_expandables', cs_ui_open.getAll());
        });
    })();
    
    (function() {
        /*** hide wordpress admin stuff ***/
        $('#minor-publishing-actions').hide();
        $('#misc-publishing-actions').hide();
        $('.inline-edit-date').prev().hide();
        
        /*** Post type switcher quick fix ***/
        $('#pts_post_type').html('<option value="bxslider">Bxslider</option>');
    
        $('#bxslider_options_use_css').click(function(){
            if( $(this).is(':checked') ){
                $('#bxslider_options_easing').html(bxslider.css_easing_options);
            } else {
                $('#bxslider_options_easing').html(bxslider.jquery_easing_options);
            }
        })
    })();
    
    (function() {
        if(!bxslider.new_media_gallery){
            return; // Exit. Use old gallery code for older wp version
        }
        
        // Prepare the variable that holds our custom media manager.
        var bxslider_media_frame;
        var triggering_element = null;
        
        // Bind to our click event in order to open up the new media experience.
        $(document.body).on('click', '.bxslider-media-gallery-show', function(e){
            // Prevent the default action from occuring.
            e.preventDefault();
            
            triggering_element = jQuery(this);/*** get current clicked element ***/
            
            
            // If the frame already exists, re-open it.
            if ( bxslider_media_frame ) {
                bxslider_media_frame.open();
                return;
            }
    

            bxslider_media_frame = wp.media.frames.bxslider_media_frame = wp.media({
                className: 'media-frame bxslider-frame',
                frame: 'select',
                multiple: false,
                title: bxslider.title,
                library: {
                    type: 'image'
                },
                button: {
                    text:  bxslider.button
                }
            });
    
            bxslider_media_frame.on('select', function(){
                var media_attachment, img_url, media_attachments;
                
                // Grab our attachment selection and construct a JSON representation of the model.
                media_attachment = bxslider_media_frame.state().get('selection').first().toJSON();
                
                if(undefined==media_attachment.sizes.medium){ /*** Account for smaller images where medium does not exist ***/
                    img_url = media_attachment.url;
                } else {
                    img_url = media_attachment.sizes.medium.url;
                }
                
                triggering_element.trigger('wpAddImage', [img_url, media_attachment.id]);
                
            });
    
            // Now that everything has been set, let's open up the frame.
            bxslider_media_frame.open();
        });
    })();
    
    
    (function() {
        if(!bxslider.new_media_gallery){
            return; // Exit. Use old gallery code for older wp version
        }
        
        // Prepare the variable that holds our custom media manager.
        var bxslider_media_frame;
        var triggering_element = null;
        
        // Bind to our click event in order to open up the new media experience.
        $(document.body).on('click', '.bxslider-multiple-slides', function(e){
            // Prevent the default action from occuring.
            e.preventDefault();
            
            triggering_element = jQuery(this);/*** get current clicked element ***/
            
            
            // If the frame already exists, re-open it.
            if ( bxslider_media_frame ) {
                bxslider_media_frame.open();
                return;
            }
    

            bxslider_media_frame = wp.media.frames.bxslider_media_frame = wp.media({
                className: 'media-frame bxslider-frame',
                frame: 'select',
                multiple: true,
                title: bxslider.title2,
                library: {
                    type: 'image'
                },
                button: {
                    text:  bxslider.button2
                }
            });
    
            bxslider_media_frame.on('select', function(){
                var media_attachments;
                
                // Grab our attachment selection and construct a JSON representation of the model.
                media_attachments = bxslider_media_frame.state().get('selection').toJSON();
                
                triggering_element.trigger('wpAddImages', [media_attachments]);
                
            });
    
            // Now that everything has been set, let's open up the frame.
            bxslider_media_frame.open();
        });
    })();
});