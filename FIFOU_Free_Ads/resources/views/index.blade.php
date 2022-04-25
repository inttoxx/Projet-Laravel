@extends('layout.dashboard')

@section('content')
<div class="d-flex flex-wrap">
    <aside class="card" style="margin: 10px; position: float; left; width: 400px">
        <div class="row justify-content-center">
            <h3 class="card-header text-center">Filter</h3>
            <div class="card-body">
                <form method="POST" action='{{route('filter')}}'>
                    @csrf
                    <div class="form-group mb-3">
                        <h4>Name</h4>

                            <input class="form-control" type='text' name='title'>
                    </div>
                    <div class="form-group mb-3">
                        <h4>Location</h4>

                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id='locoation' name='location'>
                                <option value=''>All</option>
                                @foreach($locations as $location)
                                    <option value={{$location->id}}>{{$location->location}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group mb-3">
                        <h4>Category</h4>

                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id='category' name='category'><br/>
                                <option value=''>All</option>
                                @foreach($categories as $category)
                                    <option value={{$category->id}}>{{$category->category}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group mb-3">
                        <h4>Usur</h4>

                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id='usure' name='usure'>
                                <option value=''>All</option>
                                <option value='BrandNew'>BrandNew</option>
                                <option value='Used'>Used</option>
                                <option value='Broken'>Broken</option>
                            </select>
                    </div>
                    <div class="form-group mb-3">
                        <h4>Price range</h4>

                        <div class="input-group mb-3">
                            <label class="input-group-text" id="basic-addon1" for='price_min'>Min price</label>
                            <input class="form-control" type='number' name='price_min' id='price_min'><br/>
                        </div>
                        <div class="input-group mb-3">    
                            <label class="input-group-text" id="basic-addon1" for='price_max'>Max price</label>
                            <input class="form-control" type='number' name='price_max' id='price_max'><br/>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <h4>Order By</h4>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name='title_order'>
                                <option value='ASC'>Name A->Z</option>
                                <option value='DESC'>Name Z->A</option>
                            </select>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="price_order">
                                <option value='ASC'>Ascending pirce</option>
                                <option value='DESC'>Decreasing price</option>
                            </select>
                    </div><br/>
                    <div class="d-grid mx-auto">
                        <input class="btn btn-primary btn-block" type='submit' value='Filter'>
                    </div>
                </form>
            </div>            
        </div> 
    </aside>
        <div class="d-flex flex-wrap" style="width: 66%">
        @foreach($ads as $ad)
            <article class="card" style="width: 14rem; height: 23rem; margin: 10px;">
                <a href='{{route('show',['id'=>$ad->id])}}'><img class="card-img-top" alr='{{$ad->title}}' src='/images/{{$ad->id.'.'.$ad->picture_extension}}' height="150px"></a>
                <div class="card-body">
                    <h4 class="card-title">{{$ad->title}}</h4>
                    <b class="card-text">Location : {{$ad->location['location']}}</b><br/>
                    <span class="card-text">Category : {{$ad->category['category']}}</span>
                    <p class="card-text">{{$ad->usure}}</p>
                    <p class="btn btn-success">{{$ad->price}}$</p>
                </div>
            </article>
        @endforeach
        </div>
</div>
<footer>
     <ul class="pagination">
    @for($page=1 ; $page <= ceil(count($allAds) / 6 ) ; $page++)
        <li class="page-item"><a class="page-link" href="{{route('pages',['p'=>$page])}}">{{$page}}</a></li>
    @endfor
     </ul>
</footer>

@endsection