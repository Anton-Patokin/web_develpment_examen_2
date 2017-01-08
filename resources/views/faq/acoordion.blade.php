<div class="row">
    <div class="col-md-12  font-white">
        <h1 class="choplin-font uppercase font-20">Frequently asked questions</h1>
    </div>
</div>
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