@foreach($section['small'] as $small_item)
        <div class="col-sm-3">
              
    {!! $small_item->present()->small() !!}
</div>
@endforeach