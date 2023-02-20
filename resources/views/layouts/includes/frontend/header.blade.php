<style>
    header.sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 0999;
        background-color: #ffffff;
    }
</style>

<header id="header" class="sticky">

    <div id="nav">

        <div id="">
            <div class="container">

                <div class="nav-logo">
                    <a href="index-2.html" class="logo"><img src="img/logo.png" alt=""></a>
                </div>


                <ul class="nav-menu nav navbar-nav">
                    <li><a href="category.html">News</a></li>
                    <li><a href="category.html">Popular</a></li>
                    @foreach(category() as $key => $category)
                        <li class="cat-{{ $key+1 }}"><a href="{{ route('all.blog') }}?category_id={{ $category->id }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>


                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form">
                        <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                        <button class="search-close"><i class="fa fa-times"></i></button>
                    </div>
                </div>

            </div>
        </div>


        <div id="nav-aside">

            <div class="section-row">
                <ul class="nav-aside-menu">
                    <li><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="#">Join Us</a></li>
                    <li><a href="#">Advertisement</a></li>
                    <li><a href="contact.html">Contacts</a></li>
                </ul>
            </div>


            <div class="section-row">
                <h3>Recent Posts</h3>
                @foreach(recentPost() as $blog)
                    <div class="post post-widget">
                        <a class="post-img" href="{{ route('single.blog',['slug'=>$blog->slug_code,'category'=>optional($blog->category)->slug]) }}"><img src="{{ asset($blog->image) }}" alt=""></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="{{ route('single.blog',['slug'=>$blog->slug_code,'category'=>optional($blog->category)->slug]) }}">{{ $blog->title }}</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="section-row">
                <h3>Follow us</h3>
                <ul class="nav-aside-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>


            <button class="nav-aside-close"><i class="fa fa-times"></i></button>

        </div>

    </div>

</header>
