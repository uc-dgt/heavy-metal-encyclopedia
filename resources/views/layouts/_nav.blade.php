<nav class="navbar navbar-{{ $position or 'default' }}">
    <div class="container">

    <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
    </div>

    <div class="collapse navbar-collapse" id="main-nav">
        <form class="navbar-form navbar-right" action="{{ route('search') }}" method="get">
            <div class="form-group">
            <input class="form-control" placeholder="Search" type="text" name="q">
            </div>
        </form>
    </div>
</nav>