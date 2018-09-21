<!-- Theme Colors -->
<!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
<ul class="sidebar-themes clearfix">
    {{-- <li class="active">
        <a href="javascript:void(0)" class="themed-background-dark-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Default Blue"></a>
        <input type="radio" name="themes" value="night.css">
    </li> --}}
   
    <li class="col-sm-5">
        <label class="control-label"> 
            <input type="radio" name="themes" value="night.css" {{ Auth::user()->userDetails->themes == 'night.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-night themed-border-night" data-theme="/admin/css/themes/night.css" data-toggle="tooltip" title="Night" style="float:left;"></a> Night
        </label> 
    </li>
    <li class="col-sm-5">
        <label class="control-label"> 
            <input type="radio" name="themes" value="amethyst.css" {{ Auth::user()->userDetails->themes == 'amethyst.css' ? 'checked' : '' }}> 
            <a href="javascript:void(0)" class="themed-background-dark-amethyst themed-border-amethyst" data-theme="/admin/css/themes/amethyst.css" data-toggle="tooltip" title="Amethyst" style="float: left"></a> Amethyst
        </label>
    </li>
    <li class="col-sm-5">
        <label class="control-label">
            <input type="radio" name="themes" value="modern.css" {{ Auth::user()->userDetails->themes == 'modern.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-modern themed-border-modern" data-theme="/admin/css/themes/modern.css" data-toggle="tooltip" title="Modern" style="float: left"></a> Modern
        </label>
    </li>
    <li class="col-sm-5">
        <label class="control-label">
            <input type="radio" name="themes" value="autumn.css" {{ Auth::user()->userDetails->themes == 'autumn.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-autumn themed-border-autumn" data-theme="/admin/css/themes/autumn.css" data-toggle="tooltip" title="Autumn" style="float: left"></a> Autumn
        </label>
    </li>
    <li class="col-sm-5">
        <label class="control-label">
            <input type="radio" name="themes" value="flatie.css" {{ Auth::user()->userDetails->themes == 'flatie.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-flatie themed-border-flatie" data-theme="/admin/css/themes/flatie.css" data-toggle="tooltip" title="Flatie" style="float: left"></a> Flatie
        </label>
    </li>
    <li class="col-sm-5">
        <label class="control-label">
            <input type="radio" name="themes" value="spring.css" {{ Auth::user()->userDetails->themes == 'spring.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-spring themed-border-spring" data-theme="/admin/css/themes/spring.css" data-toggle="tooltip" title="Spring" style="float: left"></a> Spring
        </label>
    </li>
    <li class="col-sm-5">
        <label class="control-label">
            <input type="radio" name="themes" value="fancy.css" {{ Auth::user()->userDetails->themes == 'fancy.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-fancy themed-border-fancy" data-theme="/admin/css/themes/fancy.css" data-toggle="tooltip" title="Fancy" style="float: left"></a> Fancy
        </label>
    </li>
    <li class="col-sm-5">
        <label class="control-label">
            <input type="radio" name="themes" value="fire.css" {{ Auth::user()->userDetails->themes == 'fire.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-fire themed-border-fire" data-theme="/admin/css/themes/fire.css" data-toggle="tooltip" title="Fire" style="float: left"></a> Fire
        </label>
    </li>
    <li class="col-sm-5">
        <label class="control-label">
            <input type="radio" name="themes" value="coral.css" {{ Auth::user()->userDetails->themes == 'coral.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-coral themed-border-coral" data-theme="/admin/css/themes/coral.css" data-toggle="tooltip" title="Coral" style="float: left"></a> Coral
        </label>
    </li>
    <li class="col-sm-5">
        <label class="control-label">
            <input type="radio" name="themes" value="lake.css" {{ Auth::user()->userDetails->themes == 'lake.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-lake themed-border-lake" data-theme="/admin/css/themes/lake.css" data-toggle="tooltip" title="Lake" style="float: left"></a> Lake
        </label>
    </li>
    <li class="col-sm-5">
        <label class="control-label">
            <input type="radio" name="themes" value="forest.css" {{ Auth::user()->userDetails->themes == 'forest.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-forest themed-border-forest" data-theme="/admin/css/themes/forest.css" data-toggle="tooltip" title="Forest" style="float: left"></a> Forest
        </label>
    </li>
    <li class="col-sm-5">
        <label class="control-label">
            <input type="radio" name="themes" value="waterlily.css" {{ Auth::user()->userDetails->themes == 'waterlily.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-waterlily themed-border-waterlily" data-theme="/admin/css/themes/waterlily.css" data-toggle="tooltip" title="Waterlily" style="float: left"></a> Waterlily
        </label>
    </li>
    <li class="col-sm-5">
        <label class="control-label">
            <input type="radio" name="themes" value="emerald.css" {{ Auth::user()->userDetails->themes == 'emerald.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-emerald themed-border-emerald" data-theme="/admin/css/themes/emerald.css" data-toggle="tooltip" title="Emerald" style="float: left"></a> Emerald
        </label>
    </li>
    <li class="col-sm-5">
        <label class="control-label">
            <input type="radio" name="themes" value="blackberry.css" {{ Auth::user()->userDetails->themes == 'blackberry.css' ? 'checked' : '' }}>
            <a href="javascript:void(0)" class="themed-background-dark-blackberry themed-border-blackberry" data-theme="/admin/css/themes/blackberry.css" data-toggle="tooltip" title="Blackberry" style="float: left"></a> Black Berry
        </label>
    </li>
</ul>
<!-- END Theme Colors