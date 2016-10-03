<div class="col-sm-6">

@foreach($section['big'] as $big_item)

                 {!! $big_item->present()->big() !!}
          
@endforeach
        </div>


        <div class="col-sm-6">
          <div class="row smaller-titles">

            <div class="col-sm-6">
            @foreach($section['small1'] as $small_item)
              
                 {!! $small_item->present()->small() !!}
                
              @endforeach
            </div>

            <div class="col-sm-6">
            @foreach($section['small2'] as $small_item)
              
                 {!! $small_item->present()->small() !!}
                
              @endforeach
            </div>

            
          </div>
        </div>