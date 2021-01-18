<form method="get" action="{{url('/home')}}" id="home_form">
  

<div class="fixedFilter">
            <span class="head"> {!! __('front.Filter By') !!} </span>
            <div class="filters">
              <div class="filter active">
                <a>
                  <span class="name">{!! __('front.All') !!}</span>
                </a>
              </div>
              @foreach($parentCategories as $category)
              <div class="filter">
                <a href="#{{$category->name}}" data-toggle="collapse">
                  <span class="name">{{$category->name}}</span>
                  <span class="cheveron">
                    <i class="fas fa-chevron-right"></i>
                  </span>
                </a>
                <ul class="collapse" id="{{$category->name}}">
                    @foreach($category->children as $child)
                  <li data-id="{{$category->id}}" class="home-filter">
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
          </div>

          </form>