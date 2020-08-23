<form action="<?php echo home_url('/'); ?>" method="get">
    <div class="form-group">
        <div class="input-group mb-3">
            <input name="s" type="text" class="form-control" placeholder='<?php echo esc_attr_x('Search...', 'placeholder', ''); ?>'
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Search Keyword'" value="<?php echo get_search_query(); ?>">
            <div class="input-group-append">
                <button class="btns" type="button"><i class="ti-search"></i></button>
            </div>
        </div>
    </div>
    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
        type="submit">Search</button>
</form>