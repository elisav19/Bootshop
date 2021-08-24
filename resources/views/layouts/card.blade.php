<li class="span3">
    <div class="thumbnail">
        <a href="{{ route('product', $product->slug) }}"><img src="/themes/images/products/{{rand(1,9)}}.jpg" alt="" /></a>
        <div class="caption">
            <h5>{{ $product->name }}</h5>
            <p>
                Lorem Ipsum is simply dummy text.
            </p>

            <h4 style="text-align:center">
                <a class="btn" href="{{ route('product', $product->slug) }}">
                    <i class="icon-zoom-in"></i>
                </a>
                <form action="{{ route('basket-add', $product) }}" style="display: inline-block;" method="post">
                    <button class="btn" type="submit" href="{{ route('basket-add', $product) }}">
                        Add to <i class="icon-shopping-cart"></i>
                    </button>
                    @csrf
                </form>
                <button class="btn btn-primary" href="#">${{ $product->price }}</button>
            </h4>
        </div>
    </div>
</li>