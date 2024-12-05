<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @foreach ($menu->items as $link)
        <li class="nav-item">
            <a class="nav-link" href="{{ $link->link }}" target="_blank" aria-label="Brings you to the frontpage">
                {{ $link->text }}
            </a>
        </li>
        @endforeach
    </ul>
</div>