<div class="row">
    <div class="col-md-12">
        <ul class="language_bar_chooser">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                @if($properties['native'] != "English")
                    <li>
                        <a rel="alternate" hreflang="{{$localeCode}}"
                           href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>