<li class="span3">
    <div class="thumbnail">
        <a href="{{ route('product', $product->slug) }}"><img src="/themes/images/products/6.jpg" alt="" /></a>
        <div class="caption">
            <h5>{{ $product->name }}</h5>
            <p>
                Lorem Ipsum is simply dummy text.
            </p>

            <h4 style="text-align:center">
                <a class="btn" href="{{ route('product', $product->slug) }}">
                    <i class="icon-zoom-in"></i>
                </a>
                <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
                <a class="btn btn-primary" href="#">${{ $product->price }}</a>
            </h4>
        </div>
    </div>
</li>