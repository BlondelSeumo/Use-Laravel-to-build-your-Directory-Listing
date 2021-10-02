<?php
    $dataUser = Auth::user();
    $menus = [
        'dashboard' => [
            'url'        => route("vendor.dashboard"),
            'title'      => __("Dashboard"),
            'icon'       => 'flaticon-web-page',
            'permission' => 'dashboard_vendor_access',
            'position'   => 10
        ],
        'profile'   => [
            'url'      => route("user.profile.index"),
            'title'    => __("Profile"),
            'icon'     => 'flaticon-avatar',
            'position' => 20
        ],
        "wishlist"  => [
            'url'      => route("user.wishList.index"),
            'title'    => __(" Bookmarks"),
            'icon'     => 'flaticon-love',
            'position' => 41
        ],
        "reviews"  => [
            'url'      => route("user.review.index"),
            'title'    => __(" Reviews"),
            'icon'     => 'flaticon-note',
            'position' => 51
        ],
    ];

// Modules
    $custom_modules = \Modules\ServiceProvider::getModules();
    if (!empty($custom_modules)) {
        foreach ($custom_modules as $module) {
            $moduleClass = "\\Modules\\".ucfirst($module)."\\ModuleProvider";
            if (class_exists($moduleClass)) {
                $menuConfig = call_user_func([$moduleClass, 'getUserMenu']);
                if (!empty($menuConfig)) {
                    $menus = array_merge($menus, $menuConfig);
                }
                $menuSubMenu = call_user_func([$moduleClass, 'getUserSubMenu']);
                if (!empty($menuSubMenu)) {
                    foreach ($menuSubMenu as $k => $submenu) {
                        $submenu['id'] = $submenu['id'] ?? '_'.$k;
                        if (!empty($submenu['parent']) and isset($menus[$submenu['parent']])) {
                            $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                            $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                                return $value['position'] ?? 100;
                            }));
                        }
                    }
                }
            }
        }
    }

// Plugins Menu
    $plugins_modules = \Plugins\ServiceProvider::getModules();
    if (!empty($plugins_modules)) {
        foreach ($plugins_modules as $module) {
            $moduleClass = "\\Plugins\\".ucfirst($module)."\\ModuleProvider";
            if (class_exists($moduleClass)) {
                $menuConfig = call_user_func([$moduleClass, 'getUserMenu']);
                if (!empty($menuConfig)) {
                    $menus = array_merge($menus, $menuConfig);
                }
                $menuSubMenu = call_user_func([$moduleClass, 'getUserSubMenu']);
                if (!empty($menuSubMenu)) {
                    foreach ($menuSubMenu as $k => $submenu) {
                        $submenu['id'] = $submenu['id'] ?? '_'.$k;
                        if (!empty($submenu['parent']) and isset($menus[$submenu['parent']])) {
                            $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                            $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                                return $value['position'] ?? 100;
                            }));
                        }
                    }
                }
            }
        }
    }

// Custom Menu
    $custom_modules = \Custom\ServiceProvider::getModules();
    if (!empty($custom_modules)) {
        foreach ($custom_modules as $module) {
            $moduleClass = "\\Custom\\".ucfirst($module)."\\ModuleProvider";
            if (class_exists($moduleClass)) {
                $menuConfig = call_user_func([$moduleClass, 'getUserMenu']);
                if (!empty($menuConfig)) {
                    $menus = array_merge($menus, $menuConfig);
                }
                $menuSubMenu = call_user_func([$moduleClass, 'getUserSubMenu']);
                if (!empty($menuSubMenu)) {
                    foreach ($menuSubMenu as $k => $submenu) {
                        $submenu['id'] = $submenu['id'] ?? '_'.$k;
                        if (!empty($submenu['parent']) and isset($menus[$submenu['parent']])) {
                            $menus[$submenu['parent']]['children'][$submenu['id']] = $submenu;
                            $menus[$submenu['parent']]['children'] = array_values(\Illuminate\Support\Arr::sort($menus[$submenu['parent']]['children'], function ($value) {
                                return $value['position'] ?? 100;
                            }));
                        }
                    }
                }
            }
        }
    }

    $currentUrl = url(Illuminate\Support\Facades\Route::current()->uri());
    if (!empty($menus))
        $menus = array_values(\Illuminate\Support\Arr::sort($menus, function ($value) {
            return $value['position'] ?? 100;
        }));
    foreach ($menus as $k => $menuItem) {
        if (!empty($menuItem['permission']) and !Auth::user()->hasPermissionTo($menuItem['permission'])) {
            unset($menus[$k]);
            continue;
        }
        $menus[$k]['class'] = $currentUrl == url($menuItem['url']) ? 'active' : '';
        if (!empty($menuItem['children'])) {
            $menus[$k]['class'] .= ' has-children';
            foreach ($menuItem['children'] as $k2 => $menuItem2) {
                if (!empty($menuItem2['permission']) and !Auth::user()->hasPermissionTo($menuItem2['permission'])) {
                    unset($menus[$k]['children'][$k2]);
                    continue;
                }
                $menus[$k]['children'][$k2]['class'] = $currentUrl == url($menuItem2['url']) ? 'active active_child' : '';
            }
        }
    }
?>
@foreach($menus as $menuItem)
	<li class="{{$menuItem['class']}}">
		<a href="{{ url($menuItem['url']) }}">
			@if(!empty($menuItem['icon']))
				<span class="icon text-center"><i class="{{$menuItem['icon']}}"></i></span>
			@endif
			{!! clean($menuItem['title']) !!}
		
		</a>
		@if(!empty($menuItem['children']))
			<i class="caret"></i>
		@endif
		@if(!empty($menuItem['children']))
			<ul class="children">
				@foreach($menuItem['children'] as $menuItem2)
					<li class="{{$menuItem2['class']}}"><a href="{{ url($menuItem2['url']) }}">
							@if(!empty($menuItem2['icon']))
								<i class="{{$menuItem2['icon']}}"></i>
							@endif
							{!! clean($menuItem2['title']) !!}</a></li>
				@endforeach
			</ul>
		@endif
	</li>
@endforeach
<li>
	<div class="logout">
		<form id="logout-form-vendor" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
		<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-vendor').submit();"><i class="flaticon-logout"></i> {{__("Log Out")}}
		</a>
	</div>
</li>