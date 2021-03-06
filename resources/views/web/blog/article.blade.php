@extends('web.layouts.main')

@section('title', 'V de Verde | Blog')

@section('styles')

	{!! Html::style('plugins/swiper-slider/swiper.min.css') !!}
@endsection	

@section('content')
    <div class="blog-header">
        <div class="inner">
            <h1>BLOG</h1>
        </div>
    </div>
    <div class="container">
		<div class="row">
			{{-- Blog Head --}}
			<div class="blog-article-head">
				<div class="col-xs-12 col-sm-6 left">
					Publicado el: <b>{{ transDateT($article->created_at) }}</b> |
					Autor: <b>{{ $article->user->name }}</b>
				</div>
				<div class="col-xs-12 col-sm-6 post-date-desktop right">
					<span class="text"><i class="ion-ios-clock-outline"></i>  {{ $article->created_at->diffForHumans() }}</span>
				</div>
				<div class="clearfix"></div>
				<hr>
			</div>
		</div>

        <div class="row">
			
			<div class="col-md-9 pad0">
				<div class="blog-slider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							@if($article->images != null)
								@foreach($article->images as $image)
									<div class="swiper-slide"><img src="{{ asset('webimages/blog/articles/'.$image->name ) }}" class="slider-image"></div>
								@endforeach
							@endif
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
				<div class="single-item">
				<!-- Slider and Content main container -->
					<div class="title">{!! $article->title !!}</div>	
					<hr>
			
					<div class="content">
						<p>{!! $article->content !!}</p>
					</div>
					<hr>
					<div class="bottom">
						Categoría: 
						@if(isset($article->category))
						<a href="{{ route('web.search.category', $article->category->name ) }}">
							{!! $article->category->name !!}
						</a>
						@else
						<br> Sin categoría <br>
						@endif
						<div class="pull-right">
							<span>Etiquetas: </span>
							@if($article->tags != null)
								@foreach($article->tags as $tag)
									<a href="{{ route('web.search.tag', $tag->name ) }}"><span class="custom-badge green-back">{!! $tag->name !!}</span></a>
								@endforeach
							@else
							<br> Sin etiquetas <br>
							@endif
						</div>	
					</div>
				</div> {{-- / single-item --}}
			</div>
			<div class="col-md-3">
				@include('web.blog.sidebar')
			</div>

        </div>
    </div>
	<div class="row post-date-mobile">
		<div class="container">
			<span class="text"><i class="ion-ios-clock-outline"></i> Publicado {{ $article->created_at->diffForHumans() }}</span>
		</div>
	</div>
            	
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('plugins/swiper-slider/swiper.jquery.min.js') }}" ></script>
@endsection

@section('custom_js')
    <script type="text/javascript">
		var swiper = new Swiper('.swiper-container');
    </script>
@endsection



