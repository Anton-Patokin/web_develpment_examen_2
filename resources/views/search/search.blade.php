@extends('white_background.white')


@section('white_content')
    {{Form::open([url('/search/items/filter')])}}



    <div class="faq_box">
        <div class="row filter-elemnts font-grey">
            <div class="col-md-12">
                <div class="col-md-7">
                    <h4>Category</h4>
                    @foreach($categories as $category)
                        <div class="checkbox-margin">
                            <div class="checkbox">
                                <label class="checkbox-label">
                                    {{Form::checkbox('name', 'value',false,array('class'=>'radio-custom'))}} {{$category['translation']->text}}
                                </label>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="col-md-5">
                    <h4>Price range</h4>
                    <div  id="slider-range"></div>
                    <div id="amount_1" class="price-box col-md-5"></div>
<p class="col-md-2 align-center">-</p>
                    <div id="amount_2" class="price-box col-md-5"></div>
                    <input type="text" id="input_amount_1" name="price_1" hidden>
                    <input type="text" id="input_amount_2" name="price_1" hidden>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <h1 class="choplin-font font-orange uppercase">Frequently Asked Questions</h1>
            </div>
            <div class="col-md-12">
                <div class="col-md-12" id="search_input" contenteditable="true"><img
                            src="{{url('/images/white-background/search.png')}}"> Search
                    on keyword <img src="{{url('/images/white-background/enter.png')}}"></div>
            </div>
            <div class="col-md-12">
                <img class=" pull-right clear_button" src="{{url('/images/white-background/clear.png')}}">
            </div>
            <div class="col-md-12 font-grey ">
                <p class="faq_extra_info">Don’t find what you’re looking for?</p>
                <p>You can always contact our customer service. We’re happy to help you!</p>
            </div>
        </div>
    </div>
    {{Form::close()}}
@endsection


@section('filter')
    <h3 id="advanced_filter" class="font-grey">Advanced filter<span class="caret-right"></span></h3>
@endsection
