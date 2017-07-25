<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('welcome') }}">Tweete</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">Timeline</a></li>
                <li><a href="#">Friends</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search" action="#">
                <div class="form-group">
                    <input type="text" name="query" class="form-control" placeholder="Find people">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dayle</a></li>
                <li><a href="#">Update profile</a></li>
                <li><a href="{{ route('auth.signup') }}">Sign up</a></li>
                <li><a href="#">Sign in</a></li>
            </ul>
        </div>
    </div>
</nav>