<div class="col-lg-3 filter-area">
    <div class="card">
        <a href="javascript:;" style="color: unset;">
            <div class="card-header filter-card-header" id="headingOne" data-toggle="collapse"
                data-target="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter">
                <h6 class="mb-0">
                    Filter <i class="fas fa-sliders-h" style="float: right;"></i>
                </h6>
            </div>
        </a>
        <div id="collapseFilter" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body pt-0">
                <div class="filter_type">
                    <h6>Categories</h6>
                    <ul>
                        <li class="ms-2">
                            <div>
                                <input type="radio" id="category_all" name="sub_category" class="categories custom-radio" value="all">
                                <label for="category_all">All category</label>
                            </div>
                        </li>
                        <li>
                            <div>
                                <input type="radio" id="category-1" name="sub_category" class="categories custom-radio" value="web-design">
                                <label for="category-1">Web Design</label>
                            </div>
                        </li>
                        <li class="ms-2">
                            <div>
                                <input type="radio" id="sub_category-2" name="sub_category" class="categories custom-radio" value="responsive" checked>
                                <label for="sub_category-2">Responsive Design</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="filter_type">
                    <div class="mb-3">
                        <h6>Price</h6>
                        <ul>
                            <li>
                                <div>
                                    <input type="radio" id="price_all" name="price" class="prices custom-radio" value="all" checked>
                                    <label for="price_all">All</label>
                                </div>
                                <div>
                                    <input type="radio" id="price_free" name="price" class="prices custom-radio" value="free">
                                    <label for="price_free">Free</label>
                                </div>
                                <div>
                                    <input type="radio" id="price_paid" name="price" class="prices custom-radio" value="paid">
                                    <label for="price_paid">Paid</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="filter_type">
                    <h6>Level</h6>
                    <ul>
                        <li>
                            <div>
                                <input type="radio" id="all" name="level" class="level custom-radio" value="all" checked>
                                <label for="all">All</label>
                            </div>
                            <div>
                                <input type="radio" id="beginner" name="level" class="level custom-radio" value="beginner">
                                <label for="beginner">Beginner</label>
                            </div>
                            <div>
                                <input type="radio" id="advanced" name="level" class="level custom-radio" value="advanced">
                                <label for="advanced">Advanced</label>
                            </div>
                            <div>
                                <input type="radio" id="intermediate" name="level" class="level custom-radio" value="intermediate">
                                <label for="intermediate">Intermediate</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="filter_type">
                    <h6>Language</h6>
                    <ul>
                        <li>
                            <div>
                                <input type="radio" id="all_language" name="language" class="languages custom-radio" value="all" checked>
                                <label for="all_language">All</label>
                            </div>
                        </li>
                        <li>
                            <div>
                                <input type="radio" id="language_english" name="language" class="languages custom-radio" value="english">
                                <label for="language_english">English</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="filter_type">
                    <h6>Ratings</h6>
                    <ul>
                        <li>
                            <div>
                                <input type="radio" id="all_rating" name="rating" class="ratings custom-radio" value="all" checked>
                                <label for="all_rating">All</label>
                            </div>
                        </li>
                        @for($r = 1; $r <= 5; $r++)
                            <li>
                                <div>
                                    <input type="radio" id="rating_{{ $r }}" name="rating" class="ratings custom-radio" value="{{ $r }}">
                                    <label for="rating_{{ $r }}">
                                        @for($s = 1; $s <= 5; $s++)
                                            @if($s <= $r)
                                                <i class="fas fa-star" style="color: #f4c150;"></i>
                                            @else
                                                <i class="far fa-star" style="color: #dedfe0;"></i>
                                            @endif
                                        @endfor
                                    </label>
                                </div>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
