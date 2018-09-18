<li class="{{ (
    Request::is('admin/productCategories*') ||
    Request::is('admin/productSubcategories*') ||
    Request::is('admin/brands*') ||
    Request::is('admin/products*') ||
    Request::is('admin/productPresentations*') ||
    Request::is('admin/productFeatureCategories*') ||
    Request::is('admin/productFeatures*') ||
    Request::is('admin/orders*') ||
    Request::is('admin/orderDetails*') ||
    Request::is('admin/additionalCategories*')) ? 'active' : '' }}">
    <a href="javascript:void(0)" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-saw_blade sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ tags()['back_menu_products'] }}</span></a>
    <ul>
        <li>
            <a class="{{ Request::is('admin/productCategories*') ? 'active' : '' }}" href="{!! route('admin.productCategories.index') !!}"><span>{{ tags()['back_menu_products_product_category'] }}</span></a>
        </li>

        <li>
            <a class="{{ Request::is('admin/productSubcategories*') ? 'active' : '' }}" href="{!! route('admin.productSubcategories.index') !!}"><span>{{ tags()['back_menu_products_product_subcategory'] }}</span></a>
        </li>

        <li>
            <a class="{{ Request::is('admin/additionalCategories*') ? 'active' : '' }}" href="{!! route('admin.additionalCategories.index') !!}"><span>{{ tags()['back_menu_products_additional_category'] }}</span></a>
        </li>

        <li>
            <a class="{{ Request::is('admin/productFeatureCategories*') ? 'active' : '' }}" href="{!! route('admin.productFeatureCategories.index') !!}"><span>Product Feature Categories</span></a>
        </li>

        <li>
            <a class="{{ Request::is('admin/productFeatures*') ? 'active' : '' }}" href="{!! route('admin.productFeatures.index') !!}"><span>Product Features</span></a>
        </li>

        <li>
            <a class="{{ Request::is('admin/productPresentations*') ? 'active' : '' }}" href="{!! route('admin.productPresentations.index') !!}"><span>{{ tags()['back_menu_products_product_presentation'] }}</span></a>
        </li>

        <li>
            <a class="{{ Request::is('admin/products*') ? 'active' : '' }}" href="{!! route('admin.products.index') !!}"><span>{{ tags()['back_menu_products_product'] }}</span></a>
        </li>

        <li>
            <a class="{{ Request::is('admin/orders*') ? 'active' : '' }}" href="{!! route('admin.orders.index') !!}"><span>{{ tags()['back_menu_products_order'] }}</span></a>
        </li>

        <li>
            <a class="{{ Request::is('admin/orderDetails*') ? 'active' : '' }}" href="{!! route('admin.orderDetails.index') !!}"><span>{{ tags()['back_menu_products_order_detail'] }}</span></a>
        </li>
    </ul>
</li>

<li class="{{ (
    Request::is('admin/multimedia*') ||
    Request::is('admin/seos*') ||
    Request::is('admin/tagTranslations*') ||
    Request::is('admin/clientRequests*')) ? 'active' : '' }}">
    <a href="javascript:void(0)" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-saw_blade sidebar-nav-icon"></i> <span class="sidebar-nav-mini-hide">{{ tags()['back_menu_utils'] }}</span></a>
    <ul>
        <li class="{{ Request::is('admin/multimedia*') ? 'active' : '' }}">
            <a href="{!! route('admin.multimedia.index') !!}"> <span>{{ tags()['back_menu_utils_multimedia'] }}</span></a>
        </li>

        <li class="{{ Request::is('admin/seos*') ? 'active' : '' }}">
            <a href="{!! route('admin.seos.index') !!}"> <span>{{ tags()['back_menu_utils_seo'] }}</span></a>
        </li>

        <li class="{{ Request::is('admin/tagTranslations*') ? 'active' : '' }}">
            <a href="javascript:void(0)" data-route="{!! url('/api/admin/tag_translations') !!}" id="menu_tag_translations"> <span>{{ tags()['back_menu_utils_tag_translation'] }}</span></a>
        </li>

        <li class="{{ Request::is('admin/clientRequests*') ? 'active' : '' }}">
            <a href="{!! route('admin.clientRequests.index') !!}"> <span>{{ tags()['back_menu_utils_client_request'] }}</span></a>
        </li>
        </li><li class="{{ Request::is('requestCategories*') ? 'active' : '' }}">
            <a href="{!! route('admin.requestCategories.index') !!}"> <span>Request Categories</span></a>
        </li>
    </ul>
</li>

<li class="{{ (Request::is('admin/newsletterUsers*')) ? 'active' : '' }}">
    <a href="{!! route('admin.newsletterUsers.index') !!}"><i class="sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-saw_blade sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Newsletter Users</span></a>
</li>

<li class="{{ (
    Request::is('admin/role*') ||
    Request::is('admin/search/user*')) ? 'active' : '' }}">
    <a href="javascript:void(0)" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-saw_blade sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ 'User Management' }}</span></a>
    <ul>
        @if(Auth::user()->isRole('admin'))
            <li>
                <a href="{!! route('admin.role.index') !!}" class="{{ Request::is('admin/role*') ? 'active' : '' }}"><span>{{ 'Roles' }}</span></a>
            </li>

            <li>
                <a href="{!! route('admin.user.get.search') !!}" class="{{ Request::is('admin/search/user*') ? 'active' : '' }}"><span>{{ 'Asignar Roles' }}</span></a>
            </li>
        @endif

        <li>
            <a href="#modal-user-settings" data-toggle="modal">Perfil</i></a>
        </li>
    </ul>
</li>

@push('scripts')
    <script type="text/javascript">
        $('#menu_tag_translations').on('click', function() {
            console.log( '{{ Auth::user()->api_token }}' );

            $.ajax({
                type: "GET",
                url: $( this ).data('route'),
                data: $(this).serialize(),

                success: function( response ) {
                    console.log( response );
                },
                error: function( jqXHR, textStatus, errorThrown ) {
                    console.log( jqXHR.responseJSON );
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend : function( xhr ) {
                    xhr.setRequestHeader( 'Authorization', 'BEARER ' + '{{ Auth::user()->api_token }}' );
                },
            });
        });
    </script>
@endpush