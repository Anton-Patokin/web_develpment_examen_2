@extends('white_background.white')

@section('header')
    <meta name="description" content="Kowloon answer all your questions aubout aur webshop">

    <title>FAQ-search-Kowloon</title>
@endsection
@section('white_content')
    <div class="faq_box">

        <div class="row">
            <div class="col-md-12">
                <h1 class="choplin-font font-orange uppercase">Frequently Asked Questions</h1>
            </div>
            <div class="col-md-12">
                <div class="col-md-12 faq_search_box" id="search_input" contenteditable="true"><img
                            src="{{url('/images/white-background/search.png')}}"> Search
                    on keyword <img src="{{url('/images/white-background/enter.png')}}"></div>
            </div>
            <div class="col-md-12">
                @if(count($faqs)>0 && $word != 'all')
                    <p class="col-md-10 ">{{count($faqs)}} for the word '{{$word}}'</p>
                @endif

                    <img class=" pull-right clear_button" src="{{url('/images/white-background/clear.png')}}">

            </div>
            <div class="col-md-12 font-grey ">
                <p class="faq_extra_info">Don’t find what you’re looking for?</p>
                <p>You can always contact our customer service. We’re happy to help you!</p>
            </div>

        </div>
        <div class="col-md-12">
            <div class="row font-grey" id="faq-container">
                @foreach($faqs as $key=>$faq)
                    <div class="col-md-12 faq-container">
                        <h3>{{$faq->question}}</h3>
                        <p class="col-md-12">{{$faq->answer}}</p>
                    </div>
                @endforeach
                {{ $faqs->links() }}
            </div>
        </div>

    </div>
@stop




