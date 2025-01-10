<!DOCTYPE html>
<html lang="en">
@include('Backend/component/head')

<body class="pace-running ">
    <div class="pace pace-active">
        <div class="pace-progress" data-progress-text="0%" data-progress="00" style="transform: translate3d(0%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="app full-width-header align-content-stretch d-flex flex-wrap">
        @include('Backend/component/sidebar')
        <div class="app-container">
            @include('Backend/component/header')
            @include($template)
            
           
        </div>
        <div class="hide-app-sidebar-mobile"></div>
    </div>

    @include('Backend/component/script')

</body>

</html>