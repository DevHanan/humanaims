 <div class="fixedFilter">
            <span class="head"> {!! __('front.Filter By') !!} </span>
            <div class="underLine">
              <div class="line"></div>
            </div>
            <div class="filters">
              <div class="filter active">
                <a>
                  <span class="name">{!! __('front.All') !!}</span>
                </a>
              </div>
              <div class="filter">
                <a href="#mental" data-toggle="collapse">
                  <span class="name">Mental</span>
                  <span class="cheveron">
                    <i class="fas fa-chevron-right"></i>
                  </span>
                </a>
                <ul class="collapse" id="mental">
                
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Relligion Problems</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Secual Problems</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                </ul>
              </div>
              <div class="filter">
                <a href="#Physical" data-toggle="collapse">
                  <span class="name">Physical</span>
                  <span class="cheveron">
                    <i class="fas fa-chevron-right"></i>
                  </span>
                </a>
                <ul class="collapse" id="Physical">
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Dental pain</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>surgery</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Dermatologist</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Birth Defect</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <span class="head">{!! __('front.Filter By') !!}</span>
            <div class="underLine">
              <div class="line"></div>
            </div>
            <form>
              <label for="country"><span><i class="fas fa-globe"></i></span>{!! __('front.Country') !!}</label>

    {{ Form::select('country_id', $countries,  null,['class'=>'select2 form-control ','autocomplete'=>"off" , 'placeholder'=>'Please Select']) }}
       <div class="starSelect">
                <label for="stars"><span><i class="fas fa-star"></i></span>{!! __('front.Number of Stars') !!}</label>
             

    {{ Form::select('stars', $starts,  null,['class'=>'select2 form-control ','autocomplete'=>"off" , 'placeholder'=>'........']) }}
              </div>
            </form>
          </div>