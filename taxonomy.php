<?php
/**
 * Created by PhpStorm.
 * User: lex
 * Date: 22.12.2017
 * Time: 14:20
 */echo 'hello';

function my_meta_box_details () {
    global $post;     // here current images ids of gallery
    $custom = get_post_custom($post->id);
    $my_gallery = (isset($custom["my_gallery"][0])) ? $custom["my_gallery"][0] : '';      // display gallery
    ?>
    <style>
        .gallery-item{
            width:150px;
            display: inline-block;
            margin-right: 10px;
        }
        .gallery-item img{
            width: 150px;
        }
    </style>
    <div class="gallery_images">
        <?php
        $img_array = (isset($my_gallery) && $my_gallery != '') ? explode(',', $my_gallery) : '';
        if ($img_array != '') {
            foreach ($img_array as $img) {
                echo '<div class="gallery-item">'.wp_get_attachment_image($img).'</div>';
            }
        }
        ?>
    </div>
    <p class="separator">
        <input id="my_gallery_input" type="hidden" name="my_gallery" value="<?php echo $my_gallery; ?>" data-urls=""/>
        <input id="manage_gallery" title="manage gallery" type="button" value="manage gallery" />
        <input id="empty_gallery" title="empty gallery" type="button" value="empty gallery" />
    </p>
    <script>
        jquery(document).ready(function($) {
            $(document).on('click', '#manage_gallery', upload_gallery_button);
        }          function upload_gallery_button(e) {
            e.preventdefault();
            var $input_field = $('#my_gallery_input');
            var ids = $input_field.val();
            var gallerysc = '[gallery ids="' + ids + '"]';
            wp.media.gallery.edit(gallerysc).on('update', function(g) {
                var id_array = [];
                var url_array = [];
                $.each(g.models, function(id, img){
                    url_array.push(img.attributes.url);
                    id_array.push(img.id);
                });
                var ids = id_array.join(",");
                ids = ids.replace(/,\s*$/, "");
                var urls = url_array.join(",");
                urls = urls.replace(/,\s*$/, "");
                $input_field.val(ids);
                var html = '';
                for(var i = 0 ; i< url_array.length; i++){
                    html += '<div class="gallery-item"><img src="'+url_array[i]+'"></div>';
                }
                $('.gallery_images').html('').append(html);
            });
        }
        $(document).on('click', '#empty_gallery', empty_gallery_button);
        function empty_gallery_button(e){
            e.preventdefault();
            var $input_field = $('#my_gallery_input');
            $input_field.val('');
            $('.gallery_images').html('');
        }     });
        </script>
<?php  }
function my_metabox_save(){
    global $post;
    if ( defined('doing_autosave') && doing_autosave ) {
        return;
    } elseif(is_object($post)){
        $my_gallery = (isset($_POST['my_gallery'])) ? $_POST['my_gallery'] : '';
        update_post_meta($post->id, 'my_gallery', $my_gallery);
    }
}
add_action('save_post', 'my_metabox_save');
