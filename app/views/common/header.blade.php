<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">MSS</a>
    </div>
    <div class="collapse navbar-collapse">

      @if(Auth::check())
        <ul class="nav navbar-nav">
          <li class="active"><a href="/">Home</a></li>
          <li><a href="#/brotherhoods">Hermandades</a></li>
        </ul>
      @endif

      @include('toolbar/login')

    </div><!--/.nav-collapse -->
  </div>
</div>