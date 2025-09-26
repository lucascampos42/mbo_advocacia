<?php
/**
 * Formulário de pesquisa personalizado
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="search-form-wrapper">
        <label for="search-field-<?php echo uniqid(); ?>" class="screen-reader-text">
            <?php echo _x('Pesquisar por:', 'label', 'mbo-advocacia'); ?>
        </label>
        <input type="search" 
               id="search-field-<?php echo uniqid(); ?>" 
               class="search-field" 
               placeholder="<?php echo esc_attr_x('Digite sua pesquisa...', 'placeholder', 'mbo-advocacia'); ?>" 
               value="<?php echo get_search_query(); ?>" 
               name="s" 
               required />
        <button type="submit" class="search-submit" aria-label="<?php echo esc_attr_x('Pesquisar', 'submit button', 'mbo-advocacia'); ?>">
            <i class="fa fa-search"></i>
            <span class="search-text"><?php echo _x('Pesquisar', 'submit button', 'mbo-advocacia'); ?></span>
        </button>
    </div>
</form>