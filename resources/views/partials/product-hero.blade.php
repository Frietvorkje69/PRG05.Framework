<div class="card">
    <div class="card-header"><h1><a href="{{route('products.show', $product->id)}}"
                                    class="link page-link">{{$product->title}}</a></h1>
        <div class="justify-content-end row row-cols-auto">
            @can('update', $product)
                @if(auth()->user()->id === $product->user_id || auth()->user()->isAdmin())
                    <a class="btn btn-primary" href="{{route('products.edit', $product->id)}}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                @endif
            @endcan
            @can ('toggle', $product)
                {{--Toggle visibility button for product--}}
                <form action="{{ route('products.toggle-visibility', $product->id) }}"
                      method="POST">
                    @csrf
                    @if ($product->hidden_status == 1)
                        {{--Show slashed out eye icon if the product is hidden--}}
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </button>
                    @else
                        {{--Show eye icon if the product is visible--}}
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                    @endif
                </form>
            @endcan
        </div>
    </div>
    <div class="card-body">
        <h4>Volumes: {{$product->price / 10}}</h4>
        <p>{{$product->description}}</p>
        <div>
            <h3>
                @foreach($product->categories as $category)
                    {{--Show categories linked to product--}}
                    @if($category->name == 'Ongoing')
                        <btn class="btn btn-primary"><a class="link page-link text-white"
                                                        href="/categories/{{$category->id}}">{{$category->name}}</a>
                        </btn>
                    @elseif ($category->name == 'Finished')
                        <btn class="btn btn-success"><a class="link page-link text-white"
                                                        href="/categories/{{$category->id}}">{{$category->name}}</a>
                        </btn>
                    @elseif ($category->name == 'Hiatus')
                        <btn class="btn btn-warning"><a class="link page-link text-white"
                                                       href="/categories/{{$category->id}}">{{$category->name}}</a>
                        </btn>
                    @else
                        <btn class="btn btn-dark"><a class="link page-link text-white"
                                                     href="/categories/{{$category->id}}">{{$category->name}}</a>
                        </btn>
                    @endif

                    @if($product->categories->count() > 1)
                        {{--If there are multiple categories, add space in between.--}}
                    @endif
                @endforeach
            </h3>
        </div>
    </div>
</div>
