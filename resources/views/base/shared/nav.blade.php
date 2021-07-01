
<div class="c-sidebar-brand">
    <a href="/dashboard"><img class="c-sidebar-brand-full" src="{{ asset('img/logo.png') }}" width="50" alt=""></a>
    <a href="/dashboard" class="p-2"><img class="c-sidebar-brand-minimized" src="{{ asset('img/fav-icon.png') }}" width="118" height="46" alt=""></a>
</div>

<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('pages.index') }}">
            <i class="c-sidebar-nav-icon far fa-file-alt"></i>
            Páginas
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('news.index') }}">
            <i class="c-sidebar-nav-icon far fa-newspaper"></i>
            Notícias
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('contacts.index') }}">
            <i class="c-sidebar-nav-icon fas fa-id-badge"></i>
            Contato Site
        </a>
    </li>
</ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
