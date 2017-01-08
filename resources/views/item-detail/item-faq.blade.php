<div class="row">
    <div class="col-md-12 items-carousel font-white">
        <div id="accordion">
            <div class="row">
                <div class="col-md-12">
                    @foreach($faqs as $key=>$faq)
                        <div class="col-md-12 arcoodion_box">
                            <div class="faq_caret_toggle">
                                <div class="faq_text">
                                    <h3 class="font-20">{{ $faq->question}}<span class=" pull-right caret-right-white"></span>
                                    </h3>
                                    <div class="accordion_click col-md-12" hidden>
                                        <p class="col-md-12">{{ $faq->answer}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
    <div class="col-md-12">
        <a href="{{url('/search/faq/all')}}"> <p class="choplin-font font-white pull-right">More questions</p></a>
    </div>
</div>


{{--<div id="accordion">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
            {{--@foreach($faqs as $key=>$faq)--}}
                {{--<div class="col-md-12 arcoodion_box">--}}
                    {{--<div class="faq_caret_toggle">--}}
                        {{--<div class="faq_text">--}}
                            {{--<h3 class="font-20">{{ $faq->question}}<span class=" pull-right caret-right-white"></span>--}}
                            {{--</h3>--}}
                            {{--<div class="accordion_click col-md-12" hidden>--}}
                                {{--<p class="col-md-12">{{ $faq->answer}}</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}

{{--</div>--}}