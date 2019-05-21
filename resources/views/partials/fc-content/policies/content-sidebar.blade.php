<div class="policies-container">
    <div class="inner">
        <div class="details">
            @if (get_sub_field('super_title'))                        
                <div class="section">{{ get_sub_field('super_title') }}</div>
            @endif
            @if (get_sub_field('title'))                
                <h1>{{ get_sub_field('title') }}</h1>
            @endif
            @if (get_sub_field('last_updated'))                
                <h4>{{ get_sub_field('last_updated') }}</h4>
            @endif
            {!! get_sub_field('main_content') !!}
        </div>
        <div class="policy-list">
            @if (get_sub_field('sidebar_title'))            
                <h3>{{ get_sub_field('sidebar_title') }}</h3>
            @endif
            @if (get_sub_field('sidebar_menu'))
                @php ($menu_location = get_sub_field('sidebar_menu'))
                @if ( has_nav_menu( $menu_location ) )
                    {!! wp_nav_menu([
                        'theme_location' 	=> $menu_location, 
                        'container' 		=> false, 
                        'menu_class'		=> 'policy-entries', 
                        'walker'            => new Policies_Sidebar_Walker
                    ]) !!}
                @endif
            @endif
        </div>
    </div>
</div>
