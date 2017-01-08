@extends('white_background.white')


@section('white_content')
    {{--    {{Form::open([url('/search/items'), 'method' => 'post','id'=>'target'])}}--}}
    {{ Form::open(array('url' => '/search/filter/items', 'method' => 'get', 'id'=>'target')) }}

    <div class="faq_box">
        <div class="row filter-elemnts font-grey" hidden>
            <div class="col-md-12">
                <div class="col-md-7">
                    <h4>Category</h4>
                    @foreach($categories as $category)
                        <div class="checkbox-margin">
                            <div class="checkbox">
                                <label class="checkbox-label">
                                    {{Form::checkbox($category['category']->url,$category['category']->id,false,array('class'=>'radio-custom'))}} {{$category['translation']->text}}
                                </label>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="col-md-5">
                    <h4>Price range</h4>
                    <div id="slider-range"></div>
                    <div id="amount_1" class="price-box col-md-5"></div>
                    <p class="col-md-2 align-center">-</p>
                    <div id="amount_2" class="price-box col-md-5"></div>
                    <input type="text" id="input_amount_1" name="price_1" hidden>
                    <input type="text" id="input_amount_2" name="price_2" hidden>
                    <input type="text" id="search_word" name="string" hidden>
                </div>
            </div>
        </div>


        <div class="row search-input-margin-top">
            <div class="col-md-12">
                <div class="col-md-12 font-orange  choplin-font search_box" id="search_input" contenteditable="true">
                    <img
                            src="{{url('/images/white-background/search.png')}}"> Just start typing and hit<img
                            src="{{url('/images/white-background/enter.png')}}">
                    to search
                </div>
            </div>
            <div class="col-md-12">
                @if($word != '')
                    <p class="col-md-10 ">{{count($items_search)}} results for the word '{{$word}}'</p>
                @endif
                <img class=" pull-right clear_button" src="{{url('/images/white-background/clear.png')}}">
            </div>

        </div>
        <div class="row">
            @if( !is_string($items_search) && $items_search->total()!=0)
                @foreach ($items_search as $result)
                    <a href="{{url('/product/dogs/'.$result['item']->id)}}" class="font-gray search_item_a">
                        <div class="col-md-12 faq-container">
                            <div class="col-md-4">

                                <img src="{{url('/images/items/small/'.$result["url"])}} ">
                            </div>
                            <div class="col-md-8">
                                <h1>{{$result['title']}}</h1>
                                <p>{{$result['description']}}</p>
                            </div>
                        </div>
                    </a>

                @endforeach

                {{$items_search->render()}}
            @endif
        </div>


        <div class="row">
            <div class="col-md-12 font-grey ">
                <p class="faq_extra_info">Don’t find what you’re looking for?</p>
                <p>You can always contact our customer service. We’re happy to help you!</p>
            </div>
        </div>


    </div>
    {{--<button type="submit" id="target"></button>--}}
    {{Form::close()}}
@endsection


@section('filter')
    <h3 id="advanced_filter" class="font-grey">Advanced filter<span class="caret-right"></span></h3>
@endsection
