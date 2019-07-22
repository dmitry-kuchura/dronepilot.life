<div class="col-xl-2 col-lg-3 col-xl-20per">
    <div class="sidebar-block">
        <div class="sidebar-box listing-box mb-40"><span class="opener plus"></span>
            <div class="sidebar-title">
                <h3><span>{{ __('site.categories') }}</span></h3>
            </div>
            <div class="sidebar-contant">
                <ul>
                    <li>
                        <div class="check-box">
                          <span>
                            <input type="checkbox" class="checkbox" id="clothing" name="clothing">
                            <label for="clothing">Clothing <span>(21)</span></label>
                          </span>
                        </div>
                    </li>
                    <li>
                        <div class="check-box">
                          <span>
                            <input type="checkbox" class="checkbox" id="shoes" name="shoes">
                            <label for="shoes">Shoes <span>(05)</span></label>
                          </span>
                        </div>
                    </li>
                    <li>
                        <div class="check-box">
                          <span>
                            <input type="checkbox" class="checkbox" id="jewellery" name="jewellery">
                            <label for="jewellery">Jewellery <span>(10)</span></label>
                          </span>
                        </div>
                    </li>
                    <li>
                        <div class="check-box">
                          <span>
                            <input type="checkbox" class="checkbox" id="furniture" name="furniture">
                            <label for="furniture">Furniture <span>(12)</span></label>
                          </span>
                        </div>
                    </li>
                    <li>
                        <div class="check-box">
                          <span>
                            <input type="checkbox" class="checkbox" id="bags" name="bags">
                            <label for="bags">Bags <span>(18)</span></label>
                          </span>
                        </div>
                    </li>
                    <li>
                        <div class="check-box">
                          <span>
                            <input type="checkbox" class="checkbox" id="accessories" name="accessories">
                            <label for="accessories">Accessories <span>(70)</span></label>
                          </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-box mb-40"><span class="opener plus"></span>
            <div class="sidebar-title">
                <h3><span>{{ __('site.tags') }}</span></h3>
            </div>
            <div class="sidebar-contant">
                <ul class="tagcloud">
                    <li><a href="javascript:void(0)">Orange</a></li>
                    <li><a href="javascript:void(0)">Print</a></li>
                    <li><a href="javascript:void(0)">Neutral</a></li>
                    <li><a href="javascript:void(0)">Tan</a></li>
                    <li><a href="javascript:void(0)">Purple</a></li>
                    <li><a href="javascript:void(0)">Red</a></li>
                    <li><a href="javascript:void(0)">Yellow</a></li>
                    <li><a href="javascript:void(0)">Blue</a></li>
                    <li><a href="javascript:void(0)">White</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-box sidebar-item sidebar-item-wide"><span class="opener plus"></span>
            <div class="sidebar-title">
                <h3><span>{{ __('site.popular') }}</span></h3>
            </div>
            <div class="sidebar-contant">
                <ul>
                    @foreach($recent as $obj)
                        @if (isset($obj->alias))
                            <li>
                                <div class="pro-media">
                                    <a href="{{ route('blog.inner', ['alias' => $obj->alias]) }}">
                                        <img alt="{{ $obj->name }}"
                                             src="{{ is_file(public_path('/storage/main/' . $obj->image)) ? '/storage/main/' . $obj->image : '/images/placeholder.png' }}">
                                    </a>
                                </div>
                                <div class="pro-detail-info">
                                    <a href="{{ route('blog.inner', ['alias' => $obj->alias]) }}">{{ $obj->name }}</a>
                                    <div
                                        class="post-info">{{ date('j', strtotime($obj->created_at)) . ' ' . russianMonth($obj->created_at) . ', ' . date('Y', strtotime($obj->created_at))}}</div>
                                </div>
                            </li>@endif
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>