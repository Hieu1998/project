<?php
use App\InformationModel;
$footer = InformationModel::dataFooter();
?>
<footer id="footer" class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="widget-title-wrap">
                    <h3 class="widget-title">@Lang('label.About')</h3>
                    <div class="textwidget">
                        <p>@lang('label.'.$footer['about'].'')</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget-title-wrap">
                    <h3 class="widget-title">@lang('label.Contact')</h3>
                        <p>{{$footer['contact']}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget-title-wrap">
                    <h3 class="widget-title">@lang('label.STAY CONNECTED')</h3>
                    <div class="textwidget">
                        <ul class="nav">
                            <li class="nav-item"><a href="{{$footer['link_facebook']}}"><img src="/images/facebook.png" alt="facebook"></a></li>
                            <li class="nav-item"><a href="{{$footer['link_instagram']}}"><img src="/images/instagram.png" alt="instagram"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <p class="text-center">@lang('label.'.$footer['site_info'].'')</p>
</footer>