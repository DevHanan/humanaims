 <div class="fixedFilter">
            <span class="head"> {!! __('front.Filter By') !!} </span>
            <div class="underLine">
              <div class="line"></div>
            </div>
            <form method="get" action="{{ Request::segment(1) }}" id="doctor-form">
            <div class="filters">
              <div class="filter active">
                <a>
                  <span class="name">{!! __('front.All') !!}</span>
                </a>
              </div>
               @foreach($parentSpecialization as $specialization)
              <div class="filter">
                <a href="#{{$specialization->name}}" data-toggle="collapse">
                  <span class="name">{{$specialization->name}}</span>
                  <span class="cheveron">
                    <i class="fas fa-chevron-right"></i>
                  </span>
                </a>
                <ul class="collapse" id="{{$specialization->name}}">
                    @foreach($specialization->children as $child)
                  <li data-id="{{$specialization->id}}" class="doctor-filter">
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>{{$child->name}}</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                    @endforeach
                </ul>
              </div>
              @endforeach
             
            </div>
          </form>
            <span class="head">{!! __('front.Filter By') !!}</span>
            <div class="underLine">
              <div class="line"></div>
            </div>
            <form method="get" action="{{ Request::segment(1) }}" id="doctor-form2">
              <label for="country"><span><i class="fas fa-globe"></i></span>{!! __('front.Country') !!}</label>

    {{ Form::select('country_id', $countries,  null,['class'=>'select2 form-control ','autocomplete'=>"off" , 'placeholder'=>'Please Select']) }}
       <div class="starSelect">
                <label for="stars"><span><i class="fas fa-star"></i></span>{!! __('front.Number of Stars') !!}</label>
             

    {{ Form::select('stars', $starts,  null,['class'=>'select2 form-control ','autocomplete'=>"off" , 'placeholder'=>'........']) }}
              </div>
            </form>
          </div>