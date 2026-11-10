<div class="course-box-wrap">
    <a href="{{ route('course.detail', ['slug' => $course['slug'] ?? null]) }}" class="{{ !empty($course['popover']) ? 'has-popover' : '' }}">
        <div class="course-box">
            <div class="course-image">
                <img src="{{ asset('assets/img/' . $course['image']) }}" alt="{{ $course['title'] }}" class="img-fluid">
            </div>

            <div class="course-details">
                <h5 class="title">{{ $course['title'] }}</h5>
                <p class="instructors">{{ $course['instructor'] ?? 'Tutoriales a tu Alcance' }}</p>

                <div class="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= ($course['rating'] ?? 0) ? 'filled' : '' }}"></i>
                    @endfor
                    <span class="d-inline-block average-rating">{{ $course['rating'] ?? 0 }}</span>
                </div>

                <p class="price text-right">
                    @if(!empty($course['old_price']))
                        <small>{{ $course['old_price'] }}</small>
                    @endif
                    {{ $course['price'] }}
                </p>
            </div>
        </div>
    </a>

    @if(!empty($course['popover']))
        <div class="webui-popover-content">
            <div class="course-popover-content">
                <div class="last-updated">Last updated {{ $course['updated'] ?? 'Fri, 05-Jul-2019' }}</div>

                <div class="course-title">
                    <a href="{{ route('course.detail', ['slug' => $course['slug'] ?? null]) }}">{{ $course['title'] }}</a>
                </div>
                <div class="course-meta">
                    <span>
                        <i class="fas fa-play-circle"></i>
                        {{ $course['lessons'] ?? '24 Lessons' }}
                    </span>
                    <span>
                        <i class="far fa-clock"></i>
                        {{ $course['duration'] ?? '00:10:22 Hours' }}
                    </span>
                    <span>
                        <i class="fas fa-closed-captioning"></i>
                        {{ $course['language'] ?? 'English' }}
                    </span>
                </div>
                <div class="course-subtitle">
                    {{ $course['subtitle'] ?? 'Learn how to confidently develop custom & profitable projects with no prior experience.' }}
                </div>
                @if(!empty($course['outcomes']))
                    <div class="what-will-learn">
                        <ul>
                            @foreach($course['outcomes'] as $outcome)
                                <li>{{ $outcome }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="popover-btns">
                    <a href="{{ route('cart') }}" class="btn add-to-cart-btn">Add to cart</a>
                    <button type="button" class="wishlist-btn" title="Add to wishlist">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
