@if(isset($user->id))
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
         style="background-size: cover;
                 background-position: center;
                 background-image: url('{{asset('/storage/profiles/'.$user->name)}}');">
        <span class="mask bg-gradient-success opacity-5"></span>
        @else
            <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
                 style="background-size: cover;
                         background-position: center;
                         background-image: url({{asset('/argon/animals-blond-hair-cattle-1881334.jpg')}});">
                <span class="mask bg-gradient-danger opacity-5"></span>
            @endif
            <!-- Mask -->

                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center">
                    <div class="row">
                        <div class="col-md-12 {{ $class ?? '' }}">
                            <h1 class="display-2 text-white">{{ $title }}</h1>
                            @if (isset($description) && $description)
                                <h7 class="text-white font-italic mt-0 mb-5">{{ $description }}</h7>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
