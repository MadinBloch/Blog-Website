@extends('frontend.layouts.main')

@section('content')


<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_1.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-7 text-left">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                        <span class="date-post">4 days ago</span>
                        <h1 class="mb30"><a href="#">How Web Hosting Can Impact Page Load Speed</a></h1>
                        <p><a href="#" class="text-link">Read More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

	<div id="gtco-main">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-12">
					<ul id="gtco-post-list">
						<li class="full entry animate-box" data-animate-effect="fadeIn">
							<a href="{{ route('single')}}">
                                @if ($allblogs->isNotEmpty())
                                <img src="{{ asset('storage/' . $allblogs->first()->image) }}" class="entry-img" alt="Blog Image">
                            @endif
                                <div class="entry-desc">
                                    @if($allblogs->isnotEmpty())
                                        <h3>{{ $allblogs->first()->title}}</h3>
                                    @endif
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, t{{ route('single')}}en she continued her way.</p>
								</div>
							</a>
							<a href="#" class="post-meta">Business  <span class="date-posted">4 days ago</span></a>
						</li>

						<li class="two-third entry animate-box" data-animate-effect="fadeIn">
							<a href="{{ route('single')}}">
								<div class="entry-img" style="background-image: url(images/img_2.jpg"></div>
								<div class="entry-desc">
									<h3>How Web Hosting Can Impact Page Load Speed</h3>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains.</p>
								</div>
							</a>
							<a href="{{ route('single')}}" class="post-meta">Business  <span class="date-posted">4 days ago</span></a>
						</li>
						<li class="one-third entry animate-box" data-animate-effect="fadeIn">
							<a href="{{ route('single')}}">
								<div class="entry-img" style="background-image: url(images/img_3.jpg"></div>
								<div class="entry-desc">
									<h3>How Web Hosting Can Impact Page Load Speed</h3>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
								</div>
							</a>
							<a href="{{ route('single')}}" class="post-meta">Business  <span class="date-posted">4 days ago</span></a>
						</li>

						<li class="one-third entry animate-box" data-animate-effect="fadeIn">
							<a href="{{ route('single')}}">
								<div class="entry-img" style="background-image: url(images/img_4.jpg"></div>
								<div class="entry-desc">
									<h3>How Web Hosting Can Impact Page Load Speed</h3>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
								</div>
							</a>
							<a href="{{ route('single')}}" class="post-meta">Business  <span class="date-posted">4 days ago</span></a>
						</li>
						<li class="one-third entry animate-box" data-animate-effect="fadeIn">
							<a href="{{ route('single')}}">
								<div class="entry-img" style="background-image: url(images/img_5.jpg"></div>
								<div class="entry-desc">
									<h3>How Web Hosting Can Impact Page Load Speed</h3>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
								</div>
							</a>
							<a href="{{ route('single')}}" class="post-meta">Business  <span class="date-posted">4 days ago</span></a>
						</li>
						<li class="one-third entry animate-box" data-animate-effect="fadeIn">
							<a href="{{ route('single')}}">
								<div class="entry-img" style="background-image: url(images/img_6.jpg"></div>
								<div class="entry-desc">
									<h3>How Web Hosting Can Impact Page Load Speed</h3>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
								</div>
							</a>
							<a href="{{ route('single')}}" class="post-meta">Business  <span class="date-posted">4 days ago</span></a>
						</li>


						<li class="one-half entry animate-box" data-animate-effect="fadeIn">
							<a href="{{ route('single')}}">
								<div class="entry-img" style="background-image: url(images/img_7.jpg"></div>
								<div class="entry-desc">
									<h3>How Web Hosting Can Impact Page Load Speed</h3>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains.</p>
								</div>
							</a>
							<a href="{{ route('single')}}" class="post-meta">Business  <span class="date-posted">4 days ago</span></a>
						</li>
						<li class="one-half entry animate-box" data-animate-effect="fadeIn">
							<a href="{{ route('single')}}">
								<div class="entry-img" style="background-image: url(images/img_8.jpg"></div>
								<div class="entry-desc">
									<h3>How Web Hosting Can Impact Page Load Speed</h3>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains.</p>
								</div>
							</a>
							<a href="{{ route('single')}}" class="post-meta">Business  <span class="date-posted">4 days ago</span></a>
						</li>

						<li class="one-third entry animate-box" data-animate-effect="fadeIn">
							<a href="{{ route('single')}}">
								<div class="entry-img" style="background-image: url(images/img_9.jpg"></div>
								<div class="entry-desc">
									<h3>How Web Hosting Can Impact Page Load Speed</h3>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains.</p>
								</div>
							</a>
							<a href="{{ route('single')}}" class="post-meta">Business  <span class="date-posted">4 days ago</span></a>
						</li>
						<li class="two-third entry animate-box" data-animate-effect="fadeIn">
							<a href="{{ route('single')}}">
								<div class="entry-img" style="background-image: url(images/img_10.jpg"></div>
								<div class="entry-desc">
									<h3>How Web Hosting Can Impact Page Load Speed</h3>
									<p>She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains.</p>
								</div>
							</a>
							<a href="{{ route('single')}}" class="post-meta">Business  <span class="date-posted">4 days ago</span></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<nav aria-label="Page navigation">
					  <ul class="pagination">
					    <li>
					      <a href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <li class="active"><a href="#">1</a></li>
					    <li><a href="#">2</a></li>
					    <li><a href="#">3</a></li>
					    <li><a href="#">4</a></li>
					    <li><a href="#">5</a></li>
					    <li>
					      <a href="#" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
					</nav>
				</div>
			</div>
		</div>
	</div>



@endsection
