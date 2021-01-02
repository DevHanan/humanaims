@php
   
        $comments = $model->comments;
@endphp

<div class="comment">
                          <div class="row">
                            <div class="col-sm-6 col-8">
                              <div class="imageName">
                                <div class="image">
                                  <img src="../images/David-Beckham.jpg">
                                  <img class="profile_sub_pic" src="../images/home/profile-sub-image.png">
                                </div>
                                <div class="name">
                                  <a>Mohamed Ahmed</a>
                                  <p>
                                    2 seconds Ago
                                    <i class="far fa-clock"></i>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="offset-sm-2 col-4">
                              <div class="icons">
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-exclamation-circle"></i>
                              </div>
                            </div>
                          </div>
                          <div class="commentContent">
                            <p dir="auto" class="readMore">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                              Tenetur sunt
                              corporis
                              repellat
                              consequuntur aperiam eveniet placeat ea recusandae aliquid<span
                                class="dots">...</span><span class="more">Non corporis, quo quod rem, omnis, vitae hic
                                voluptatibus distinctio dolores
                                nesciunt odio itaque,
                                perentore adipisci velit assumenda enim aspernatur magni
                                nihil
                                cum, corrupti obcaecati quo eius at quod. Quidem quas qui natus ex? Voluptas doloribus
                                dolor, eum repellat impedit atque aliquid? Voluptatem iure suscipit illo.</span><button
                                type="button" class="read">Read More</button></p>
                            <div class="repliedComment">
                              <div class="row">
                                <div class="col-sm-6 col-9">
                                  <div class="imageName">
                                    <div class="image">
                                      <img src="../images/David-Beckham.jpg">
                                      <img class="profile_sub_pic" src="../images/home/profile-sub-image.png">
                                    </div>
                                    <div class="name">
                                      <a>Mohamed Ahmed</a>
                                      <p class="time">
                                        2 seconds Ago
                                        <i class="far fa-clock"></i>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="offset-sm-2 col-3">
                                  <div class="icons">
                                    <i class="fas fa-heart"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                  </div>
                                </div>
                              </div>
                              <p dir="auto" class="readMore">سالهحقا هثقا هحثحه ثحىلاهفث لاحفثح فقلاىحفقلا حهف حفقه
                                فقلا<span class="dots">...</span><span class="more">Non corporis, quo quod rem, omnis,
                                  vitae hic
                                  نيبىلانينلاىيبنىلاكخياخكلايكى كيى كيىكي ىلاخكى خف فكلاىخفلاى خفقى فقىلاكنفقىلا
                                  كفقىلاكفقى كفق ف
                                  لافقلا هح</span><button type="button" class="read">Read More</button></p>
                            </div>
                            <div class="reply">
                              <i class="fas fa-camera"></i>
                              <i class="fas fa-comments"></i>
                            </div>
                            <div class="replyToComment">
                              <div class="images">
                                <img class="profile_pic" src="../images/David-Beckham.jpg">
                                <img class="profile_sub_pic" src="../images/home/profile-sub-image.png">
                              </div>
                              <form>
                                <div class="emojy_container">
                                  <textarea type="text" data-emojiable="true"></textarea>
                                </div>
                                <ul>
                                  <li><i class="fas fa-camera"></i></li>
                                </ul>
                              </form>
                            </div>
                          </div>
                        </div>

@if($comments->count() < 1)
    <div class="alert alert-warning">{!! ('front.There are no comments yet.') !!}</div>
@endif

<ul class="list-unstyled">
    @php
        $comments = $comments->sortBy('created_at');

        if (isset($perPage)) {
            $page = request()->query('page', 1) - 1;

            $parentComments = $comments->where('child_id', '');

            $slicedParentComments = $parentComments->slice($page * $perPage, $perPage);

            $m = Config::get('comments.model'); // This has to be done like this, otherwise it will complain.
            $modelKeyName = (new $m)->getKeyName(); // This defaults to 'id' if not changed.

            $slicedParentCommentsIds = $slicedParentComments->pluck($modelKeyName)->toArray();

            // Remove parent Comments from comments.
            $comments = $comments->where('child_id', '!=', '');

            $grouped_comments = new \Illuminate\Pagination\LengthAwarePaginator(
                $slicedParentComments->merge($comments)->groupBy('child_id'),
                $parentComments->count(),
                $perPage
            );

            $grouped_comments->withPath(request()->path());
        } else {
            $grouped_comments = $comments->groupBy('child_id');
        }
    @endphp
    @foreach($grouped_comments as $comment_id => $comments)
        {{-- Process parent nodes --}}
        @if($comment_id == '')
            @foreach($comments as $comment)
                @include('comments::_comment', [
                    'comment' => $comment,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif
    @endforeach
</ul>

@isset ($perPage)
    {{ $grouped_comments->links() }}
@endisset

@auth
    @include('comments::_form')
@elseif(Config::get('comments.guest_commenting') == true)
    @include('comments::_form', [
        'guest_commenting' => true
    ])
@endauth
