<?php

class SponsoCheckbox
{
    private string $metaKey;

    public function __construct(string $metaKey)
    {
        $this->metaKey = $metaKey;
        $this->register();
    }

    public function register()
    {
        add_action('add_meta_boxes', [$this, 'wpheticAddMetaBox']);
        add_action('save_post', [$this, 'wpheticMetaBoxSave']);
    }

    public function wpheticAddMetaBox()
    {
        add_meta_box(
            'sponso',
            'Contenu Sponsorisé',
            [$this, 'wpheticMetaBoxRender'],
            'post',
            'side'
        );
    }

    public function wpheticMetaBoxRender($post)
    {
        $checked = (get_post_meta($post->ID, $this->metaKey, true));
        ?>
        <input type="checkbox" value="true" name="sponso" id="sponso" <?= $checked ? 'checked' : ''; ?>/>
        <label for="sponso">Contenu sponso ?</label>
        <?php
    }

    public function wpheticMetaBoxSave(int $post_ID)
    {
        if (isset($_POST['sponso']) && $_POST['sponso'] === 'true') {
            update_post_meta($post_ID, $this->metaKey, "true");
        } else {
            delete_post_meta($post_ID, $this->metaKey);
        }
    }
}
